<?php
  if(array_key_exists("signUp", $_POST)) {
    if (!$_POST['email'] || !$_POST['password']) {
      $error .= " Either Email or Password is not found<br>";
    } else {
      $link = mysqli_connect("shareddb-m.hosting.stackcp.net", "secretdiary-3130310a57", "xy3ekzujlz", "secretdiary-3130310a57");
      if(mysqli_connect_error()) {
        $error .=  "There was a problem with database<br>";
      } else {
        $query = "SELECT `id`, `password` FROM `tables` WHERE `email` = '".mysqli_real_escape_string($link, $_POST['email'])."'";
        $result = mysqli_query($link, $query);
        if(mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_array($result);
        /*  if($row['password'] == $_POST['password']) {
            echo "Email is already signed up with id=".$row['id'];
          }
          else {
            echo "Email is already signed up with id=".$row['id'].", but password is incorrect";
          } */
          $error .=  "Email is already signed up with id=".$row['id']."<br>";
        } else {
          $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
          $query = "INSERT INTO `tables` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".$hash."')";
                    
          if($result = mysqli_query($link, $query)) {
            $message .= "Sign Up successful!";
          }
          else {
            $message .=  "Sign Up failed";
          }
        }
      }
    }
  }
?>
