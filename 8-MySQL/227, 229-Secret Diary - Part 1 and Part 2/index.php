<?php
  $message = "";
  $error = "";
  session_start();
  $_SESSION['id'] = "";
  //check cookie and forward to logged in page
  if(array_key_exists('id', $_COOKIE)) {
    if($_COOKIE['id']) {
      header("Location: loggedin.php");
      exit();
    }
  }
  include("signup.php");
  include("login.php");
  //There is direct method to fetch and insert somewhere id --> mysqli_insert_id($link) ;
  include("header.php");
 ?>
    <div class="container" id="index">
      <form method="post" id="signupform">
        <div class="form-group">
          <h1>Secret Diary</h1>
          <div class="message">
            <?php
              if($message != "") {
                echo '<div class="alert alert-success" role="alert">'.$message.'</div>';
              }
              if ($error != "") {
                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
              }
             ?>
          </div>
          <h4>Email address</h4>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <h4>Password</h4>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" name='signUp' class="btn btn-primary">Sign Up</button><br>
        <button type="button" class="btn btn-link toggleform">Login</button>
      </form>

      <form method="post" id="loginform">
        <div class="form-group">
          <h1>Secret Diary</h1>
          <div class="message">
            <?php
              if($message != "") {
                echo '<div class="alert alert-success" role="alert">'.$message.'</div>';
              }
              if ($error != "") {
                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
              }
             ?>
          </div>
          <div class="message">
          </div>
          <h4>Email address</h4>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <h4>Password</h4>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name='stayedlogin' value='1'>
          <label class="form-check-label" for="exampleCheck1">Stay login</label>
        </div>
        <button type="submit" name='login' class="btn btn-primary">Login</button><br>
        <button type="button" class="btn btn-link toggleform">Sign Up</button>
      </form>
    </div>
<?php include("footer.php") ?>
