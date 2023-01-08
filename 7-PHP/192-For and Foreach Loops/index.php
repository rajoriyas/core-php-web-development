<?php
  $family = array("Rahul","Rajoriyas","rajoriyarahuls");
  foreach ($family as $key => $value) {
    $family[$key] = $value."UTD";
    echo $value."<br>";
  }
  for ($i=0; $i < sizeof($family) ; $i++) {
    $value = $family[$i];
    echo $value."<br>";
  }
  for ($i=0 ; $i < 10 ; $i++ ) {
    echo $i."<br>";
  }
?>

