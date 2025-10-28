<?php 
require_once './config.php';

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)){ $errors[] = 'Valid email is required'; }
    if($password === ''){ $errors[] = 'Password is required'; }

    if(empty($errors)){
        $stmt = $link->prepare('SELECT id, name, email, password_hash FROM users WHERE email = ? LIMIT 1');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if($user && password_verify($password, $user['password_hash'])){
            $_SESSION['user_id'] = (int)$user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Invalid credentials';
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
    <title>Login</title>
    <?php include('./includes/header-scripts.php');?>
  </head>
  <body>
    <?php include('./includes/navbar.php');?>
    <main class="page">
      <section class="contact-container">
        <article class="contact-info">
          <h3>Login</h3>
          <?php if(!empty($errors)): ?>
            <ul style="color:red;">
              <?php foreach($errors as $e): ?>
                <li><?php echo htmlspecialchars($e); ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
          <form class="form contact-form" action="" method="POST">
            <div class="form-row">
              <label for="email" class="form-label">email</label>
              <input type="email" id="email" name="email" class="form-input" required />
            </div>
            <div class="form-row">
              <label for="password" class="form-label">password</label>
              <input type="password" id="password" name="password" class="form-input" required />
            </div>
            <button type="submit" class="btn">Login</button>
          </form>
        </article>
      </section>
    </main>
    <?php include('./includes/footer.php');?>
  </body>
</html>


