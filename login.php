<?php

include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Db/UserClass.php';
include 'lib/Movie/Auth/movie_auth.php';

use function Movie\View\display;

echo display('header');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    Movie\Auth\login($pdo, $username, $password);
}
echo Movie\View\display('loginform');
echo display('footer');
?>

