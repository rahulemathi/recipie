<?php 
require_once './config.php';  
$sql = "SELECT * FROM recipe ";
      
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recipe Template || Final</title>
  <?php include('./includes/header-scripts.php');?>
  </head>
  <body>
    <!-- nav  -->
     <?php include('./includes/navbar.php');?>
    <!-- end of nav -->
    <main class="page">
      <div class="featured-recipes">
        <!-- <h4><?php echo $tag;?></h4> -->
          <!-- recipes list -->
        <div class="recipes-list">
          <!-- single recipe -->
          <?php 
          if($result = mysqli_query($link,$sql)){
            if(mysqli_num_rows($result)>0){
              $i = 1;
              while ($row = mysqli_fetch_array($result)){  
              $time =  explode(",",$row['time']);?>
          <a href="single-recipe.php?id=<?php echo $row['id'];?>" class="recipe">
            <img
              src="./assets/recipes/<?php echo $row['image'];?>"
              class="img recipe-img"
              alt=""
            />
            <h5>Carne Asada</h5>
            <p>Prep : <?php echo $time[0];?> min | Cook : <?php echo $time[1];?> min</p>
          </a>
       <?php }

        $i++;
      }
      }
      ?>
          <!-- end of single recipe -->
        </div>
        <!-- end of recipe list -->
      </div>
          
    </main>
    <!-- footer -->
    <?php include('./includes/footer.php');?>
  </body>
</html>
