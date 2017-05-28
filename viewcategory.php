<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';

use function Movie\View\display;
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Movie Reviews</title>
    </head>

    <body>

        <?php echo display('header'); ?>

        <div class="container">
            <?php \Movie\Db\viewcategory($pdo); ?>
        </div>

        <?php echo display('footer'); ?>
    </body>

</html>

