<?php
require_once './config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simply Recipes</title>
   <?php include('./includes/header-scripts.php');?>
  </head>
  <body>
    <!-- nav  -->
   <?php include('./includes/navbar.php');?>
    <!-- end of nav -->
    <!-- main -->
    <main class="page">
      <!-- header -->
      <header class="hero">
        <div class="hero-container">
          <div class="hero-text">
            <h1>simply recipes</h1>
            <h4>no fluff, just recipes</h4>
          </div>
        </div>
      </header>
      <!-- end of header -->
      <section class="recipes-container">
        <!-- tag container -->
        <div class="tags-container">
          <h4>recipes</h4>
          <div class="tags-list">
            <a href="tag-template.php">lunch (1)</a>
            <a href="tag-template.php">Breakfast (2)</a>
            <a href="tag-template.php">Carrots (3)</a>
            <a href="tag-template.php">Food (4)</a>
          </div>
        </div>
        <!-- end of tag container -->
        <!-- recipes list -->
        <div class="recipes-list">
          <!-- single recipe -->
          <?php 
$sql = "SELECT * FROM recipe";

if($result = mysqli_query($link,$sql)){
  if(mysqli_num_rows($result)>0){
    $i = 1;
    while ($row = mysqli_fetch_array($result)){  
    $time =  explode(",",$row['time']);
    // echo $t[0]; ?>

    <a href="single-recipe.php?id=<?php echo $row['id'];?>" class="recipe">
    <img
      src="./assets/recipes/<?php echo $row['image'];?>"
      class="img recipe-img"
      alt=""
    />
    <h5><?php echo $row['title'];?> </h5>
    <p>Prep : <?php echo $time[0];?> min | Cook : <?php echo $time[1];?> min</p>
  </a>

  <?php  }

    $i++;
  }
}

//list of array in db
//description
//time
//tag
//instructions
//ingredients
//tools

?>
         
          <!-- end of single recipe -->
        </div>
        <!-- end of recipes list -->
      </section>
     <a href="addrecipe.php" class="btn add">Click Here to add Recipe</a>
    </main>
    <!-- end of main -->
    <!-- footer -->
   <?php include('./includes/footer.php');?>
  </body>
</html>


