<?php
require_once './config.php';

$id = (int)($_GET['id'] ?? 0);

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

// Handle comment submission
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_content'])){
  if(!empty($_SESSION['user_id'])){
    $commentContent = trim($_POST['comment_content']);
    if($commentContent !== ''){
      $uid = (int)$_SESSION['user_id'];
      $stmt = $link->prepare('INSERT INTO comments (recipe_id, user_id, content) VALUES (?, ?, ?)');
      $stmt->bind_param('iis', $id, $uid, $commentContent);
      $stmt->execute();
      $stmt->close();
      header('Location: single-recipe.php?id=' . $id);
      exit;
    }
  } else {
    header('Location: login.php');
    exit;
  }
}

// Load comments
$comments = [];
$stmt = $link->prepare('SELECT c.content, c.created_at, u.name FROM comments c JOIN users u ON u.id = c.user_id WHERE c.recipe_id = ? ORDER BY c.created_at DESC');
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
while($rowc = $res->fetch_assoc()){
  $comments[] = $rowc;
}
$stmt->close();
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
            <?php
            // show delete button if owner
            if(!empty($_SESSION['user_id'])){
              // fetch owner id for current recipe if not already available
              if(isset($row['user_id'])){ $ownerId = (int)$row['user_id']; }
              else {
                $rs = mysqli_query($link, "SELECT user_id FROM recipe WHERE id = $id LIMIT 1");
                $ownerId = 0;
                if($rs && mysqli_num_rows($rs) > 0){ $tmp = mysqli_fetch_assoc($rs); $ownerId = (int)$tmp['user_id']; }
              }
              if($ownerId && $ownerId === (int)$_SESSION['user_id']){
                echo '<form action="delete-recipe.php" method="POST" style="margin-top:0.5rem;">'
                  .'<input type="hidden" name="id" value="'.(int)$id.'" />'
                  .'<button type="submit" class="btn" style="background:#d9534f;">Delete Recipe</button>'
                  .'</form>';
              }
            }
            ?>
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
        <section class="recipe-content">
          <article style="width:100%">
            <h4>comments</h4>
            <?php if(!empty($_SESSION['user_id'])): ?>
            <form action="" method="POST" class="form contact-form" style="margin-bottom:1rem;">
              <div class="form-row">
                <label for="comment_content" class="form-label">Add a comment</label>
                <textarea id="comment_content" name="comment_content" class="form-textarea" rows="3" required></textarea>
              </div>
              <button type="submit" class="btn">Post Comment</button>
            </form>
            <?php else: ?>
              <p><a href="login.php">Login</a> to post a comment.</p>
            <?php endif; ?>
            <div>
              <?php if(empty($comments)): ?>
                <p>No comments yet.</p>
              <?php else: ?>
                <?php foreach($comments as $c): ?>
                  <div class="single-instruction" style="margin-bottom:0.75rem;">
                    <header>
                      <p><?php echo htmlspecialchars($c['name']); ?></p>
                      <div></div>
                    </header>
                    <p><?php echo htmlspecialchars($c['content']); ?></p>
                    <small><?php echo htmlspecialchars($c['created_at']); ?></small>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </article>
        </section>
      </div>
    </main>
    <!-- footer -->
    <?php include('./includes/footer.php');?>
  </body>
</html>
