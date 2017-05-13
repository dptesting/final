<?php

namespace Movie\Auth;

//include 'common.php';

use function Movie\Db\read_user;

session_start(); //session_start() must always be called to ensure $_SESSION is populated properly, and if not, to issue a cookie to a browser so that it can be.

function login($pdo, $username, $password) {
	$user = read_user($pdo, $username, $password);
        //print_r($user);
        

	if($username && $password) {
		 $_SESSION['valid'] = true;
                 $_SESSION['login_user']=$username; // Initializing Session
                 //print_r($_SESSION);
                 //echo "you are logged in";
                // ob_end_clean();
                 header('Location: index.php');

	} else {
                  //  print_r($username);
        //print_r($user);
        //print_r($password);
                 echo "Username or Password is invalid";
                 //header('Location: login.php');
	}

}


function logout() {
    ob_end_clean();
    session_destroy();
        echo "logged out";
        exit;
}

function require_login() {
    	if(empty($_SESSION['username'])) {
		header('Location: login.php');
	}
}
