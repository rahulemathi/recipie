<?php 
require_once './config.php';


if(isset($_POST['submit'])){
    $image = $_FILES["image"]["name"];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $time = $_POST['time'];
    $tag = $_POST['tag'];
    $instruction = $_POST['instruction'];
    $ingredients = $_POST['ingredients'];
    $tools = $_POST['tools'];   
    
    $target_dir = "assets/recipes/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
    

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
    

    $sql = "INSERT INTO recipe (image, title, description, time, tag, instructions, ingredients, tools) VALUES('$image', '$title', '$description', '$time','$tag', '$instruction', '$ingredients', '$tools')";
    if(mysqli_query($link,$sql)){
        echo "recipe added successfully";
        header("location: index.php");
    }else{
        echo "failed to add recipe";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('./includes/header-scripts.php');?>
</head>
<body>
<?php include('./includes/navbar.php');?>
    <form action="" method="POST" enctype="multipart/form-data" class="adding">
        <input type="file" name="image" placeholder="insert image">
        <input type="text" name="title" placeholder="title">
        <textarea type="text" name="description" placeholder="description" rows="4"></textarea>
        <input type="text" name="time" placeholder="prepration time, cooking time, serving">
        <input type="text" name="tag" placeholder="add tags">
        <textarea type="text" name="instruction" placeholder="add instructions" rows="4"></textarea>
        <input type="text" name="ingredients" placeholder="add ingredients">
        <input type="text" name="tools" placeholder="add tools">
        <input type="submit" name="submit" class="btn">
    </form>

    <?php include('./includes/footer.php');?>
</body>
</html>