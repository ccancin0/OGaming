<?php include 'inc/header.php';
      require 'config/db.php';

  // Message vars
  $userError = '';
  $emailError = '';
  $reemailError = '';
  $passError = '';
  $repassError = '';

  // Check for submit
  if(filter_has_var(INPUT_POST, 'submit')) {

    // Get form data
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $email2 = $_POST['email2'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];


    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
      $emailError = 'You have entered an invalid Email address';
    }
    if($email != $email2 || filter_var($email2, FILTER_VALIDATE_EMAIL) === false) {
      $reemailError = 'Email addresses do not match';
    }
    if(strlen($username) < 6 ||  strlen($username) > 16 || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username)) {
      $userError = '6-16 character, no symbols';
    }
    if(strlen($password) < 8) {
      $passError = 'Password must be at least 8 letters';
    }
    if($password2 != $password) {
      $repassError = 'Passwords do not match';
    }
    if(empty($userError) && empty($emailError) && empty($reemailError) && empty($passError) && empty($repassError)) {
      $stmt = $conn->prepare('INSERT INTO Users (username, email, password) VALUES(?, ?, ?)');
      $password = password_hash(htmlspecialchars($password), PASSWORD_DEFAULT);
      $stmt->bind_param('sss', $username, $email, $password);
      $stmt->execute();
      $stmt->close();
      session_start();
      $_SESSION['username'] = htmlentities($username);
      header('Location: index.php');
    }
}
  //Close db connection
  mysqli_close($conn);
?>
<div class="container white">
  <div class="extra-border-top"></div>
  <header class="createForm">
    <h1>CREATE AN ACCOUNT</h1>
  </header>
  <div class="extra-border-bottom"></div>
  <form class="signup-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <h1>CREATE YOUR <span>FREE</span> ACCOUNT!</h1>
    <input type="text" name="username" placeholder="USER NAME">
    <p class="error"><?php echo $userError; ?></p>
    <input type="email" name="email" placeholder="EMAIL ADDRESS">
    <p class="error"><?php echo $emailError; ?></p>
    <input type="email2" name="email2" placeholder="CONFIRM EMAIL ADDRESS">
    <p class="error"><?php echo $reemailError; ?></p>
    <input type="password" name="password" placeholder="PASSWORD">
    <p class="error"><?php echo $passError; ?></p>
    <input type="password" name="password2" placeholder="CONFIRM PASSWORD">
    <p class="error"><?php echo $repassError; ?></p>
    <div class="agree">
      By clicking submit, I agree to the <a href="#">User Agreement and Privacy</a> and that I am at least 13 years of age.
    </div>
    <button type="submit" name="submit">Submit</button>
  </form>
  <?php include 'inc/footer.php'; ?>
</div>
