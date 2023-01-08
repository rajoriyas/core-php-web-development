<?php
  $message = "";
  $error = "";
  if (array_key_exists("city",$_GET)) {
    //api with own key
    //urlencode is used to remove special symbol and spaces etc etc...
    $url = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET["city"])."&appid=c05f8ebdd6152eefc42d5d4a74f458c0");
    $weatherArray = json_decode($url, true);
    //print_r($weatherArray);
    if($weatherArray['cod'] == 200) {
      //inval() for making an integer
      $message .= "The weather in ".$_GET['city']." is currently ".$weatherArray['weather'][0]['description'].". The temperature is ".intval($weatherArray['main']['temp'] - 273)."&deg;C. The wind speed is ".$weatherArray['wind']['speed']."m/sec.";
    } else {
      $error .= "City is not found - Please try again!";
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Weather Scraper</title>
    <style type="text/css">
      body {
        background: url("background.jpeg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
      .container {
        /* vertical alignment*/
        position: absolute;
        top: 50%;
        left: 50%;
        -moz-transform: translateX(-50%) translateY(-50%);
        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);

        text-align: center;
        width: 450px;
      }
      #cityloc {
        margin-top: 20px;
      }
      #message {
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h2>What's The Weather?</h2>
      <form>
        <div class="form-group">
          <label for="cityLabel">Enter the name of city.</label>
          <input type="text" class="form-control" name="city" id="cityloc" placeholder="Eg. London, Tokyo" value = '<?php
            if (array_key_exists("city",$_GET)) {
              echo $_GET['city'];
            }
            ?>'
            >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <div id="message">
          <?php
            if ($message != "") {
              echo '<div class="alert alert-success" role="alert">'.$message.'</div>';
            } elseif ($error != "") {
              echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
            }
          ?>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
