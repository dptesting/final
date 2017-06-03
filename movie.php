<?php

include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Validation/movie_validation.php';

use function Movie\Validation\test_input;
use function Movie\Validation\validtext;
use function Movie\View\display;

echo display('header');
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
    echo "<div class='container container-body'>";
    Movie\Db\addMovie($pdo, $name, $year, $certificate, $runTime, $image, $video);

    echo "</div>";
}


echo Movie\View\display('movie');
echo display('footer');
?>

