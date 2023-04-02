<?php 
require_once './config.php'
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact || Final</title>
  <?php include('./includes/header-scripts.php');?>
  </head>
  <body>
    <!-- nav  -->
     <?php include('./includes/navbar.php');?>
    <!-- end of nav -->
    <main class="page">
     <section class="contact-container">
          <article class="contact-info">
            <h3>Want To Get In Touch?</h3>
            <p>
              Four dollar toast biodiesel plaid salvia actually pickled banjo
              bespoke mlkshk intelligentsia edison bulb synth.
            </p>
            <p>Cardigan prism bicycle rights put a bird on it deep v.</p>
            <p>
              Hashtag swag health goth air plant, raclette listicle fingerstache
              cold-pressed fanny pack bicycle rights cardigan poke.
            </p>
          </article>
          <article>
            <form class="form contact-form">
              <div class="form-row">
                <label html="name" class="form-label">your name</label>
                <input type="text" name="name" id="name" class="form-input" />
              </div>
              <div class="form-row">
                <label html="email" class="form-label">your email</label>
                <input type="text" name="email" id="email" class="form-input" />
              </div>
              <div class="form-row">
                <label html="message" class="form-label">message</label>
                <textarea name="message" id="message" class="form-textarea"></textarea>
              </div>
              <button type="submit" class="btn btn-block">
                submit
              </button>
            </form>
          </article>
        </section>
     <!-- featured recipes -->
       <section class="featured-recipes">
        <h5 class="featured-title">Look At This Awesomesouce!</h5>
        <div class="recipes-list">
          <!-- single recipe -->
          <?php 
          $sql = "SELECT * FROM recipe limit";

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
            <h5><?php echo $row['title'];?></h5>
            <p>Prep : <?php echo $time[0];?>min | Cook : <?php echo $time[1];?>min</p>
          </a>
       <?php }

        $i++;
      }
    } ?>
          <!-- end of single recipe -->
        </div>
      </section>
    </main>
    <!-- footer -->
    <?php include('./includes/footer.php');?>
  </body>
</html>
