<?php
  if (array_key_exists("content", $_POST) && array_key_exists("id", $_POST) ) {
    $link = mysqli_connect("shareddb-m.hosting.stackcp.net", "secretdiary-3130310a57", "xy3ekzujlz", "secretdiary-3130310a57");
    if(mysqli_connect_error()) {
      echo "There was a problem with database";
    }
    $query = "UPDATE `tables` SET diary = '".$_POST['content']."' WHERE id = '".$_POST['id']."' LIMIT 1";
    mysqli_query($link, $query);
  }
  elseif (!array_key_exists("id", $_POST)) {
    header("Location: index.php");
  }
 ?>
