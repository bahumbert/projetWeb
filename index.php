<?php session_start();
include("./languages/manage_languages.php");
?>

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
					<h1 class="text-center login-title">ZZTasks : <?php echo $TXT_TITLE;?>
					</h1>
					<div class="account-wall">
						<img class="profile-img" src="http://thesocialmediamonthly.com/wp-content/uploads/2015/08/photo.png"
						 alt="">
						<form class="form-signin" action="login.php" method="POST">
						<input type="text" class="form-control" placeholder="<?php echo $TXT_USERNAME;?>" name="usr" required autofocus value="<?php if(isset($_COOKIE['login'])){ echo $_COOKIE['login'];}  ?>" >
						<input type="password" class="form-control" placeholder="<?php echo $TXT_PASSWORD;?>" name="pwd" required>
						<button class="btn btn-lg btn-primary btn-block" type="submit">
							<?php echo $TXT_SIGN;?></button>
						<label class="checkbox pull-left">
							<input type="checkbox" value="remember-me">
							<?php echo $TXT_REMEMBER;?>
						</label>
						<a href="#" class="pull-right need-help"><?php echo $TXT_HELP;?> </a><span class="clearfix"></span>
						</form>
					</div>
					<a href="#" class="text-center new-account"><?php echo $TXT_CREATE;?> </a>
				</div>
			</div>
		</div>
	</body>
	
	<footer>
	
	</footer>
	
</html> 
