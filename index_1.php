<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'common.php';

        use function Movie\Db\read_user;

echo "you are logged in";

        echo "<a href = 'index.php?logout'>Logout</a>";
        if (isset($_GET['logout'])) {
            logout();
        }

        try {
            $stmt = $pdo->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC'); //lists posts from 
            while ($row = $stmt->fetch()) {

                echo '<div>';
                echo '<h1>' . $row['postTitle'] . '</a></h1>';
                echo '<p>Posted on ' . date('jS M Y H:i:s', strtotime($row['postDate'])) . '</p>';
                echo '<p>' . $row['postDesc'] . '</p>';
                //  echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';                
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        ?>

    </body>
</html>
