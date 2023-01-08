<?php
  print_r($_POST);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>A Contact from</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>Get in touch!</h1>
      <div id="error"></div>
      <form method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputSubject1">Subject</label>
          <input type="text" class="form-control" name="subject" id="exampleInputSubject1" placeholder="Enter Subject">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">What would you like to ask us?</label>
          <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $("form").submit(function(e){
        e.preventDefault();
        var error = "";
      /*  function isEmail(email) {
          var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          return regex.test(email);
        }
        if(isEmail($("#exampleInputEmail1").val()) == false) {
          error += "<p>Invalid email address</p>"
        } */
        if($("#exampleInputEmail1").val() == "") {
          error += "The email address is required.<br>"
        }
        if($("#exampleInputSubject1").val() == "") {
          error += "The subject field is required.<br>"
        }
        if($("#exampleFormControlTextarea1").val() == "") {
          error += "The content field is required.<br>"
        }
        if (error != "") {
          $("#error").html('<div class="alert alert-danger" role="alert"><strong>There were following error(s) found in form:</strong><br>'+ error  +'</div>');
        } else {
          $("form").unbind("submit").submit();
        }

      });
    </script>
  </body>
</html>
