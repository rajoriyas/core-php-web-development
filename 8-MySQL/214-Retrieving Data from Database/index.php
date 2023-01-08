<?php
  //mysqli_connect("server","user","password", "database_name");
  $link = mysqli_connect("shareddb-m.hosting.stackcp.net","MySqlDatabase-313031dece","gw9j67ucmq", "MySqlDatabase-313031dece");
  if (mysqli_connect_error()) {
    //die keyword is used to terminate program at this point.
    die("There was an error");
  }
  //language in "" is sql language

  //this query command is used to select everything
  $query = "SELECT * FROM user"; // user stand for table
  $result= mysqli_query($link, $query);
  if($result) {
    $row = mysqli_fetch_array($result);
    //print_r($row);
    echo "Id:".$row["id"]."<br>Email:".$row["email"]."<br>Password:".$row["password"];
  }
 ?>
