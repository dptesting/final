<?php

include 'common.php';
include 'lib/Movie/View/movie_view.php';

use function Movie\View\display;
use function Movie\Db\viewcategory_posts;
        
echo display('header'); ?>

 <div class="container">
        <?php viewcategory_posts($pdo); ?>
 </div>
        
         <?php echo display('footer'); ?>
