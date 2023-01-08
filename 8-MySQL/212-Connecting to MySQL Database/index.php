<?php
  mysqli_connect("shareddb-m.hosting.stackcp.net","MySqlDatabase-313031dece","gw9j67ucmq");
  if (mysqli_connect_error()) {
    echo "There was an error";
  } else {
    echo "Successfully connected!";
  }
 ?>
