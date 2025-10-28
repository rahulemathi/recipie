<?php 
require_once './config.php';
// Build dynamic tags with counts from recipe.tag CSV
$tags = [];
$res = mysqli_query($link, "SELECT tag FROM recipe");
if($res){
  while($row = mysqli_fetch_assoc($res)){
    $parts = array_filter(array_map('trim', explode(',', $row['tag'])));
    foreach($parts as $p){
      $k = strtolower($p);
      if(!isset($tags[$k])) $tags[$k] = 0;
      $tags[$k]++;
    }
  }
}
ksort($tags);
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
          <?php foreach($tags as $tagName => $count): ?>
            <a href="tag-template.php?tag=<?php echo urlencode($tagName); ?>" class="tag">
              <h5><?php echo htmlspecialchars($tagName); ?></h5>
              <p><?php echo (int)$count; ?> recipe<?php echo $count==1?'':'s'; ?></p>
            </a>
          <?php endforeach; ?>
        </section>
    </main>
    <!-- footer -->
    <?php include('./includes/footer.php');?>
  </body>
</html>
