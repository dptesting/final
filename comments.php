<?php

include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Validation/movie_validation.php';

use function Movie\Validation\test_input;
use function Movie\Validation\validtext;
use function Movie\View\display;

echo display('header');
echo display('footer');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $comment = test_input($_POST['comment']);
    $member = ($_SESSION['login_user']);
    $postID = ($_SESSION['postID']);






    Movie\Db\addcomments($pdo, $comment, $member, $postID);
}

echo Movie\View\display('comments');
?>



