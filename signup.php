<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    Movie\Db\signup($pdo, $_POST['username'], $_POST['password'], $_POST['email']);
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
