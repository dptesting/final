<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Validation/movie_validation.php';

use function Movie\Validation\test_input, Movie\Validation\valid;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//validation checks

    $name = test_input($_POST['username']);
    if(!valid($name)) {
        echo "Only letters and numbers allowed";
        die();
	}
        

    $email = test_input($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        die();
    }

    $password = test_input($_POST['password']);
    $passwordConfirm = test_input($_POST['passwordConfirm']);
    if ($password != $passwordConfirm) {
        echo "do not match";
        die();
    }

    Movie\Db\signup($pdo, $name, $password, $email);
}
?>


<!doctype html>
<html>
    <head><title>Movie times</title></head>
    <body>

        <h1>Signup</h1>

        <?php echo Movie\View\display('adduserform'); ?>

    </body>
</html>
