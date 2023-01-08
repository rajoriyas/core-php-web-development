<?php
  $emailTo = "rajoriya.rahul04@gmail.com";
  $subject = "I hope this work.";
  $body = "I think you're great.";
  $headers = "From: rajoriya.rahul04@hotmail.com\r\n";
  $headers .= "Reply-To: rajoriya.rahul04@hotmail.com\r\n";
  $headers .= "Return-Path: rajoriya.rahul04@hotmail.com\r\n";
  $headers.='X-Mailer: PHP/' . phpversion().'\r\n';
  $headers.= 'MIME-Version: 1.0' . "\r\n";
  $headers.= 'Content-type: text/html; charset=iso-8859-1 \r\n';
  $headers .= "CC: rajoriya.rahul04@hotmail.com\r\n";
  $headers .= "BCC: rajoriya.rahul@ymail.com\r\n";

  if(mail($emailTo, $subject, $body, $header)) {
    echo "Send Successfully";
  } else {
      echo "Failed !";
  }
?>
