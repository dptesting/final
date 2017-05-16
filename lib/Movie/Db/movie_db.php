<?php

namespace Movie\Db;

//USER FUNCTIONS
function create_hash($password) {
    return $hash = crypt($password);
}

function signup($pdo, $username, $password, $email) {

    $hashedpassword = create_hash($password);

    if ($username && $password && $email) {
        //insert into database
        $stmt = $pdo->prepare('INSERT INTO blog_members (username,password,email) VALUES (:username, :password, :email)');
        $stmt->execute([':username' => $username, ':password' => $hashedpassword, ':email' => $email]);

        //redirect to index page
        header('Location: index_1.php');
        exit;
    } else {
        echo "something has gone wrong";
    }
}

function read_user($pdo, $username) {
    $stmt = $pdo->prepare("SELECT * FROM blog_members WHERE username = :username");
    $stmt->execute(['username' => $username]);
    // print_r($stmt);
    return $stmt->fetch();
}

//MOVIE FUNCTIONS
function comments($pdo, $title, $desc, $content) {
    // print_r($title);
    // print_r($desc);
    // print_r($content);
    // print_r(date('Y-m-d H:i:s'));

    if ($title && $desc && $content) {
        //insert into database
        $stmt = $pdo->prepare('INSERT INTO blog_posts (postTitle,postDesc,postCont,postDate) VALUES (:postTitle, :postDesc, :postCont, :postDate)');
        $stmt->execute([':postTitle' => $title, ':postDesc' => $desc, ':postCont' => $content, ':postDate' => date('Y-m-d H:i:s')]);

        //redirect to index page
        header('Location: index_1.php');
        exit;
    } else {

        echo "something has gone wrong";
    }
}
