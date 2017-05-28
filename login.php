<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Auth/movie_auth.php';

use function Movie\View\display;

echo display('header');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    Movie\Auth\login($pdo, $_POST['username'], $_POST['password']);
}
?>

<!doctype html>
<html>
    <head><title>Movie times</title></head>
    <body>
        <?php echo Movie\View\display('loginform'); ?>

    </body>
</html>
<?php echo display('footer'); ?>
