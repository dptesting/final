<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    Movie\Db\search($pdo, $_POST['postTitle']);
}
?>

<!doctype html>
<html>
    <head><title>Search</title></head>
    <body>

        <h1>Search</h1>

        <?php echo Movie\View\display('search'); ?>

    </body>
</html>
