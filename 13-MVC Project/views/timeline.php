<div class="container p-4">	
	<div class="row">
		<div class="col-8">
			<h2>Timeline</h2>
			<?php displayTweets("isFollowing"); ?>
		</div>
		<div class="col-4 container p-4">
			<?php displaySearch(); ?>
			<hr>
			<?php displayTweetBox(); ?>
		</div>
	</div>
</div>