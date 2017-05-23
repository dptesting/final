<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Movie Reviews</title>
    </head>
    <body>
        <?php
        include 'common.php';
        include 'lib/Movie/View/movie_view.php';

        use function Movie\View\display;
        use function Movie\Db\read_user;

echo display('header');
        ?>
        <div class="banner-container">

            <figure>
                <img src="https://usercontent2.hubstatic.com/13534699.jpg" alt="Alien 2017"/>
                <figcaption>BANNER IMAGE PLACEHOLDER</figcaption>
            </figure>



            <div class="container"> </div>


            <?php
            \Movie\Db\movies($pdo);
            \Movie\Db\recent_blogs($pdo);
      
            echo display('footer');
            ?>
        </div>
    </body>
</html>
