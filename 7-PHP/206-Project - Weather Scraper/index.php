<?php
  $message = "";
  $error = "";
  $city= "";
  if (array_key_exists("city",$_GET)) {
    $city .= $_GET["city"];
    $city = str_replace(' ', '', $city); //remove space
    //check url exists or not
    $file_headers = @get_headers("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
    if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
      $error .= "Sorry!, city is not found.";
    }
    else {
      $forecast = file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
      //cut from string
      $firststring = explode('3 days)</span><p class="b-forecast__table-description-content"><span class="phrase">', $forecast);
      if (sizeof($firststring) > 1) {
        $secondstring = explode('.</span></p></td>', $firststring[1]); //array[1] stand for string after cutting
        if (sizeof($secondstring) > 1) {
            $message .= $secondstring[0]; //array[0] stand for string before cutting
        } else {
          $error .= "Sorry!, either city is not found or may be technical error.";
        }
      } else {
        $error .= "Sorry!, either city is not found or may be technical error.";
      }
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
              echo $city;
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
