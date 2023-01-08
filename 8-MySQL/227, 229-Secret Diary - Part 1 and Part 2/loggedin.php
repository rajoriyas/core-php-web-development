<?php
  session_start();
  include("cookie.php");
  $link = mysqli_connect("shareddb-m.hosting.stackcp.net", "secretdiary-3130310a57", "xy3ekzujlz", "secretdiary-3130310a57");
  if(mysqli_connect_error()) {
    echo "There was a problem with database";
  }
  $query = "SELECT `diary` FROM `tables` WHERE `id` = '".$_SESSION['id']."'";
  $result = mysqli_query($link, $query);
  if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
  }
  include("header.php");
?>
    <div class="container">
      <nav class="navbar fixed-top navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="loggedin.php">Secret Diary</a>
        <div class="float-xs-right">
          <form method="post">
            <button class="btn btn-outline-success" type="submit" name="logged_out">Logout</button>
          </from>
        </div>
      </nav>
      <div class="container-fluid">
        <textarea class="form-control" id="diary" name="diary"><?php echo $row['diary']; ?></textarea>
      </div>
    </div>
<?php include("footer.php") ?>
