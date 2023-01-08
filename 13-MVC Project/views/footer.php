	<footer class="footer">
		<div class="container">
			<p>&copy; Twitter - rMes 2019</p>
		</div>
    </footer>
	<!-- Modal -->
	<div class="modal fade" id="loginSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="loginSignUpHeader">Login</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<div id="error" class="alert alert-danger" role="alert"></div>
			<form>
			  <input type="hidden" id="activeLogin" name="activeLogin" value="1">	
			  <div class="form-group">
				<label for="email1">Email address</label>
				<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" placeholder="Password">
			  </div>
			</form>
		  </div>
		  <div class="modal-footer">	
			<a id="toggleLogin" href="#">Sign Up</a>
			<button type="button" id="closeButton" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button id="loginSignUpButton" type="button" class="btn btn-primary">Login</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$("#error").hide();
		$("#toggleLogin").click(function() {
			if($("#activeLogin").val() == "1") {
				$("#loginSignUpHeader").html("Sign Up");
				$("#toggleLogin").html("Login");
				$("#loginSignUpButton").html("Sign Up");
				$("#activeLogin").val("0");
			}
			else {
				$("#loginSignUpHeader").html("Login");
				$("#toggleLogin").html("Sign Up");
				$("#loginSignUpButton").html("Login");
				$("#activeLogin").val("1");
			}
		});
		$("#loginSignUpButton").click(function() {		
			$.ajax({
				type: "POST",
				url: "action.php?action=loginSignUp",
				data: "email="+$("#email").val()+"&password="+$("#password").val()+"&activeLogin="+$("#activeLogin").val(),
				success: function(result) {
					//remove space
					//result = result.replace(/\s/g, '');
					
					//remove whitespaces
					result = result.trim();
					if(result != "" && result != "1") {
						$("#error").html(result).show();
					} else if (result == "1") {
						window.location.assign("http://myfirstmvcprogram-com.stackstaging.com/index.php");
						
					}	
				}
			})
		});
		$("#closeButton").click(function() {
			$("#error").hide();
		});
		$(".toggleFollow").click(function() {
			var id = $(this).attr("data-userId");
			$.ajax({
				type: "POST",
				url: "action.php?action=follow",
				data: "isFollowing="+id,
				success: function(result) {
					result = result.trim();
					if (result == "1") {
						$("a[data-userId='"+id+"']").html('Follow');
						location.reload();
					} else if (result == "2") {
						$("a[data-userId='"+id+"']").html('Unfollow');
					}
				}
			})
		});
		$("#postButton").click(function() {
			$.ajax({
				type: "POST",
				url: "action.php?action=postTweet",
				data: "tweetContent="+$("#postTweet").val(),
				success: function(result) {
					result = result.trim();
					if(result == "1") {
						$("#postReport").html('<div class="alert alert-success" role="alert">Your Tweet is successfully posted!</div>');
						location.reload();
					} else {
						$("#postReport").html('<div class="alert alert-danger" role="alert">'+result+'</div>');
					}
				}
			})
		});
	</script>
  </body>
</html>