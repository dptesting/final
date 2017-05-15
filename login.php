<?php
//include 'lib/Movie/Db/movie_db.php';
//include 'lib/Cart/Upload/cart_upload.php';
include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/Auth/movie_auth.php';

//use function Movie\Auth\login;

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    Movie\Auth\login($pdo, $_POST['username'], $_POST['password']);
    //Movie\Auth\get_user_hash($pdo, $_POST['username'], $_POST['password']);
}
?>


<!doctype html>
<html>
<head><title>Movie times</title></head>
<body>

<h1>Login</h1>

<?php echo Movie\View\display('loginform'); ?>

</body>
</html>
