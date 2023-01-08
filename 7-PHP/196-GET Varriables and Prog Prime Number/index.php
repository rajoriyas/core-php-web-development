<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form>
      <label for="label">Enter number</label><br>
      <input type="text" name="number" value="">
      <input type="submit" name="Go" value="Go">
      <br>
      <br>
    </form>
  </body>
</html>
<?php
  if(is_numeric($_GET['number']) && $_GET['number'] > 0 && $_GET['number'] == round($_GET['number'], 0)){
    $i = 2;
    $isPrime = true;
    while($i < $_GET['number']) {
      if ($_GET['number'] % $i == 0) {
        $isPrime = false;
      }
      $i++;
    }
    if ($isPrime) {
      echo "Number is prime!";
    } else {
      echo "Number is Non-prime!";
    }
  } else {
      echo "Please enter Whole number only!";
  }
?>
