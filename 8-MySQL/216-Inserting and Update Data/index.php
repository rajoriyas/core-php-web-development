<?php
  //mysqli_connect("server","user","password", "database_name");
  $link = mysqli_connect("shareddb-m.hosting.stackcp.net","MySqlDatabase-313031dece","gw9j67ucmq", "MySqlDatabase-313031dece");
  if (mysqli_connect_error()) {
    //die keyword is used to terminate program at this point.
    die("There was an error");
  }
  //language in "" is sql language

  //this query is used to insert data into table
  //$query = "INSERT INTO `user` (`email`, `password`) VALUES ('rajoriya.rahul04@hotmail.com', 'r@huls1995')";
  //mysqli_query($link, $query);

  //this query is used to update data in tables
  $query = "UPDATE `user` SET email = 'rajoriya.rahul@ymail.com' WHERE id = 1 LIMIT 1";
  mysqli_query($link, $query);

  //this query is used to select everything
  $query = "SELECT * FROM user"; // user stand for table

  $result= mysqli_query($link, $query);
  if($result) {
    $row = mysqli_fetch_array($result);
    //print_r($row);
    echo "Id:".$row["id"]."<br>Email:".$row["email"]."<br>Password:".$row["password"];
  }
 ?>
