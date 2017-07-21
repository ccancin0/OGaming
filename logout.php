<?php
  session_start();
  $_SESSION = array();
  // session_unset();
  // unset($_SESSION['username']);
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
  // Finally, destroy the session.
  session_destroy();

  // header('Location: index.php');
  header('Location: ' . $_SERVER['HTTP_REFERER']);
 ?>
