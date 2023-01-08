<?php
  //often cookies are used for tracking
  //but here cookies are used legitimately.
  //setcookie("varriable_name", "value", "expiry_time");

  setcookie("customerId", "1234", time() + 60*60*24 ); //time() gives time in second
  //echo $_COOKIE["customerId"];

  //To make cookie empty
  //setcookie("varriable_name", "", "past_time");

  //setcookie("customerId", "", time() - 60*60);
  //echo $_COOKIE["customerId"];
  //after second refresh
  //Notice: Undefined index: customerId in /home/sites/7b/f/fffd2e2ca9/public_html/index.php on line 13

  //update cookies
  $_COOKIE["customerId"] = "test";
  echo $_COOKIE["customerId"];
?>
