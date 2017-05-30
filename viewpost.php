<?php

include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Db/CommentClass.php';

use function Movie\View\display;
use function Movie\Db\viewpost;

echo display('header');?>

<div class="container">
        <?php viewpost($pdo);
        $postID = ($_SESSION['postID']); ?>
</div>

<div class="container container-body">
 <h5>Comments</h5>
<?php

$comments = \Movie\Db\comments($pdo, $postID);

foreach ($comments as $comment) {
    echo '<div>';
    echo '<p> Posted on' . $comment->date . '   by ' . $comment->member . '</p>';
    echo '<p>' . $comment->comment . '<p>';
    echo '</div>';
}


if (!empty($_SESSION['login_user'])) {
    echo "<br><button type='button'><a href = 'comments.php?comment'>Comments</a></button>";
    if (isset($_GET['comments'])) {
        //addcomments();
        $newComment = new Comment();

$newComment->addcomments();
    }
}

echo display('footer');

