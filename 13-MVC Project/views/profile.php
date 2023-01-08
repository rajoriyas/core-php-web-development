<div class="container p-4">	
	<div class="row">
		<div class="col-8">
			<?php if(array_key_exists('userid', $_GET)) {
					if($_GET['userid']) { 
						displayTweets($_GET['userid']);
					} 
				  }	else { ?>
						<h2>Active Users</h2>
					<?php displayUsers(); 
					}
			?>			
		</div>
		<div class="col-4 container p-4">
			<?php displaySearch(); ?>
			<hr>
			<?php displayTweetBox(); ?>
		</div>
	</div>
</div>