<?php
	include("function.php");
	if(array_key_exists('action', $_GET)) {
		if($_GET['action'] == "loginSignUp") {
			$message = "";
			if(!$_POST['email']) {
				$message .= "Email address is required!<br>";
			} else {
				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
					$message .= "Email address is invalid!<br>";
				}
			} 
			if(!$_POST['password']) {
				$message .= "Password is required!<br>";
			} 
			if($message != "") {
				echo $message;
				exit();
			}
			
			
			if($_POST['activeLogin'] == "0") {
				$query = "SELECT * FROM `tables` WHERE `email` = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
				$result = mysqli_query($link, $query);
				if(mysqli_num_rows($result) > 0) {
					$message = "That email address already taken.<br>";
				} else {
					$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$query = "INSERT INTO `tables` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".$hash."')";
					if($result = mysqli_query($link, $query)) {
						//$_SESSION['id'] = mysqli_insert_id($link);
						$query = "SELECT `id` FROM `tables` WHERE `email` = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
						$result = mysqli_query($link, $query);
						if(mysqli_num_rows($result) > 0) {
							$row = mysqli_fetch_array($result);
							$_SESSION['id'] = $row['id'];
						}
						echo "1";					
					}
					else {
					$message =  "Sign Up failed";
					}
				}
				if($message != "") {
					echo $message;
					exit();
				}
			}		
			else {
				$query = "SELECT `id`, `password` FROM `tables` WHERE `email` = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
				$result = mysqli_query($link, $query);
				if(mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_array($result);
					if(!password_verify($_POST['password'], $row['password'])) {	
						$message = "Password is incorrect!";
					} else {
						$_SESSION['id'] = $row['id'];
						echo "1";
					}
				} else {
					$message = "Email isn't registered!";
				}
				if($message != "") {
					echo $message;
					exit();
				}
			}
		}
		if($_GET['action'] == "follow") {
			if($_POST['isFollowing']) {
				$query = "SELECT * FROM `follow` WHERE `follower` = '".mysqli_real_escape_string($link, $_SESSION['id'])."' AND `isFollowing` = '".mysqli_real_escape_string($link, $_POST['isFollowing'])."' LIMIT 1";
				$result = mysqli_query($link, $query);
				if(mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_array($result);
					if(mysqli_query($link, "DELETE FROM `follow` WHERE `id` = ".mysqli_real_escape_string($link, $row['id'])." LIMIT 1")) {
						echo "1";
					}
				} else {
					if(mysqli_query($link, "INSERT INTO `follow` (`follower`, `isFollowing`) VALUES(".mysqli_real_escape_string($link, $_SESSION['id']).", ".mysqli_real_escape_string($link, $_POST['isFollowing']).")")) {
						echo "2";
					}
				}
			}
		}
		if($_GET['action'] == "postTweet") {
			if(!$_POST['tweetContent']) {
				echo "Your tweet is empty!";	
			} else if(strlen($_POST['tweetContent']) == 100) {
				echo "Your tweet is too long.";
			} else {
				if(mysqli_query($link, "INSERT INTO `tweets` (`userid`, `tweet`, `datetime`) VALUES('".mysqli_real_escape_string($link, $_SESSION['id'])."', '".mysqli_real_escape_string($link, $_POST['Content'])."', NOW())")) {
					echo "1";
				}
			}
		}
	}
?>	