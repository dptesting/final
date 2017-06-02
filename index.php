<?php
include 'common.php'; //connecting to the database
include 'lib/Movie/Db/MovieClass.php';

include 'lib/Movie/View/movie_view.php';

use function Movie\View\display;

echo display('header');
?>
<!--div class="container container-featured"-->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="images/alien.jpg" alt="Alien">
        </div>

        <div class="item">
            <img src="images/fastandfurious.jpg" alt="Fast and Furious">
        </div>

        <div class="item">
            <img src="images/fantastic-four.jpg" alt="Fantastic Four">
        </div>

        <div class="item">
            <img src="images/spy.jpg" alt="Spy">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--img src="https://usercontent2.hubstatic.com/13534699.jpg" alt="Alien 2017"/--> 
</div>


<div class="container container-buttons">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <form action="/enrol.php" method="post" enctype="multipart/form-data" >
                <input type="text" placeholder="Enter your email address" name="Email" />
                <button type=“submit” id=“submit” onclick=“alert(’Thanks’)”>Submit</button>
            </form>
        </div>  
    </div>
</div>

<div class="container container-body">
    <?php
//    \Movie\Db\getMovies($pdo);
//
//    $movies = \Movie\Db\getMovies($pdo);
//
//    foreach ($movies as $movie) {
//
//        echo '<h1><a href="viewpost.php?id=' . $movie->id . '">' . $movie->name . ''
//        . '</a></h1>';
//        echo '<p> Cert' . $movie->certificate . '      ' . $movie->runTime . '    ' . $movie->year . '</p>';
//        echo '<img src=" ' . $movie->image . ' " width="400"/>';
//        echo '</div>';
//    }
    \Movie\Db\recent_blogs($pdo);
    ?> 
</div>

<?php echo display('footer'); ?>
    
