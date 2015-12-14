<?php
if(!isset($_SESSION)){
    session_start();
}

if ($_SESSION["role"] != 2){
	header("Location: index.php?error=4");
	exit();
}

$file = "admin";
include("./languages/manage_languages.php");
include($lang_file);
?>


<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" ng-app="zztask">
	<head>
		<?php include('./includes/head.php'); ?>
	</head>	
	<body>
		<div class="container">
			<div class="row">
				<?php include("./includes/languages_menu.php"); ?>
				<div class="col-sm-6 col-md-4 col-xs-10  col-md-offset-4 col-sm-offset-3 col-xs-offset-1">
					<h1 class="text-center login-title">ZZTasks : <?php echo $TXT_TITLE ?> </h1>
					<div class="account-wall">
						<img class="profile-img" src="http://thesocialmediamonthly.com/wp-content/uploads/2015/08/photo.png"
						 alt="">
						 <?php
						if (isset($_GET['error'])){
							switch ($_GET['error']) {

								case 0:
									$alert = "success";
									$error = $TXT_ERROR0;
									break;
							
								case 1:
									$alert = "danger";
									$error = $TXT_ERROR1;
									break;

								default:
									$alert = "warning";
									$error = $TXT_ERROR_DEFAULT;

							}

							echo "<div class=\"alert alert-".$alert."\">
									<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
									".$error."
								 </div>";
						}
						?>
						<form class="form-signin" action="./createuser.php" method="POST">
						<input type="text" class="form-control" placeholder="<?php echo $TXT_USERNAME; ?>" name="usr" required autofocus>
						<input type="password" class="form-control" placeholder="<?php echo $TXT_PASSWORD; ?>" name="pwd" required>
						 <div class="form-group">
						  <label for="sel1"><?php echo $TXT_ROLES;?></label>
						  <select class="form-control" id="sel1" name="roles">
							<option value="0"><?php echo $TXT_USER;?></option>
							<option value="1"><?php echo $TXT_MANAGER;?></option>
							<option value="2"><?php echo $TXT_ADMIN;?></option>
						  </select>
						</div>
						<button class="btn btn-lg btn-primary btn-block" type="submit">
							<?php echo $TXT_CREATE; ?></button>
						<a href="https://www.google.com" class="pull-right need-help"><?php echo $TXT_HELP; ?> </a><span class="clearfix"></span>
						</form>
					</div>
					<a href="index.php" class="text-center new-account"> <?php echo $TXT_LOG; ?> </a>
				</div>	
			</div>
		</div>
		
		<?php include("./includes/list_all_user.php"); 
		$array = list_all_user("./files/roles.json");
		
		$ROLES = array(0 => $TXT_USER, 1 => $TXT_MANAGER, 2 => $TXT_ADMIN);
		
		echo $TXT_LIST."<br/>";
		
		foreach($array as $name => $role){
			echo $name." : ".$ROLES[$role]."<br/>";
		}
		
		
		?>
		
		
	</body>
	
	<footer>
	
	</footer>
	
</html> 
