<?php 
require_once './config.php';

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if($name === ''){ $errors[] = 'Name is required'; }
    if($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)){ $errors[] = 'Valid email is required'; }
    if(strlen($password) < 6){ $errors[] = 'Password must be at least 6 characters'; }
    if($password !== $confirm){ $errors[] = 'Passwords do not match'; }

    if(empty($errors)){
        // Check if email exists
        $stmt = $link->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows > 0){
            $errors[] = 'Email already registered';
        }
        $stmt->close();

        if(empty($errors)){
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $link->prepare('INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)');
            $stmt->bind_param('sss', $name, $email, $passwordHash);
            if($stmt->execute()){
                $_SESSION['user_id'] = $stmt->insert_id;
                $_SESSION['user_name'] = $name;
                $_SESSION['user_email'] = $email;
                header('Location: index.php');
                exit;
            } else {
                $errors[] = 'Registration failed. Please try again.';
            }
            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <?php include('./includes/header-scripts.php');?>
  </head>
  <body>
    <?php include('./includes/navbar.php');?>
    <main class="page">
      <section class="contact-container">
        <article class="contact-info">
          <h3>Create your account</h3>
          <?php if(!empty($errors)): ?>
            <ul style="color:red;">
              <?php foreach($errors as $e): ?>
                <li><?php echo htmlspecialchars($e); ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
          <form class="form contact-form" action="" method="POST">
            <div class="form-row">
              <label for="name" class="form-label">name</label>
              <input type="text" id="name" name="name" class="form-input" required />
            </div>
            <div class="form-row">
              <label for="email" class="form-label">email</label>
              <input type="email" id="email" name="email" class="form-input" required />
            </div>
            <div class="form-row">
              <label for="password" class="form-label">password</label>
              <input type="password" id="password" name="password" class="form-input" required />
            </div>
            <div class="form-row">
              <label for="confirm_password" class="form-label">confirm password</label>
              <input type="password" id="confirm_password" name="confirm_password" class="form-input" required />
            </div>
            <button type="submit" class="btn">Register</button>
          </form>
        </article>
      </section>
    </main>
    <?php include('./includes/footer.php');?>
  </body>
</html>


