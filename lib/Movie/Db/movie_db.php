<?php

namespace Movie\Db;

//USER FUNCTIONS
function create_hash($password) {
    return $hash = crypt($password); //creates hashing to password
}

function signup($pdo, $username, $password, $email) {

    $hashedpassword = create_hash($password);

    try {
        //insert into database
        $stmt = $pdo->prepare('INSERT INTO blog_members (username,password,email) VALUES (:username, :password, :email)');
        $stmt->execute([':username' => $username, ':password' => $hashedpassword, ':email' => $email]);
        //redirect to index page
        header('Location: index_1.php');
        exit;
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
function blogs($pdo, $title, $desc, $content) {//adds a post
    try {
        //insert into database
        $stmt = $pdo->prepare('INSERT INTO blog_posts (postTitle,postDesc,postCont,postDate) VALUES (:postTitle, :postDesc, :postCont, :postDate)');
        $stmt->execute([':postTitle' => $title, ':postDesc' => $desc, ':postCont' => $content, ':postDate' => date('Y-m-d H:i:s')]);
        //redirect to index page
        header('Location: index_1.php');
        exit;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function search($pdo, $title) {//search for blog
    try {
        $stmt = $pdo->query("SELECT * FROM blog_posts WHERE postTitle LIKE '%$title%'"); //lists posts from search
        while ($row = $stmt->fetch()) {

            echo '<div>';
            echo '<h1><a href="viewpost.php?id=' . $row['postID'] . '">' . $row['postTitle'] . '</a></h1>';
            echo '<p>Posted on ' . date('jS M Y H:i:s', strtotime($row['postDate'])) . '</p>';
            echo '<p>' . $row['postDesc'] . '</p>';
            echo '<p><a href="viewpost.php?id=' . $row['postID'] . '">Read More</a></p>';
            echo '</div>';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function recent_blogs($pdo) {
    try {
        $stmt = $pdo->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC'); //lists posts from 
        while ($row = $stmt->fetch()) {

            echo '<div>';
            echo '<h1><a href="viewpost.php?id=' . $row['postID'] . '">' . $row['postTitle'] . '</a></h1>';
            echo '<p>Posted on ' . date('jS M Y H:i:s', strtotime($row['postDate'])) . '</p>';
            echo '<p>' . $row['postDesc'] . '</p>';
            echo '<p><a href="viewpost.php?id=' . $row['postID'] . '">Read More</a></p>';
            echo '</div>';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function viewpost($pdo) {
    
    try {
    $stmt = $pdo->prepare('SELECT postID, postTitle, postCont, postDate FROM blog_posts WHERE postID = :postID');
    $stmt->execute([':postID' => $_GET['id']]);
    $row = $stmt->fetch();

    echo '<div>';
    echo '<h1>' . $row['postTitle'] . '</h1>';
    echo '<p>Posted on ' . date('jS M Y', strtotime($row['postDate'])) . '</p>';
    echo '<p>' . $row['postCont'] . '</p>';
    echo '</div>';
    
     } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
