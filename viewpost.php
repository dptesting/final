<?php

include 'common.php';
include 'lib/Movie/View/movie_view.php';

use function Movie\View\display;
use function Movie\Db\viewpost;

echo display('header');




viewpost($pdo);
$postID = ($_SESSION['postID']);

\Movie\Db\comments($pdo, $postID);


if (!empty($_SESSION['login_user'])) {
    echo "<br><a href = 'comments.php?comment'>Comments</a>";
    if (isset($_GET['comments'])) {
        addcomments();
    }
}

echo display('footer');

