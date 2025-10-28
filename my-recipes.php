<?php 
require_once './config.php';
if(empty($_SESSION['user_id'])){
  header('Location: login.php');
  exit;
}
$uid = (int)$_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Recipes</title>
    <?php include('./includes/header-scripts.php');?>
  </head>
  <body>
    <?php include('./includes/navbar.php');?>
    <main class="page">
      <section class="recipes-container">
        <div class="tags-container">
          <h4>My Recipes</h4>
        </div>
        <div class="recipes-list">
          <?php 
            $stmt = $link->prepare('SELECT id, image, title, time FROM recipe WHERE user_id = ? ORDER BY id DESC');
            $stmt->bind_param('i', $uid);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result && $result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                $time = explode(',', $row['time']);
          ?>
          <div class="recipe" style="display:block;">
            <a href="single-recipe.php?id=<?php echo (int)$row['id']; ?>" style="display:block;">
              <img src="./assets/recipes/<?php echo htmlspecialchars($row['image']); ?>" class="img recipe-img" alt="" />
              <h5><?php echo htmlspecialchars($row['title']); ?></h5>
              <p>Prep : <?php echo htmlspecialchars($time[0] ?? ''); ?> min | Cook : <?php echo htmlspecialchars($time[1] ?? ''); ?> min</p>
            </a>
            <form action="delete-recipe.php" method="POST" style="margin-top:0.5rem;">
              <input type="hidden" name="id" value="<?php echo (int)$row['id']; ?>" />
              <button type="submit" class="btn" style="background:#d9534f;">Delete</button>
            </form>
          </div>
          <?php 
              }
            } else {
              echo '<p>You have not added any recipes yet.</p>';
            }
            $stmt->close();
          ?>
        </div>
      </section>
    </main>
    <?php include('./includes/footer.php');?>
  </body>
</html>


