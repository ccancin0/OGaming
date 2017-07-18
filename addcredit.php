<?php include 'inc/header.php';
  if (!(session_status() == PHP_SESSION_ACTIVE)) {
    header('Location: login.php');
  }
?>
