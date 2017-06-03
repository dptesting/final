<?php

namespace Movie\Db;

use function Movie\Validation\valid,
             Movie\Validation\validtext;

//USER FUNCTIONS
function create_hash($password) {
    $salt = rand(0, 1000);
    return $hash = crypt($password, $salt);
}

function signup($pdo, $username, $password, $passwordConfirm, $email, $role) {

    echo "<div style='text-align:center'>";
    if (!valid($username)) {
        echo "Only letters and numbers allowed";
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        return;
    }

    if ($password !== $passwordConfirm) {
        echo "confirmation password does not match";
        return;
    }

    if ($password == $username) {
        echo "username and password cannot be the same";
        return;
    }
    echo "</div>";

    $hashedpassword = create_hash($password);

    $user = read_user($pdo, $username, $password);
    $email = read_email($pdo, $email);


    if ((empty($user->username) && (empty($email->email)))) {//checks unique username and unique email
        $stmt = $pdo->prepare('INSERT INTO blog_members (username,password,email,roleID) VALUES (:username, :password, :email, :roleID)');
        $stmt->execute([':username' => $username, ':password' => $hashedpassword, ':email' => $email, ':roleID' => $role]);
        $_SESSION['roleID'] = $role;
        $_SESSION['login_user'] = $username;

        header('Location: index.php');
    } else {
        echo "<div style='text-align:center'>";
        echo 'This user already exists';
        echo "</div>";
    }
}

function read_user($pdo, $username) {//selects a user
    try {
        $stmt = $pdo->prepare("SELECT * FROM blog_members WHERE username = :username");
        $stmt->execute(['username' => $username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch();

    $myUser = new \User($row['memberID'], $row['username'], $row['password'], $row['email'], $row['roleID']);
    return $myUser;
}

function read_email($pdo, $email) {//selects a user
    try {
        $stmt = $pdo->prepare("SELECT * FROM blog_members WHERE email = :email");
        $stmt->execute(['email' => $email]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch();

    $myUser = new \User($row['memberID'], $row['username'], $row['password'], $row['email'], $row['roleID']);
    return $myUser;
}

function delete_user($pdo, $username) {//deletes a user
    $stmt = $pdo->prepare("DELETE FROM blog_members WHERE username = :username");
    $stmt->execute([':username' => $username]);
    header('Location: index.php');
}

//MOVIE FUNCTIONS

function addMovie($pdo, $name, $year, $certificate, $runTime, $image) {//adds a post
    try {
//insert into database
        $stmt = $pdo->prepare('INSERT INTO movies (name,year,certificate,runTime, image) VALUES (:name ,:year, :certificate, :runTime, :image)');
        $stmt->execute([':name' => $name, ':year' => $year, ':certificate' => $certificate, ':runTime' => $runTime, ':image' => $image]);
//redirect to index page
        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getMovies($pdo) {   //Lists all the movies in the database
    $movieArray = [];


    try {
        $stmt = $pdo->query("SELECT * FROM movies");
    } catch (PDOException $e) {
        echo $e->getMessage();
        $error = $e->errorInfo();   //check error
        die();
    }
    $stmt->execute();


    while ($rows = $stmt->fetch()) {
        $myMovie = new \Movie($rows['movieID'], $rows['name'], $rows['year'], $rows['certificate'], $rows['runTime'], $rows['image']);
        array_push($movieArray, $myMovie);
    }
    return $movieArray;
}

//BLOG FUNCTIONS

function blogs($pdo, $title, $desc, $content, $movieID, $ratingID) {//adds a post
    echo "<div style='text-align:center'>";
    if (!validtext($desc)) {
        echo "Only letters and numbers allowed"; //need to include spaces
        return;
    }

    if (!validtext($content)) {
        echo "Only letters and numbers allowed"; //need to include spaces
        return;
    }
    echo "</div>";
    try {
        $stmt = $pdo->prepare('INSERT INTO blog_posts (title,description,content,date,movieID,ratingID) VALUES (:title, :description, :content, :date, :movieID, :ratingID)');
        $stmt->execute([':title' => $title, ':description' => $desc, ':content' => $content, ':date' => date('Y-m-d H:i:s'), ':movieID' => $movieID, ':ratingID' => $ratingID]);
        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function search($pdo, $name) {//search for movie & connected blog with the name typed in search
    try {
        $stmt = $pdo->query("SELECT * FROM blog_posts b, movies m WHERE b.movieID = m.movieID and m.name LIKE '%$name%'"); //lists posts from search
        while ($row = $stmt->fetch()) {
            echo '<div>';
            echo '<h1><a href="viewpost.php?id=' . $row['movieID'] . '">' . $row['name'] . '</a></h1>';
            echo '<p> Cert' . $row['certificate'] . '      ' . $row['runTime'] . '    ' . $row['year'] . '</p>';
            echo '<img src=" ' . $row['image'] . ' " width="400"/>';
            echo '</div>';
            echo '<div>';
            echo '<h1><a href="viewpost.php?id=' . $row['postID'] . '">' . $row['title'] . '</a></h1>';
            echo '<p>Posted on ' . date('jS M Y H:i:s', strtotime($row['date'])) . '</p>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<p><a href="viewpost.php?id=' . $row['postID'] . '">Read More</a></p>';
            echo '</div>';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function recent_blogs($pdo) {
    try {
        $stmt = $pdo->query('SELECT postID, title, description, content, date, ratingID, blog_posts.movieID, movies.image, movies.movieID FROM blog_posts, movies WHERE movies.movieID = blog_posts.movieID ORDER BY postID DESC'); //lists posts from 
        while ($row = $stmt->fetch()) {
            echo "<div class='container container-body' style='border-style: groove'>";
            echo '<div class="container container-recent">';
            echo '<img class="recentblog-image" src=" ' . $row['image'] . ' " width="300" , height="300"/>';
            echo '<h1 class="recentblog-title"><a href="viewpost.php?id=' . $row['postID'] . '">' . $row['title'] . '</a></h1>';
            echo '<p>Posted on ' . date('jS M Y H:i:s', strtotime($row['date'])) . " - Rating " . $row['ratingID'] . '</p>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<p><a href="viewpost.php?id=' . $row['postID'] . '">Read More</a></p>';
            echo '</div>';
            echo "</div>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function viewpost($pdo) {


    try {
        $stmt = $pdo->prepare // changed the select statement so it displays image and video for each post
                ('SELECT postID, title, description, content, date, ratingID, blog_posts.movieID, movies.movieID, movies.image, movies.video FROM blog_posts, movies WHERE postID = :postID AND blog_posts.movieID = movies.movieID');
        $stmt->execute([':postID' => $_GET['id']]);
        $row = $stmt->fetch();
        $video = '<span class="video-wrapper"><iframe width="560" height="315" src="' . $row['video'] . '" frameborder="0" allowfullscreen></iframe></span>';

        echo '<h1>' . $row['title'] . '</h1>';
        echo '<p>Posted on ' . date('jS M Y', strtotime($row['date'])) . " - Rating " . $row['ratingID'] . '</p>';
        echo '<img src=" ' . $row['image'] . ' " width="400"/>';
        $test = str_replace('{{video}}', $video, $row['content']);
        echo '<p>' . $row['description'] . '</p>';
        echo '<p>' . $test . '</p>';
        $_SESSION['postID'] = $row['postID'];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// CATEGORY FUNCTIONS

function viewcategory($pdo) {
    try {
        $stmt = $pdo->query('SELECT * FROM category');
        while ($row = $stmt->fetch()) {
            echo " <ul class='nav navbar-nav' >";
            echo '<li ><a href="viewcategory.php?id=' . $row['catID'] . '">' . $row['name'] . '</a></li>';
            echo "</ul>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function viewcategory_posts($pdo) {

    try {
        $stmt = $pdo->prepare('SELECT * FROM blog_posts JOIN (movie_categories join category USING (catID)) USING (movieID) WHERE (catID) = :catID');
        $stmt->execute([':catID' => $_GET['id']]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    while ($row = $stmt->fetch()) {
        echo "<div class='container container-body' style='border-style: solid'>";
        if ($_GET['id'] == $row['catID']) {

            echo '<h1><a href="viewpost.php?id=' . $row['postID'] . '">' . $row['title'] . '</a></h1>';
            //  echo '<img class="recentblog-image src=" ' . $row['image'] . ' " width="400"/>';
            echo '<p>Posted on ' . date('jS M Y H:i:s', strtotime($row['date'])) . " - Rating " . $row['ratingID'] . '</p>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<p><a href="viewpost.php?id=' . $row['postID'] . '">Read More</a></p>';
        } else {
            echo "No posts in this category";
        }
        echo "</div>";
    }
}

//Comments FUNCTIONS

function addcomments($pdo, $comment, $member, $postID) {//adds a post
    echo "<div style='text-align:center'>";
    if (!validtext($comment)) {
        echo "Only letters and numbers allowed"; //need to include spaces
        return;
    }
    try {
        $stmt = $pdo->prepare('INSERT INTO comments (comment, date, member, postID) VALUES (:comment, :date, :member, :postID)');
        $stmt->execute([':comment' => $comment, ':date' => date('Y-m-d H:i:s'), ':member' => $member, ':postID' => $postID]);

        header('Location: viewpost.php?id=' . $postID);
        exit;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function comments($pdo, $postID) {   //Lists all the comments against a selected post in the database
    $commentArray = [];


    try {
        $stmt = $pdo->prepare('SELECT * FROM comments WHERE postID = :postID'); //lists posts from 
        $stmt->execute(['postID' => $postID]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    while ($row = $stmt->fetch()) {
        $myComment = new \Comment($row['commentID'], $row['comment'], $row['date'], $row['member'], $row['postID']);
        array_push($commentArray, $myComment);
    }
    return $commentArray;
}
