<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--jquery-3.3.1.min.js-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Secret Diary</title>

    <style type="text/css">
      body {
        background: url("background.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;

        color: white;
        font-family: Garamond;
        height: 100vh;
        width: 100vw;
      }
      @media (max-width: 1024px) {
        #index {
          /* vertical alignment*/
          position: absolute;
          top: 50%;
          left: 50%;
          -moz-transform: translateX(-50%) translateY(-50%);
          -webkit-transform: translateX(-50%) translateY(-50%);
          transform: translateX(-50%) translateY(-50%);

          text-align: center;
          width: 90vw;
        }
      }
      @media (min-width: 1025px) {
        #index {
          /* vertical alignment*/
          position: absolute;
          top: 50%;
          left: 50%;
          -moz-transform: translateX(-50%) translateY(-50%);
          -webkit-transform: translateX(-50%) translateY(-50%);
          transform: translateX(-50%) translateY(-50%);

          text-align: center;
          width: 40vw;
        }
      }
      #loginform {
        display: none;
      }
      #diary {
        margin-top: 70px;
        height: 87vh;
        /*width: 100vw;*/

      }
    </style>
  </head>
  <body>
