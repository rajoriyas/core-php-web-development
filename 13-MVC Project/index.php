<?php
	include("function.php");
	include("views/header.php");
	if(array_key_exists('page', $_GET)) {
		if($_GET['page'] == "timeline") {
			include("views/timeline.php");
		} elseif($_GET['page'] == "tweet") {
			include("views/yourtweets.php");
		} elseif($_GET['page'] == "search") {
			include("views/search.php");
		} elseif($_GET['page'] == "profile") {
			include("views/profile.php");
		}		
	} else {
			include("views/home.php");
	}
	include("views/footer.php");
?>