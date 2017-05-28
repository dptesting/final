<?php
include 'common.php';
include 'lib/Movie/View/movie_view.php';

use function Movie\View\display;

echo display('header');
?>
<!doctype html>
<html>
    <head><title>Competition times</title></head>
    <style>
        body {
            text-align: center;
        }
    </style>
    <script>
        function submitForm() {
            return confirm("Good luck.  You have been submitted to this month's draw");
        }
    </script>

    <body>

        <h4>Competition time again</h4>
        <p>Every month our members get a chance to win a pair of premier cinema tickets and a voucher for popcorn and drinks.<br>
            Enter your email for your chance to win</p>

        <form action="" method="post">
            <div>
                <label for="email"></label>
                <input name="email" type="email" placeholder="email address"/>
                <button type="submit" onclick='submitForm()'>submit</button>
            </div>
        </form>
        <?php echo display('footer'); ?>

    </body>
</html>
