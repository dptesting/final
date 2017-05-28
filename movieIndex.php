<?php
/*
  >Lists the movies - can be used the user to list all the movies that have been reviewed
 */

include 'MovieClass.php';
//include 'config.php';
include 'common.php';

include 'lib/Movie/View/movie_view.php';



/* try {
  $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
  die($e->getMessage());
  } */

/* function disconnect($pdo) {          //Disconnect the database
  $pdo = "";
  } */

function getMovies($pdo) {   //Lists all the movies in the database
    $movieArray = [];
//print_r($movieArray);

    try {
        $stmt = $pdo->prepare("SELECT * FROM movies");
//print_r($stmt);
    } catch (PDOException $e) {
        echo $e->getMessage();
        $error = $e->errorInfo();   //          check error
        die();
    }
    $stmt->execute();
//print_r($stmt);

    while ($rows = $stmt->fetch()) {
        print_r($rows);
        $myMovie = new Movie($rows['movieID'], $rows['name'], $rows['year'], $rows['certificate'], $rows['runTime']);
//print_r($myMovie);
        array_push($movieArray, $myMovie);
    }

    return $movieArray;
}

$movies = getMovies($pdo);

foreach ($movies as $movie) {
    ?><h2>Movie Name: </h2> <?php echo $movie->name . "<br/>";
    ?><h2>Year: </h2> <?php echo $movie->year . "<br/>";
    ?><h2>Certificate: </h2> <?php echo $movie->certificate . "<br/>";
    ?><h2>Running Length: </h2> <?php
    echo $movie->runTime . "<br/>";
}