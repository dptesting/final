<!doctype html>
<html>
    <head><title>Competition times</title></head>
    <body>

        <h1>Competition time again</h1>
        <p>a pair of cinema tickets and a voucher for popcorn and drinks.<br>
            log in or sign up for a chance to win</p>
        <?php
        echo "<a href = 'login.php?login'>Login</a>";
        if (isset($_GET['login'])) {
            login();
        }
        echo "<br><a href = 'signup.php?signup'>Signup</a>";
        if (isset($_GET['signup'])) {
            signup();
        }
        ?>

    </body>
</html>