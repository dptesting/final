<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        include 'common.php'; //connecting to the database
        
        echo "<a href = 'login.php?login'>Login</a>";
        if (isset($_GET['login'])) {
            login();
        }
        echo "<br><a href = 'signup.php?signup'>Signup</a>";
        if (isset($_GET['signup'])) {
            signup();
        }
        echo "<br><a href = 'search.php?search'>Search</a>";
        if (isset($_GET['search'])) {
            search();
        }
        \Movie\Db\movies($pdo);
        //\Movie\Db\recent_blogs($pdo);
        ?>

    </body>
</html>
