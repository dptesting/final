<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Validation/movie_validation.php';

use function Movie\Validation\test_input;
use function Movie\Validation\validtext;
use function Movie\View\display;

echo display('header');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = test_input($_POST['title']);
    $desc = test_input($_POST['description']);
    $content = test_input($_POST['content']);
    $movieID = test_input($_POST['movieID']);
    $ratingID = test_input($_POST['ratingID']);



    if (!validtext($desc)) {
        echo "Only letters and numbers allowed"; //need to include spaces
        die();
    }

    if (!validtext($content)) {
        echo "Only letters and numbers allowed"; //need to include spaces
        die();
    }

    Movie\Db\blogs($pdo, $title, $desc, $content, $_POST['date'], $movie, $rating);
}
?>


<!doctype html>
<html>
    <head><title>Movie times</title></head>
    <body>
        <?php echo Movie\View\display('blogs'); ?>
        <?php echo display('footer'); ?>
    </body>
</html>
