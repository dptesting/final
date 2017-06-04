<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Validation/movie_validation.php';

use function Movie\View\display;
use function Movie\Validation\test_input;

echo display('header');
?>
<div class="container container-body">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $query = test_input($_POST['postTitle']);

        Movie\Db\search($pdo, $query);
    }
    echo Movie\View\display('search');
    echo '</div>';
    echo display('footer');
    ?>

