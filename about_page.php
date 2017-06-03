<?php
include 'common.php'; //connecting to the database
include 'lib/Movie/Db/MovieClass.php';

include 'lib/Movie/View/movie_view.php';

use function Movie\View\display;

echo display('header');
?>
    <style>
        div {
            text-align: center;
        }
    </style>
<body>


    <div class="container container-body" style="border-style: solid">


        <p></br></br>
        <p>We are passionate about movies and if you are too - we’d love to hear from you!</p></br>
        <p>If you’d like to be notified of new blogs, you can subscribe on our homepage.</p></br>
        <p>Or if you want to post comments and to enter our monthly competitions, please do sign up.</p></br>
        <p>Else if you just want to get in touch with us at, mail us on <a href="mailto:info@thetrainteam.com">info@thetrainteam.com</p></a></br>
    <p>And we’d love your support on social media too.</p>

</div>
</body>

<?php echo display('footer'); ?>
