<?php 
require_once './config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tags || Final</title>
  <?php include('./includes/header-scripts.php');?>
  </head>
  <body>
    <!-- nav  -->
     <?php include('./includes/navbar.php');?>
    <!-- end of nav -->
    <main class="page">
         <section class="tags-wrapper">
          <!-- single tag -->
              <a href="tag-template.php?tag=mutton" class="tag">
                <h5>mutton</h5>
                <p>1 recipe</p>
              </a>
            <!-- end of single tag -->
          <!-- single tag -->
              <a href="tag-template.php?tag=breakfast" class="tag">
                <h5>breakfast</h5>
                <p>2 recipe</p>
              </a>
            <!-- end of single tag -->
          <!-- single tag -->
              <a href="tag-template.php?tag=carrot" class="tag">
                <h5>carrots</h5>
                <p>3 recipe</p>
              </a>
            <!-- end of single tag -->
          <!-- single tag -->
              <a href="tag-template.php?tag=dinner" class="tag">
                <h5>dinner</h5>
                <p>4 recipe</p>
              </a>
            <!-- end of single tag -->
          <!-- single tag -->
              <a href="tag-template.php" class="tag">
                <h5>food</h5>
                <p>1 recipe</p>
              </a>
            <!-- end of single tag -->
        </section>
    </main>
    <!-- footer -->
    <?php include('./includes/footer.php');?>
  </body>
</html>
