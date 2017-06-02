<?php

namespace Movie\Auth;

use function Movie\Db\read_user;

function login($pdo, $username, $password) {

    $username = stripcslashes($username);
    $password = stripcslashes($password);


    $user = read_user($pdo, $username, $password);


    if ($username && password_verify($password, ($user->password))) {
        $_SESSION['roleID'] = $role;
        $_SESSION['login_user'] = $username; // Initializing Session 
        header('Location: index.php');
    } else {
        echo "<div style='text-align:center'>";
        echo "Username or Password is invalid";
        echo "</div>";
    }
}
