<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Validation/movie_validation.php';

use function Movie\Validation\test_input;
use function Movie\Validation\valid;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = test_input($_POST['title']);
    $desc = test_input($_POST['description']);
    $content = test_input($_POST['content']);
    $movie = test_input($_POST['movieID']);
    $rating = test_input($_POST['ratingID']);

    /*  if (!valid($desc)) {
      echo "Only letters and numbers allowed";//need to include spaces
      die();
      }

      if (!valid($content)) {
      echo "Only letters and numbers allowed";//need to include spaces
      die();
      } */

    Movie\Db\blogs($pdo, $title, $desc, $content, $_POST['date'], $movie, $rating);
}
?>


<!doctype html>
<html>
    <head><title>Movie times</title></head>
    <body>

        <h1>Add Blogs</h1>

        <?php echo Movie\View\display('blogs'); ?>

    </body>
</html>
