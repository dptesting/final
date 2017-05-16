<?php

include 'lib/Movie/Db/movie_db.php';

use function Movie\View\display;

// MOVIE "DATABASE"


const DB_DSN = 'mysql:host=localhost;dbname=blog'; //when sql is stopped, get SQLSTATE[HY000] [2002] No such file or directory
const DB_USER = 'root';
const DB_PASS = '';

try {
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);


    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $users = $pdo->query("SELECT * FROM blog_members")->fetchAll();
    $users = array_combine(array_column($users, 'username'), $users);
//print_r($users);
} catch (PDOException $e) {
    die($e->getMessage());
}
set_error_handler(function ($errorType, $errorMessage) {
    echo 'error';
});
