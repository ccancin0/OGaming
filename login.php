<?php include 'inc/header.php';

  // session_start();
  // Message var
  $msg = '';
  $msgClass = 'block';
  // Check for submit
  if(filter_has_var(INPUT_POST, 'submit')) {
    require 'config/db.php';
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($stmt = $conn->prepare('SELECT * FROM users WHERE username=?')) {
      $stmt->bind_param('s', $username);
      $stmt->execute();
      $result = $stmt->get_result();
      $rows = $result->fetch_assoc();

      if(count($rows) > 0) {
        $array = array_values($rows);
        if($array[1] == $username && password_verify($password, $array[3])) {
          session_start();
          $_SESSION['username'] = $username;
          header('Location: index.php');
        }else {
          $msg = '*The username or password are invalid. Check for spelling errors and Caps Lock key then try again.';
        }
      }else {
        $msg = '*The username or password are invalid. Check for spelling errors and Caps Lock key then try again.';
      }
      $stmt->close();
    }
    //Close db connection
    mysqli_close($conn);
  }
?>
<div class="container white">
  <div class="extra-border-top"></div>
  <header class="createForm">
    <h1>LOG IN</h1>
  </header>
  <div class="extra-border-bottom"></div>
  <div class="login-container">
    <img src="./img/login-bg.jpg">
      <div class="login-form">
        <div class="login-header">
          <h3>Log In</h3>
          <span class="secure-icon">Secure Server</span>
        </div>
        <form class="log-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <?php if($msg == ''): ?>
          <?php else: ?>
            <div class="signin-msg" style="display:<?php echo $msgClass; ?>;"><?php echo $msg ?></div>
          <?php endif; ?>
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="password" placeholder="Password">
          <div class="remember">
            <input class="checkbox" type="checkbox" name="remember" value="1">
            Remember ID
            <span>(What's this?)</span>
          </div>
          <button type="submit" name="submit">Login</button>
          <a class="fb-link" href="#">Connect with<br>Social ID</a>
          <a class="forgot-link" href="#">Forgot your ID or password?</a>
        </form>
        <div class="createAccount">
          <h3>Don't have an account?</h3>
          <p>Register now for a free OGPlanet Account to start playing any of our Free-To-Play Games, it’s quick and easy!</p>
          <a href="<?php echo ROOT_URL; ?>signup.php">Free Signup</a>
        </div>
      </div>
  </div>
  <?php include 'inc/footer.php'; ?>
</div>
