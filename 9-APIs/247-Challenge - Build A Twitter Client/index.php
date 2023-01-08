<?php
	require "twitteroauth/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;
	
	$consumer_key = "CRJUvOWmshYaVqVoll9mfO0k5";
	$consumer_secret_key = "RDGhniR8zLWvhKRbIHUZAyehbOgmTkQDOJtXGwNFZeCn9OU3iJ";
	$token = "1088743032609038338-L7LEQECBg0EUexgwLvRvLf99s0KIl2";
	$secret_token = "kaiTs2hGQzfqeXvx74k5GIs4TdFxo35rGHezbQrIQgHta";
	
	$connection = new TwitterOAuth($consumer_key, $consumer_secret_key, $token, $secret_token);
	$content = $connection->get("account/verify_credentials");
//	print_r($content);

//	$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);
//	print_r($statuses);

//	$statues = $connection->post("statuses/update", ["status" => "Hello World!"]);
//	print_r($statuses);

//	how to access user time-line
	$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);
	foreach($statuses as $tweet) {
		//print_r($tweet);
		
		//access the element of object of a class
		
		//use view source also
		if($tweet->favorite_count >= 3) {
		//	echo $tweet->favorite_count;
		//	print_r($tweet->text);
		//	echo "<br>";
			$status = $connection->get("statuses/oembed", ["id" => $tweet->id]);
		//	print_r($status);
			echo $status->html;
		}
		
	}

?>