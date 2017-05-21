<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'common.php';

        use function Movie\Db\read_user;

session_start();

        echo $_SESSION['login_user'] . " is logged in";

        if ($_SESSION['login_user'] == 'blog_admin') {
            echo "<br><a href = 'signup.php?signup'>Signup</a>";
            if (isset($_GET['signup'])) {
                signup();
            }
            echo "<br><a href = 'delete.php?delete'>Delete</a>";
            if (isset($_GET['delete'])) {
                delete();
            }
            echo "<br><a href = 'blog.php?blog'>Add Blog</a>";
            if (isset($_GET['blog'])) {
                blogs();
            }
        }

        echo "<br><a href = 'comments.php?comment'>Comments</a>";
        if (isset($_GET['comments'])) {
            addcomments();
        }
        echo "<br><a href = 'search.php?search'>Search</a>";
        if (isset($_GET['search'])) {
            search();
        }
        echo "<br><a href = 'index.php?logout'>Logout</a>";
        if (isset($_GET['logout'])) {
            logout();
        }


        \Movie\Db\movies($pdo);
        \Movie\Db\recent_blogs($pdo);
        \Movie\Db\comments($pdo);
        ?>

    </body>
</html>
