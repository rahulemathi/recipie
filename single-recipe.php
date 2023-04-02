<?php
require_once './config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM recipe WHERE id = $id";

if($result=mysqli_query($link,$sql)){
  if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);

    $title = $row['title'];
    $image = $row['image'];
    $description = $row['description'];
    $time = explode(",",$row['time']);
    $tag = explode(",", $row['tag']);
    $instructions =explode(",", $row['instructions']);
    $ingredients =explode(",", $row['ingredients']);
    $tools =explode(",", $row['tools']);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Single Recipe || Final</title>
  <?php include('./includes/header-scripts.php');?>
  </head>
  <body>
    <!-- nav  -->
     <?php include('./includes/navbar.php');?>
    <!-- end of nav -->
    <main class="page">
      <div class="recipe-page">
        <section class="recipe-hero">
          <img
            src="./assets/recipes/<?php echo $image;?>"
            class="img recipe-hero-img"
          />
          <article class="recipe-info">
            <h2><?php echo $title;?></h2>
            <p>
             <?php echo $description;?>
            </p>
            <div class="recipe-icons">
              <article>
                <i class="fas fa-clock"></i>
                <h5>prep time</h5>
                <p><?php echo $time[0];?> min.</p>
              </article>
              <article>
                <i class="far fa-clock"></i>
                <h5>cook time</h5>
                <p><?php echo $time[1];?> min.</p>
              </article>
              <article>
                <i class="fas fa-user-friends"></i>
                <h5>serving</h5>
                <p><?php echo $time[2];?> servings</p>
              </article>
            </div>
            <p class="recipe-tags">
              Tags :
              <?php 
              foreach($tag as $tags){?>
                <a href="tag-template.php"><?php echo $tags;?></a>
             <?php }
              ?>
            </p>
          </article>
        </section>
        <!-- content -->
        <section class="recipe-content">
          <article>
            <h4>instructions</h4>
            <!-- single instruction -->
            <?php $steps = 1;
            foreach($instructions as $instruction){ 
              ?>
              <div class="single-instruction">
              <header>
                <p>step <?php echo $steps++;?></p>
                <div></div>
              </header>
              <p>
               <?php echo $instruction;?>
              </p>
            </div>
            <?php }
            ?>
         
            <!-- end of single instruction -->
          </article>
          <article class="second-column">
            <div>
              <h4>ingredients</h4>
              <?php 
              foreach($ingredients as $ingredient){?>
                <p class="single-ingredient"><?php echo $ingredient;?></p>
             <?php }
              ?>
            </div>
            <div>
              <h4>tools</h4>
              <?php
 foreach($tools as $tool){?>
  <p class="single-tool"><?php echo $tool;?></p>
<?php }
              ?>
            </div>
          </article>
        </section>
      </div>
    </main>
    <!-- footer -->
    <?php include('./includes/footer.php');?>
  </body>
</html>
