<?php

/* $stmt = $pdo->query("SELECT * FROM movies");       //WHERE movieName = :movieName");

  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($rows as $row) {
  print_r($row);
  }

  unset($stmt); */

Class Movie {

    public $id;
    public $name;
    public $year;
    public $certificate;
    public $runTime;
    public $image;

    public function __construct($inId = null, $inName = null, $inYear = null, $inCertificate = null, $inRunTime = null, $inImage = null) {
        $this->id = $inId;
        $this->name = $inName;
        $this->year = $inYear;
        $this->certificate = $inCertificate;
        $this->runTime = $inRunTime;
        $this->image = $inImage;
    }

//foreach ($rows as $row){
//print_r($row);
}

/*unset ($stmt);



$movies_row = $stmt->fetch();    //5. use data
$numrows = count ($movies_row);

foreach ($movies_row as $row){
print_r ($row);
}

//echo "found" . $movie['movieName'];
//echo $movie['movieName'];

/public function insertMovies() {

        $pdo = DataObject::connect();

        $stmt = $pdo->prepare("INSERT INTO movies (movieName,movieYear, movieCert, movieRuntime)
                                    VALUES (:movieName, :movieYear, :movieCert, :movieRunTime)");

        try {
            #Collect info from a form which will be used to add a movie to the database - filter_input is required
            //$stmt->execute(["movieName" => $_GET['movieName'], "movieYear" => $_GET['movieYear'], "movieCert" => $_GET['movieCert'], "movieRunTime" => $_GET['movieRunTime']]);
        
            $stmt->execute(['movieName' => 'Shawshank Redemption', 'movieYear' => '1995', 'movieCert' => '18', 'movieRunTime' => '200mins']);
        } catch (PDOException $e) {
            echo $e->getMessage();
            $error = $e->errorInfo();   //4. check error
            die();
        }
    }
*/

//$newMovie = new Movie();

//$newMovie->getMovies();

//$newMovie->insertMovies();

