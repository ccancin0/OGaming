<?php require $_SERVER['DOCUMENT_ROOT'].'/OG/config/config.php';
  if (isset($_COOKIE["PHPSESSID"])) {
    session_start();
  }

  $title = $_SERVER['REQUEST_URI'];
  $homepage = '/OG/';
  $home = '';
  $nav = '';
  $logged = '';
  // $title = '';
  if($title != $homepage) {
    $home = 'fixed-off';
    $nav = 'sub-nav-off';
    $logged = 'loggedIn-off';
  }

  switch ($title) {
    case '/OG/signup.php':
      $title = 'Register';
      break;
    case '/OG/login.php':
      $title = ': ID';
      break;
    case '/OG/forum.php':
      $title = 'Forum';
      break;
    case '/OG/addcredit.php':
      $title = 'Get Astros';
      break;
    case '/OG/support.php':
      $title = 'Support';
      break;
    case '/OG/new.php':
      $title = 'News';
      break;
    default:
      $title = 'Rumble Fighter';
      break;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>OGaming | <?php echo $title ?></title>
  <link rel="stylesheet" href="<?php echo ROOT_URL; ?>css/main.css">
  <link rel="stylesheet" href="<?php echo ROOT_URL; ?>css/media.css">
</head>
<body>
  <header class="nav-wrapper <?php echo $home; ?>">
    <nav class="container">
      <a id="logo" href="<?php echo ROOT_URL; ?>"></a>
      <div class="menu-nav">
        <a id="games" href="<?php echo ROOT_URL; ?>new.php">NEWS</a>
        <a href="<?php echo ROOT_URL; ?>addcredit.php">ADD CREDIT</a>
        <a href="<?php echo ROOT_URL; ?>forum.php">FORUMS</a>
        <a href="<?php echo ROOT_URL; ?>support.php">SUPPORT</a>
      </div>
      <div class="register">
        <?php if(isset($_COOKIE["PHPSESSID"])): ?>
          <!-- <div class="logged-nav"> -->
          <div class="loggedIn <?php echo $logged; ?>">
            <span id="user-icon"></span>
            <span id="user"><?php echo $_SESSION['username']; ?></span>
          </div>
          <div class="sub-nav <?php echo $nav; ?>">
            <a id="astro" href="<?php echo ROOT_URL; ?>addcredit.php">Astros</a>
            <a href="#">Messages</a>
            <a href="<?php echo ROOT_URL; ?>user/myaccount.php">My Account</a>
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
