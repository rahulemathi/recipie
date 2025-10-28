<nav class="navbar">
      <div class="nav-center">
        <div class="nav-header">
          <a href="index.php" class="nav-logo">
            <img src="./assets/logo.svg" alt="simply recipes" />
          </a>
          <button class="nav-btn btn">
            <i class="fas fa-align-justify"></i>
          </button>
        </div>
        <div class="nav-links">
          <a href="index.php" class="nav-link"> home </a>
          <a href="about.php" class="nav-link"> about </a>
          <a href="tags.php" class="nav-link"> tags </a>
          <a href="recipes.php" class="nav-link"> recipes </a>

          <?php if(!empty($_SESSION['user_id'])): ?>
            <span class="nav-link">Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
            <a href="addrecipe.php" class="nav-link"> add recipe </a>
            <a href="my-recipes.php" class="nav-link"> my recipes </a>
            <div class="nav-link contact-link">
              <a href="logout.php" class="btn"> logout </a>
            </div>
          <?php else: ?>
            <a href="login.php" class="nav-link"> login </a>
            <div class="nav-link contact-link">
              <a href="register.php" class="btn"> register </a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </nav>