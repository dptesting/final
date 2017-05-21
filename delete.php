<?php
//include 'lib/Movie/Db/movie_db.php';
//include 'lib/Cart/Upload/cart_upload.php';
include 'common.php';
include 'lib/Movie/View/movie_view.php';
//include 'lib/Movie/Db/movie_db.php';

//use function Movie\Auth\login;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    Movie\Db\delete_user($pdo, $_POST['username']);
}
?>

<!doctype html>
<html>
    <head><title>Movie times</title></head>
    <body>

        <h1>You sure you want to delete a user?</h1>

        <?php echo Movie\View\display('deleteuserform'); ?>

    </body>
</html>
