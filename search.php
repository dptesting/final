<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Validation/movie_validation.php';

use function Movie\View\display;
use function Movie\Validation\test_input;

echo display('header');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $query = test_input($_POST['postTitle']);

    Movie\Db\search($pdo, $query);
}
?>

<!doctype html>
<html>
    <head><title>Search</title></head>
    <body>

        <h1>Search</h1>

        <?php echo Movie\View\display('search'); ?>

    </body>
</html>
<?php echo display('footer'); ?>
