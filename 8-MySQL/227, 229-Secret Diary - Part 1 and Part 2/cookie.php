<?php
  if(array_key_exists('id', $_COOKIE)) {
    if($_COOKIE['id']) {
      $_SESSION['id'] = $_COOKIE['id'];
      if(array_key_exists('logged_out', $_POST)) {
        setcookie("id", "", time() - 60*60, "/");
        header("Location: index.php");
        exit();
      }
    }
  }
  else {
    if(array_key_exists('logged_out', $_POST)) {
      header("Location: index.php");
    }
    if(array_key_exists('id', $_SESSION)) {
      if($_SESSION['id'] == "") {
        header("Location: index.php");
        exit();
      }
    }
  }
?>
