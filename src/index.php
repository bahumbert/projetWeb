<?php 

if(!isset($_SESSION)){
    session_start();
}

$file = "index";
$file1 = "index";
include("./languages/manage_languages.php");
include($lang_file);
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
	<?php include("./includes/head.php"); ?>
	<?php include("./includes/header.php");  ?>
	<body>
		<div class="container pagebody">
			<div class="row">
			<ul class="nav nav-tabs">
				<li><?php include("./includes/languages_menu.php"); ?></li>
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
							switch ($_GET['error']) {

								case 0:
									$error = $TXT_NO_INPUT;
									break;
							
								case 1:
									$error = $TXT_ALREADY_CONNECTED;
									break;
									
								case 2:
									$error = $TXT_DOESNT_EXIST;
									break;

								default:
									$error = $TXT_DEFAULT;

							}
							echo "<div class=\"alert alert-danger\">
									<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
									".$error.".
								 </div>";
						}
						?>
						<form class="form-signin" action="login.php" method="POST">
						<a href="https://www.google.com" class="pull-right need-help"> <?php echo $TXT_HELP ?></a><span class="clearfix"></span>
						</form>
						
					</div>
				</div>
			</div>				
		</div>
	</body>
	<?php include("./includes/footer.php");  ?>
	<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
	
</html> 
