<?php 

if(!isset($_SESSION)){
    session_start();
}

$file = "index";
include("./languages/manage_languages.php");
include($lang_file);
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
	<?php include("./includes/head.php"); ?>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-10 col-xs-10">
				</div>
				<?php include("./includes/languages_menu.php"); ?>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-4 col-xs-10  col-md-offset-4 col-sm-offset-3 col-xs-offset-1">
					<h1 class="text-center login-title">ZZTasks : <?php echo $TXT_TITLE ?>
					</h1>
					<div class="account-wall">
						<img class="profile-img" src="http://thesocialmediamonthly.com/wp-content/uploads/2015/08/photo.png"
						 alt="">
						<form class="form-signin" action="login.php" method="POST">
						<input type="text" class="form-control" placeholder="<?php echo $TXT_USERNAME ?>" name="usr" required 	value="<?php if(isset($_COOKIE['login'])){ echo $_COOKIE['login'];}  ?>" >
						<input type="password" class="form-control" placeholder="<?php echo $TXT_PASSWORD ?>" name="pwd" required>
						<button class="btn btn-lg btn-primary btn-block" type="submit">
								<?php echo $TXT_SIGN ?>
						</button>
						</form>
						<?php
						if (isset($_GET['error'])){
							echo "<div class=\"alert alert-danger\">
									<a href=\".\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
									".$_GET['error'].".
								 </div>";
						}
						?>
						<form class="form-signin" action="login.php" method="POST">
						<label class="checkbox pull-left">
							<input type="checkbox" value="remember-me">
							<?php echo $TXT_REMEMBER ?>
						</label>
						<a href="https://www.google.com" class="pull-right need-help"> <?php echo $TXT_HELP ?></a><span class="clearfix"></span>
						</form>
						
					</div>
					<a href="admin.php" class="text-center new-account"> <?php echo $TXT_CREATE ?> </a>
				</div>
			</div>				
		</div>
	</body>
	
</html> 
