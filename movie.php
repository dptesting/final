<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Validation/movie_validation.php';

use function Movie\Validation\test_input;
use function Movie\Validation\validtext;
use function Movie\View\display;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = test_input($_POST['name']);
    $year = test_input($_POST['year']);
    $certificate = test_input($_POST['certificate']);
    $runTime = test_input($_POST['runTime']);
    $image = test_input($_POST['image']);
    $video = test_input($_POST['video']);

    if (!validtext($desc)) {
        echo "Only letters and numbers allowed"; //need to include spaces
        die();
    }

    if (!validtext($content)) {
        echo "Only letters and numbers allowed"; //need to include spaces
        die();
    }
//Movie\Db\readMovie($pdo);
   Movie\Db\addMovie($pdo, $name, $year, $certificate, $runTime, $image, $video);
}
echo display('header');
?>


<!doctype html>
<html>

    <head><title>Movie times</title></head>
    <body>
        <?php echo Movie\View\display('movie'); ?>
        <?php echo display('footer'); ?>
    </body>
</html>
