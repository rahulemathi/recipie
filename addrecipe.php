<?php 
require_once './config.php';
if(empty($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
}


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
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
    

    if (file_exists($target_file)) {
        $uploadOk = 0;
      }

      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    } else {
      // upload failed
    }
  }
    

    $userId = (int)$_SESSION['user_id'];
    $sql = "INSERT INTO recipe (user_id, image, title, description, time, tag, instructions, ingredients, tools) VALUES('$userId', '$image', '$title', '$description', '$time','$tag', '$instruction', '$ingredients', '$tools')";
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
  <main class="page">
    <section class="contact-container">
      <article class="contact-info" style="max-width:800px;margin:0 auto;width:100%;">
        <h3>Add a new recipe</h3>
        <form action="" method="POST" enctype="multipart/form-data" class="form contact-form" id="recipeForm">
          <div class="form-row">
            <label for="image" class="form-label">Recipe image</label>
            <input type="file" id="image" name="image" class="form-input" accept="image/*" required />
          </div>

          <div class="form-row" id="imagePreviewRow" style="display:none;">
            <label class="form-label">Preview</label>
            <div class="image-preview" style="display:flex;align-items:center;gap:1rem;">
              <img id="imagePreview" src="" alt="preview" style="max-width:180px;border-radius:0.25rem;display:block;" />
              <button type="button" class="btn" id="removeImageBtn">Remove</button>
            </div>
          </div>

          <div class="form-row">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-input" placeholder="Recipe title" required />
          </div>

          <div class="form-row">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-textarea" placeholder="Short description" rows="4" required></textarea>
          </div>

          <div class="form-row">
            <label for="time" class="form-label">Times</label>
            <input type="text" id="time" name="time" class="form-input" placeholder="prep, cook, servings (e.g. 15, 30, 4)" required />
          </div>

          <div class="form-row">
            <label for="tag" class="form-label">Tags</label>
            <input type="text" id="tag" name="tag" class="form-input" placeholder="comma separated tags" />
          </div>

          <div class="form-row">
            <label for="instruction" class="form-label">Instructions</label>
            <textarea id="instruction" name="instruction" class="form-textarea" placeholder="Step by step instructions (use commas to separate)" rows="6" required></textarea>
          </div>

          <div class="form-row">
            <label for="ingredients" class="form-label">Ingredients</label>
            <input type="text" id="ingredients" name="ingredients" class="form-input" placeholder="comma separated ingredients" required />
          </div>

          <div class="form-row">
            <label for="tools" class="form-label">Tools</label>
            <input type="text" id="tools" name="tools" class="form-input" placeholder="comma separated tools" />
          </div>

          <button type="submit" name="submit" class="btn">Add Recipe</button>
        </form>
      </article>
    </section>
  </main>

  <script>
  (function(){
    var fileInput = document.getElementById('image');
    var previewImg = document.getElementById('imagePreview');
    var previewRow = document.getElementById('imagePreviewRow');
    var removeBtn = document.getElementById('removeImageBtn');
    if(!fileInput || !previewImg || !previewRow || !removeBtn) return;

    fileInput.addEventListener('change', function(e){
      var file = e.target.files && e.target.files[0];
      if(!file){
        previewRow.style.display = 'none';
        return;
      }
      var reader = new FileReader();
      reader.onload = function(ev){
        previewImg.src = ev.target.result;
        previewRow.style.display = 'block';
      };
      reader.readAsDataURL(file);
    });

    removeBtn.addEventListener('click', function(){
      fileInput.value = '';
      previewImg.src = '';
      previewRow.style.display = 'none';
    });
  })();
  </script>

  <?php include('./includes/footer.php');?>
</body>
</html>