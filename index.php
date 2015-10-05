<?php session_start(); ?>

<!DOCTYPE html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<title>ZZTasks</title>
	</head>	
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-offset-4">
					<h1 class="text-center login-title">ZZTasks : <?php //echo $TXT_;?>
					</h1>
					<div class="account-wall">
						<img class="profile-img" src="http://thesocialmediamonthly.com/wp-content/uploads/2015/08/photo.png"
						 alt="">
						<form class="form-signin" action="login.php" method="POST">
						<input type="text" class="form-control" placeholder="Username" name="usr" required autofocus <?php if(isset($_COOKIE['login'])){ echo $_COOKIE['login'];}  ?> >
						<input type="password" class="form-control" placeholder="Password" name="pwd" required>
						<button class="btn btn-lg btn-primary btn-block" type="submit">
							Sign in</button>
						<label class="checkbox pull-left">
							<input type="checkbox" value="remember-me">
							Remember me
						</label>
						<a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
						</form>
					</div>
					<a href="#" class="text-center new-account">Create an account </a>
				</div>
			</div>
		</div>
	</body>
	
	<footer>
	
	</footer>
	
</html> 
