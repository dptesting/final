<?php
//include 'lib/Movie/Db/movie_db.php';
//include 'lib/Cart/Upload/cart_upload.php';
include 'common.php';
include 'lib/Movie/View/movie_view.php';
include 'lib/Movie/User/movie_user.php';

//use function Movie\Auth\login;

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    Movie\User\signup($pdo, $_POST['username'], $_POST['password'], $_POST['email']);
}
?>


<!doctype html>
<html>
<head><title>Movie times</title></head>
<body>

<h1>Signup</h1>

<?php echo Movie\View\display('adduserform'); ?>

</body>
</html>
