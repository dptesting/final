<?php

include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Db/UserClass.php';
include 'lib/Movie/Validation/movie_validation.php';

use function Movie\View\display;
use function Movie\Validation\test_input,
             Movie\Validation\valid;

echo display('header');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//validation checks

    $name = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $passwordConfirm = test_input($_POST['passwordConfirm']);

    $role = ($_POST['roleID']);

    Movie\Db\signup($pdo, $name, $password, $passwordConfirm, $email, $role);
}

echo Movie\View\display('adduserform');
echo display('footer');
?>


