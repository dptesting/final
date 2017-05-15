<?php

namespace Movie\User;

function create_hash($password) {
    return $hash = crypt($password);
}

function signup($pdo, $username, $password, $email) {
    //print_r($user);
    //print_r($password);
    $hashedpassword = create_hash($password);
    //print_r($hashedpassword);


   // try {
        if($username && $password  && $email) {
        //insert into database
        $stmt = $pdo->prepare('INSERT INTO blog_members (username,password,email) VALUES (:username, :password, :email)');
        $stmt->execute(array(
            ':username' => $username,
            ':password' => $hashedpassword,
            ':email' => $email
        ));

        //redirect to index page
        header('Location: index.php');
        exit;
    } else {
    //catch (PDOException $e) {
        echo "something has gone wrong";
    }
}
