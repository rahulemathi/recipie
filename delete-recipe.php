<?php
require_once './config.php';
if(empty($_SESSION['user_id'])){
  header('Location: login.php');
  exit;
}

$id = (int)($_POST['id'] ?? 0);
if($id <= 0){
  header('Location: index.php');
  exit;
}

// Verify ownership
$uid = (int)$_SESSION['user_id'];
$stmt = $link->prepare('SELECT user_id, image FROM recipe WHERE id = ? LIMIT 1');
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($ownerId, $imageName);
if($stmt->fetch()){
  $stmt->close();
  if((int)$ownerId !== $uid){
    header('Location: single-recipe.php?id='.$id);
    exit;
  }

  // Delete record
  $stmtDel = $link->prepare('DELETE FROM recipe WHERE id = ? LIMIT 1');
  $stmtDel->bind_param('i', $id);
  if($stmtDel->execute()){
    $stmtDel->close();
    // Optionally delete image file
    if(!empty($imageName)){
      $path = __DIR__ . '/assets/recipes/' . $imageName;
      if(is_file($path)){
        @unlink($path);
      }
    }
    header('Location: index.php');
    exit;
  } else {
    $stmtDel->close();
    header('Location: single-recipe.php?id='.$id);
    exit;
  }
} else {
  $stmt->close();
  header('Location: index.php');
  exit;
}
?>


