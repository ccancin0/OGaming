<?php include '../inc/header.php';
  if (!(session_status() == PHP_SESSION_ACTIVE)) {
    header('Location: ../login.php');
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
  <?php include '../inc/footer.php'; ?>
</div>
