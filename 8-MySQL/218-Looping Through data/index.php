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
  //$query = "UPDATE `user` SET email = 'rajoriya.rahul@ymail.com' WHERE id = 1 LIMIT 1";
  //mysqli_query($link, $query);

  //this query is used to select everything
  //$query = "SELECT * FROM user WHERE id = 1"; // user stand for table
  //mysqli_query($link, $query);

  //$query = "SELECT password FROM user WHERE email = 'rajoriya.rahul04@hotmail.com'";

  //$query = "SELECT email FROM user WHERE email LIKE '%ymail.com'"; //it means email which end with ymail.com

  //$query = "SELECT email FROM user WHERE password LIKE '%yara%'"; //it means password which has word like yara

  //$query = "SELECT `password` FROM user WHERE id >= 2 AND password LIKE '%YARA%'";

/*$name = "Rajoriya's";
  $query = "SELECT email FROM user WHERE name = '".$name."'";
  //ERROR:- noting get in output

  //this query is used to avoid injection
  $query = "SELECT email FROM user WHERE name = '".mysqli_real_escape_string($link, $name)."'"; */

/*  if($result= mysqli_query($link, $query)) {
    while ($row = mysqli_fetch_array($result)) {  //the condition is until operation is being successful to insert data
      print_r($row);
      //echo "Id:".$row["id"]."<br>Email:".$row["email"]."<br>Password:".$row["password"]."<br><br>";
    }
  }*/
  $error = "";
  $message = "";
  if (array_key_exists('email', $_POST) && array_key_exists('email', $_POST)) {
    if($_POST['email'] == "" || $_POST['password'] == "") {
      $error = "Please enter valid entries.";
    } else {
      $query = "SELECT id, password FROM user WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
      $result = mysqli_query($link, $query);
      //count the rows
      if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['password'] == $_POST['password']) {
          $message = "Login successfully!";
        }
        else {
          $error = "Invalid Password!";
        }
      }
      else {
        $query = "INSERT INTO `user` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";
        if($result = mysqli_query($link, $query)) {
            $message = "Sign Up successfully!";
        }
        else {
          $error = "There is problem in signup, Try after some time.";
        }
      }
    }
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>WebR</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style type="text/css">
      .container {
        margin-top: 20px;
      }
      #error {
        margin-top: 20px;
      }
      #message {
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <form method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <?
        if ($error != "") {
          echo '<div id="error" class="alert alert-danger" role="alert">'.$error.'</div>';
        }
        if ($message != "") {
          echo '<div id="message" class="alert alert-success" role="alert">'.$message.'</div>';
        }
      ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
