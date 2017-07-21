<?php include '../inc/header.php';
      require '../config/db.php';

  if (!(session_status() == PHP_SESSION_ACTIVE)) {
    header('Location: ../login.php');
  }

  // Message var
  $msg = '';
  $msgClass = 'block';
  // echo $msg;
  if(filter_has_var(INPUT_POST, 'submit')) {

    // Get form data
    $username = htmlspecialchars($_POST['username']);
    $mail = htmlspecialchars($_POST['mail']);
    $pass = htmlspecialchars($_POST['pass']);
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass1'];
    // echo $email;
    // echo $username;
    // echo $password;
    echo 'password-length: '.strlen($pass1);
    if($stmt = $conn->prepare('SELECT * FROM users WHERE username=?')) {
      $stmt->bind_param('s', $username);
      $stmt->execute();
      $result = $stmt->get_result();
      $rows = $result->fetch_assoc();
      if(count($rows) > 0) {
        $array = array_values($rows);
        $len = strlen($pass1);
        echo $pass1 .'\n';
        echo $len;
        var_dump($pass1);
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL) === false && $pass == '*******' && $mail != $array[2]) {
          if($stmt = $conn->prepare('UPDATE users SET email=? WHERE username=?')) {
            $stmt->bind_param('ss', $mail, $username);
            $stmt->execute();
            $stmt->close();
            $msg = '1';
          }
        }elseif(password_verify($pass, $array[3]) && $pass1 == $pass2 && $pass != $pass1 && strlen($pass1) >= 8 && strlen($pass1) <= 16) {
          if($stmt = $conn->prepare('UPDATE users SET password=? WHERE username=?')) {
            $pass1 = password_hash(htmlspecialchars($pass1), PASSWORD_DEFAULT);
            $stmt->bind_param('ss', $pass1, $username);
            $stmt->execute();
            $stmt->close();
            $msg = '2';
          }
        }elseif(password_verify($pass, $array[3]) && $pass1 == $pass2 && $pass != $pass1 && $mail != $array[2] && strlen($pass1) >= 8 && strlen($pass1) <= 16 && !filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
          if($stmt = $conn->prepare('UPDATE users SET email=?, password=? WHERE username=?')) {
            $pass1 = password_hash(htmlspecialchars($pass1), PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $mail, $pass1, $username);
            $stmt->execute();
            $stmt->close();
            $msg = '3';
          }
        }else {
          $msg = '4';
        }
      }else {
        $msg = '5';
      }
      // $stmt->close();
    }
    //Close db connection
    mysqli_close($conn);
    // echo $msg;
  }
?>
<div class="container white">
  <div class="extra-border-top"></div>
  <header class="createForm">
    <h1>MY ACCOUNT</h1>
  </header>
  <div class="extra-border-bottom"></div>
  <div class="right-content left">
    <a href="<?php echo ROOT_URL; ?>user/myaccount.php">Home</a>
    <a href="<?php echo ROOT_URL; ?>user/profile.php">Profile</a>
    <a href="#">Astros</a>
    <a href="">Messages</a>
    <a href="#">Friends</a>
    <a href="#">Coupon</a>
  </div>
  <div class="right">
    <h2>My Profile</h2>
    <form class="info" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <?php if($msg == '1'): ?>
        <p class="success" style="display:<?php echo $msgClass; ?>"><?php echo 'Your email has been successfully updated! (Will update after you relog)'; ?></p>
      <?php elseif($msg == '2'): ?>
        <p class="success" style="display:<?php echo $msgClass; ?>"><?php echo 'Your password has been successfully updated! (Will take affect after you relog)'; ?></p>
      <?php elseif($msg == '3'): ?>
        <p class="success" style="display:<?php echo $msgClass; ?>"><?php echo 'Your password and email have been successfully updated! (Will take affect after you relog)'; ?></p>
      <?php elseif($msg == '4'): ?>
        <p class="err" style="display:<?php echo $msgClass; ?>"><?php echo 'Please make sure you have entered valid information. (Password must be 8-16 in length)'; ?></p>
      <?php elseif($msg == '5'): ?>
        <p class="err" style="display:<?php echo $msgClass; ?>"><?php echo 'Unexpected error occured.'; ?></p>
      <?php else: ?>
      <?php endif; ?>
      <div class="form-cont">
        <ul>
          <li><span>User ID</span><input readonly="" name="username" type="text" value="<?php echo $_SESSION['username']; ?>"></li>
          <li id="pass"><span><span class="new" style="display: none;">Old</span> Password</span><input type="text" name="pass" readonly="" value="*******"><a class="open" href="javascript:">Change Password</a></li>
          <li class="pass2" style="display: none;"><span>New Password</span><input type="password" name="pass1" readonly=""></li>
          <li class="pass2" style="display: none;"><span>Confirm Password</span><input type="password" name="pass2" readonly=""></li>
          <li id="email"><span><span class="new" style="display: none;">New </span>Email</span><input type="email" name="mail" readonly="" value="<?php echo $_SESSION['email']; ?>"><a class="open" href="javascript:">Change Email</a></li>
        </ul>
      </div>
      <button style="display: none;" type="submit" name="submit">Submit</button>
      <p>OGPlanet will never ask for your password. Do not share your personal infomation with anyone!!
      Your Email address will be used for password recovery and prize confirmation.
      Read <a href="#">Privacy Policy</a> for more information.</p>
    </form>
  </div>
  <?php include '../inc/footer.php'; ?>
</div>
