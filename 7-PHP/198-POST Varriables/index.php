<?php
  if($_POST) {
    $family = array("rahul", "rajoriyas", "rajoriyarahuls");
    $isKnown = false;
    foreach ($family as $value) {
      if($_POST['name'] == $value) {
        $isKnown = true;
      }
    }
    if ($isKnown) {
      echo "<h1>Hey, there! ".$_POST['name']."</h1>";
    } else {
      echo "<h1>I don't know you.</h1>";
    }

  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      <label for="label">Enter your name</label><br>
      <input type="text" name="name" value="">
      <input type="submit" name="Go" value="Go">
      <br>
      <br>
    </form>
  </body>
</html>
