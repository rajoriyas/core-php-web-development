<?php
  $array = array("rahul","avinash","gaurav");
  $array[] = "alpana";
  print_r($array);
  echo "<br>";
  echo $array[2];
  echo "<br><br>";
  $anotherArray[0] = "pizza";
  $anotherArray[1] = "ice cream";
  $anotherArray["MyFavFood"] = "Burger";
  print_r($anotherArray);
  echo "<br><br>";

  $thirdArray = array(
    'first' => "Rahul",
    'second' => "Rajoriya"
  );
  print_r($thirdArray);
  echo "<br><br>";

  unset($thirdArray["first"]);
  print_r($thirdArray);
  echo "<br><br>";

  echo sizeof($anotherArray);
?>
