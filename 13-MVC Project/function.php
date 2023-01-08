<?php 
	session_start();
	$link = mysqli_connect("shareddb-m.hosting.stackcp.net", "twitter-313031476c", "fets9ndks7", "twitter-313031476c");
	if(mysqli_connect_error()) {
		print_r(mysqli_connect_error());
		exit();
	}
	if(array_key_exists('function', $_GET)) {
		if($_GET['function'] == "logout") {
			session_unset();
		}
	}
	
	function time_since($since) {
		$chunks = array(
			array(60 * 60 * 24 * 365 , 'year'),
			array(60 * 60 * 24 * 30 , 'month'),
			array(60 * 60 * 24 * 7, 'week'),
			array(60 * 60 * 24 , 'day'),
			array(60 * 60 , 'hour'),
			array(60 , 'min'),
			array(1 , 's')
		);

		for ($i = 0, $j = count($chunks); $i < $j; $i++) {
			$seconds = $chunks[$i][0];
			$name = $chunks[$i][1];
			if (($count = floor($since / $seconds)) != 0) {
				break;
			}
		}

		$print = ($count == 1) ? '1 '.$name : "$count {$name}s";
		return $print;
	}
	
	function displayTweets($type) {
		global $link;
		if($type == 'public') {
			$whereClause = "";
		} else if($type == 'isFollowing') {
			if(array_key_exists('id', $_SESSION)) {
				$query = "SELECT * FROM `follow` WHERE `follower` = ".mysqli_real_escape_string($link, $_SESSION['id']);
				$result = mysqli_query($link, $query);
				//if user follows atleast one 
				if(mysqli_num_rows($result) > 0) {
					$whereClause = "";
					while($row = mysqli_fetch_assoc($result)) {
						if($whereClause == "") $whereClause = "WHERE";
						else $whereClause .= " OR";
						$whereClause .= " userid=".$row['isFollowing'];
					}
				} else { //if user don't follows atleast one
					$whereClause = "1";
				}	
			} else {
				$whereClause = "1";
			}
		} else if($type == 'yourtweets') {
			if(array_key_exists('id', $_SESSION)) {
				$whereClause = "WHERE userid = ".mysqli_real_escape_string($link, $_SESSION['id']);
			} else {
				$whereClause = "1";
			}	
		} else if($type == 'search') {
			if(array_key_exists('q', $_GET)) {
				echo '<p>Showing result for <strong>"'.mysqli_real_escape_string($link, $_GET['q']).'"</strong> :</p>';
				 $whereClause = "WHERE tweet LIKE '%".mysqli_real_escape_string($link, $_GET['q'])."%'";
			} else {
				$whereClause = "1";
			} 
		} else if(is_numeric($type)) {
			$query = "SELECT * FROM tables WHERE id = ".mysqli_real_escape_string($link, $type)." LIMIT 1";
			$result = mysqli_query($link, $query);
			$row = mysqli_fetch_assoc($result);
			echo "<h2>".mysqli_real_escape_string($link, $row['Email'])."'s Tweet(s):</h2>";
			$whereClause = "WHERE userid = ".mysqli_real_escape_string($link, $type);
		}
		global $link;
		$query = "SELECT * FROM tweets ".$whereClause." ORDER BY `datetime` DESC LIMIT 10";
		$result = mysqli_query($link, $query);
		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				$userQuery = "SELECT * FROM tables WHERE id = ".mysqli_real_escape_string($link, $row['userid'])." LIMIT 1";
				$userResult = mysqli_query($link, $userQuery);
				$userRow = mysqli_fetch_assoc($userResult);
				echo "<div class='border rounded m-3 p-2'><p><a href='?page=profile&userid=".$userRow['id']."'>".$userRow['Email']."</a>, <span class='text-black-50'>".time_since(time() + 10 - strtotime($row['datetime']))." ago</span><br><strong>".$row['tweet']."</strong><br><a class='toggleFollow' href='#' data-userId='".$row['userid']."'>";
					if(array_key_exists('id', $_SESSION)) {
						$isFollowingQuery = "SELECT * FROM `follow` WHERE `follower` = '".mysqli_real_escape_string($link, $_SESSION['id'])."' AND `isFollowing` = '".mysqli_real_escape_string($link, $row['userid'])."' LIMIT 1";
						$isFollowingResult = mysqli_query($link, $isFollowingQuery);
						if(mysqli_num_rows($isFollowingResult) > 0) {
							echo "Unfollow";
						} else {
							echo "Follow";
						}
					}
				echo "</a></div>";
			}
		} else {
			echo "There are no tweets to display.";
		}
	}
	
	function displaySearch() {
		echo '<form class="form-group text-center">
				<div class="form-group mx-sm-3 mb-2">
					<input type="hidden" name="page" value="search">
					<input type="text" name="q" class="form-control" id="Search" placeholder="Search Tweets">
				</div>	
				<button type="submit" class="btn btn-primary mb-2">Search</button>
			  </form>';
	}
	
	function displayTweetBox() {
		if(array_key_exists('id', $_SESSION)) {
			echo '<div id="postReport"></div>
					<div class="form-group text-center">
						<div class="form-group mx-sm-3 mb-2">
							<textarea class="form-control" id="postTweet" rows="3"></textarea>
						</div>
					<button id="postButton" class="btn btn-primary mb-2">Post Tweet</button>
					 </div>';
		}
	}
	function displayUsers() {
		global $link;
		$proQuery = "SELECT * FROM tables LIMIT 10";
		$proResult = mysqli_query($link, $proQuery);
		while($proRow = mysqli_fetch_assoc($proResult)) {
		echo "<p><a href='?page=profile&userid=".$proRow['id']."'>".$proRow['Email']."</a></p>";
		}
	}
?>		