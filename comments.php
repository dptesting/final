<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Validation/movie_validation.php';

use function Movie\Validation\test_input;
use function Movie\Validation\validtext;

        use function Movie\View\display;

echo display('header');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();

    $comment = test_input($_POST['comment']);
    $member = ($_SESSION['login_user']);
    $postID = ($_SESSION['postID']);



    if (!validtext($comment)) {
        echo "Only letters and numbers allowed"; //need to include spaces
        die();
    }


    Movie\Db\addcomments($pdo, $comment, $member, $postID);
    
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
<?php echo display('footer'); ?>