<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';

use function Movie\View\display;

echo display('header');
?>
<!doctype html>
<html>
    <head><title>Competition times</title></head>
    <body>

        <h1>Competition time again</h1>
        <p>Every month our members get a chance to win a pair of premier cinema tickets and a voucher for popcorn and drinks.<br>
            Log in or Sign up for your chance to win</p>
        <?php
        echo "<a href = 'login.php?login'>Login</a>";
        if (isset($_GET['login'])) {
            login();
        }
        echo display('footer');
        ?>

    </body>
</html>
