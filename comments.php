<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Validation/movie_validation.php';

use function Movie\Validation\test_input;
use function Movie\Validation\validtext;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    session_start();

    $comment = test_input($_POST['comment']);
    $member = test_input($_SESSION['login_user']);


      if (!validtext($comment)) {
      echo "Only letters and numbers allowed";//need to include spaces
      die();
      }


    Movie\Db\addcomments($pdo, $comment, $member);
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