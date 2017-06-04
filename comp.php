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
        <div class="container container-body" style="border-style: solid">
            <h4>Competition time again</h4>
            <p>Every month our members get a chance to win a pair of premier cinema tickets and a voucher for popcorn and drinks.<br>
                Just email us for your chance to win</p>

            <a href="mailto:info@thetrainteam.com">info@thetrainteam.com</p></a>

        </div>
    </body>
    <?php echo display('footer'); ?>
