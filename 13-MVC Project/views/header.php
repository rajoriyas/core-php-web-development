<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Twitter - rMes</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--jquery-3.3.1.min.js-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<link rel="stylesheet" href="http://myfirstmvcprogram-com.stackstaging.com/style.css">
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="http://myfirstmvcprogram-com.stackstaging.com/index.php">Twitter</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item">
			<a class="nav-link" href="?page=timeline">Your Timeline</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="?page=tweet">Your Tweets</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="?page=profile">Public Profiles</a>
		  </li>
		</ul>
		<div class="form-inline my-2 my-lg-0">
			<?php if(array_key_exists('id', $_SESSION)) {
					if($_SESSION['id']) { ?>
						<a class="btn btn-outline-success my-2 my-sm-0" href="?function=logout">Logout</a>
			<?php } } else { ?>
				<button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#loginSignUp">Login / Sign Up</button>
			<?php } ?>	
		</div>
	  </div>
	</nav>