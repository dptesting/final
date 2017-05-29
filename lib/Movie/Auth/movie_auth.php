<?php

namespace Movie\Auth;

use function Movie\Db\read_user;


function login($pdo, $username, $password) {


    $username = stripcslashes($username);
    $password = stripcslashes($password);


    $user = read_user($pdo, $username, $password);
   // print_r($user);
$role = $user['roleID'];
    password_verify($password, $user['password']);
    



    if ($username && password_verify($password, $user['password'])) {
        $_SESSION['roleID'] = $role;
        $_SESSION['login_user'] = $username; // Initializing Session 
       // exit();
        header('Location: index.php');
    } else {
        echo "Username or Password is invalid";
    }

    function require_login() {
        if (empty($_SESSION['username'])) {
            header('Location: login.php');
        }
    }

}
