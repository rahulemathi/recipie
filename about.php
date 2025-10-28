<?php require_once './config.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About || Final</title>
  <?php include('./includes/header-scripts.php');?>
  </head>
  <body>
    <!-- nav  -->
     <?php include('./includes/navbar.php');?>
    <!-- end of nav -->
    <main class="page">
      <section class="about-page">
        <article>
          <h2>I'm baby coloring book poke taxidermy</h2>
          <p>
            Taxidermy forage glossier letterpress heirloom before they sold out
            you probably haven't heard of them banh mi biodiesel chia.
          </p>
          <p>
            Taiyaki tumblr flexitarian jean shorts brunch, aesthetic salvia
            retro.
          </p>
          <a href="contact.php" class="btn"> contact </a>
        </article>
        <!-- needs fixes -->
        <img
          src="./assets/about.jpeg"
          alt="Person Pouring Salt in Bowl"
          class="img about-img"
        />
      </section>
      <section class="featured-recipes">
        <h5 class="featured-title">Look At This Awesomesouce!</h5>
        <div class="recipes-list">
          <?php 
          $result = mysqli_query($link, "SELECT id, image, title, time FROM recipe ORDER BY id DESC LIMIT 3");
          if($result && mysqli_num_rows($result) > 0){
            while($r = mysqli_fetch_assoc($result)){
              $t = explode(',', $r['time']);
          ?>
          <a href="single-recipe.php?id=<?php echo (int)$r['id']; ?>" class="recipe">
            <img src="./assets/recipes/<?php echo htmlspecialchars($r['image']); ?>" class="img recipe-img" alt="" />
            <h5><?php echo htmlspecialchars($r['title']); ?></h5>
            <p>Prep : <?php echo htmlspecialchars($t[0] ?? ''); ?>min | Cook : <?php echo htmlspecialchars($t[1] ?? ''); ?>min</p>
          </a>
          <?php }
          }
          ?>
        </div>
      </section>
    </main>
    <!-- footer -->
    <footer class="page-footer">
      <p>
        &copy; <span id="date"></span>
        <span class="footer-logo">SimplyRecipes</span> Built by
        <a href="https://www.linkedin.com/in/m-jereen-sharon/">Jereen</a>
      </p>
    </footer>
    <script src="./js/app.js"></script>
  </body>
</html>
