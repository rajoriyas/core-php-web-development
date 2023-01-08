<?php
  if(array_key_exists("login", $_POST)) {
    if (!$_POST['email'] || !$_POST['password']) {
      echo " Either Email or Password is not found<br>";
    } else {
      $link = mysqli_connect("shareddb-m.hosting.stackcp.net", "secretdiary-3130310a57", "xy3ekzujlz", "secretdiary-3130310a57");
      if(mysqli_connect_error()) {
        $error .=  "There was a problem with database";
      } else {
        $query = "SELECT `id`, `password` FROM `tables` WHERE `email` = '".mysqli_real_escape_string($link, $_POST['email'])."'";
        $result = mysqli_query($link, $query);
        if(mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_array($result);
          if(password_verify($_POST['password'], $row['password'])) {
            $_SESSION['id'] = $row['id'];
            //set cookie
            if (array_key_exists('stayedlogin', $_POST)) {
              if($_POST['stayedlogin'] == '1') {
                setcookie("id", $_SESSION['id'], time() + 60*60*24, "/");
              }
            }
            header("Location: loggedin.php");
            exit();
          }
          else {
            $error .=  "Password is incorrect";
          }
        } else {
            $error .=  "No account exists";
        }
      }
    }
  }
 ?>
