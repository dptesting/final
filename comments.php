<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';
//include 'lib/Movie/Db/movie_db.php';
//use function Movie\Auth\login;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    Movie\Db\comments($pdo, $_POST['postTitle'], $_POST['postDesc'], $_POST['postCont'], $_POST['postDate']);
}
?>


<!doctype html>
<html>
    <head><title>Movie times</title></head>
    <body>

        <h1>Comments</h1>

        <?php echo Movie\View\display('comments'); ?>

    </body>
</html>
