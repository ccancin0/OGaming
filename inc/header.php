<?php require 'config/config.php';

  if (isset($_COOKIE["PHPSESSID"])) {
    session_start();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>OGaming</title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <header class="nav-wrapper">
    <nav class="container">
      <a id="logo" href="<?php echo ROOT_URL; ?>"></a>
      <div class="menu-nav">
        <a id="games" href="#">GAMES</a>
        <a href="">FORUMS</a>
        <a href="<?php echo ROOT_URL; ?>addcredit.php">ADD CREDIT</a>
        <a href="">SUPPORT</a>
      </div>
      <div class="register">
        <?php if(isset($_COOKIE["PHPSESSID"])): ?>
          <!-- <div class="logged-nav"> -->
          <div class="loggedIn">
            <span id="user-icon"></span>
            <span id="user"><?php echo $_SESSION['username']; ?></span>
          </div>
          <div class="sub-nav">
            <a id="astro" href="#">Astros</a>
            <a href="#">Messages</a>
            <a href="#">My Account</a>
            <a id="logout" href="<?php echo ROOT_URL; ?>logout.php">Logout</a>
          </div>
          <!-- </div> -->
        <?php else: ?>
          <a id="signup" href="<?php echo ROOT_URL; ?>signup.php"></a>
          <a id="login" href="<?php echo ROOT_URL; ?>login.php"></a>
        <?php endif; ?>
      </div>
    </nav>
  </header>
