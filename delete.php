<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';

use function Movie\View\display;

echo display('header');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    Movie\Db\delete_user($pdo, $_POST['username']);
}
?>

<!doctype html>
<html>
    <head><title>Movie times</title></head>
    <body>

        <h1>You sure you want to delete a user?</h1>

        <?php
        echo Movie\View\display('deleteuserform');
        echo display('footer');
        ?>

    </body>
</html>
