<?php

include 'lib/Movie/View/movie_view.php';

use function Movie\View\display;

echo display('header');

session_start();
session_destroy();
header('Location: index.php');
exit;
