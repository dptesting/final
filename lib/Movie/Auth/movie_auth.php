<?php

namespace Movie\Auth;

use function Movie\Db\read_user;

session_start(); //session_start() must always be called to ensure $_SESSION is populated properly, and if not, to issue a cookie to a browser so that it can be.

function login($pdo, $username, $password) {


    $username = stripcslashes($username);
    $password = stripcslashes($password);


    $user = read_user($pdo, $username, $password);
    password_verify($password, $user['password']);



    if ($username && password_verify($password, $user['password'])) {
        $_SESSION['login_user'] = $username; // Initializing Session 
       // echo $username;
      //  echo '<a href="index.php?logout"><span>Logout</span></a></li>';
        header('Location: index_1.php');
    } else {
        echo "Username or Password is invalid";
    }

    function logout() {
        ob_end_clean();
        session_destroy();
        echo "logged out";
        exit;
    }

    function require_login() {
        if (empty($_SESSION['username'])) {
            header('Location: login.php');
        }
    }

}
