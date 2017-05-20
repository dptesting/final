<?php

namespace Movie\Db;

//USER FUNCTIONS
function create_hash($password) {
    $salt = rand(0, 1000);
    return $hash = crypt($password, $salt);
}

function signup($pdo, $username, $password, $email) {

    $hashedpassword = create_hash($password);

    try {
        //insert into database
        $stmt = $pdo->prepare('INSERT INTO blog_members (username,password,email) VALUES (:username, :password, :email)');
        $stmt->execute([':username' => $username, ':password' => $hashedpassword, ':email' => $email]);
        //redirect to index page
        header('Location: index_1.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function read_user($pdo, $username) {//selects a user
    $stmt = $pdo->prepare("SELECT * FROM blog_members WHERE username = :username");
    $stmt->execute(['username' => $username]);
    return $stmt->fetch();
}

//MOVIE FUNCTIONS

function movies($pdo) {//list movies
    try {
        //insert into database
        $stmt = $pdo->query("SELECT * FROM movies");
        //print_r($stmt);
        while ($row = $stmt->fetch()) {
            echo '<div>';
            echo '<h1><a href="viewpost.php?id=' . $row['movieID'] . '">' . $row['name'] . '</a></h1>';
            echo '<p>' . $row['year'] . '</p>';
            echo '<p>' . $row['certificate'] . '</p>';
            echo '<p>' . $row['runTime'] . '</p>';
            echo '</div>';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//BLOG FUNCTIONS

function blogs($pdo, $title, $desc, $content) {//adds a post
    try {
        //insert into database
        $stmt = $pdo->prepare('INSERT INTO blog_posts (title,description,content,date) VALUES (:title, :description, :content, :date)');
        $stmt->execute([':title' => $title, ':description' => $desc, ':content' => $content, ':date' => date('Y-m-d H:i:s')]);
        //redirect to index page
        header('Location: index_1.php');
        exit;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function search($pdo, $title) {//search for blog
    try {
        $stmt = $pdo->query("SELECT * FROM blog_posts WHERE title LIKE '%$title%'"); //lists posts from search
        while ($row = $stmt->fetch()) {

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
        $stmt = $pdo->query('SELECT postID, title, description, content, date FROM blog_posts ORDER BY postID DESC'); //lists posts from 
        while ($row = $stmt->fetch()) {

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

function viewpost($pdo) {

    try {
        $stmt = $pdo->prepare('SELECT postID, title, description, content, date FROM blog_posts WHERE postID = :postID');
        $stmt->execute([':postID' => $_GET['id']]);
        $row = $stmt->fetch();

        echo '<div>';
        echo '<h1>' . $row['title'] . '</h1>';
        echo '<p>Posted on ' . date('jS M Y', strtotime($row['date'])) . '</p>';
        echo '<p>' . $row['description'] . '</p>';
        echo '<p>' . $row['content'] . '</p>';
        echo '</div>';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//Comments FUNCTIONS

function addcomments($pdo, $comment, $member) {//adds a post
    try {
        //insert into database
        $stmt = $pdo->prepare('INSERT INTO comments (comment, date, member) VALUES (:comment, :date, :member)');
        $stmt->execute([':comment' => $comment, ':date' => date('Y-m-d H:i:s'), ':member' => $member]);
        //redirect to index page
        header('Location: index_1.php');
        exit;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function comments($pdo) {
    try {
        $stmt = $pdo->query('SELECT * FROM comments ORDER BY commentID DESC'); //lists posts from 
        while ($row = $stmt->fetch()) {

            echo '<div>';
            echo '<p>Posted on ' . date('jS M Y H:i:s', strtotime($row['date'])) . '</p>';
            echo '<p>' . $row['comment'] . '</p>';
            echo '</div>';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
