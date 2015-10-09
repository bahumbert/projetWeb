<?php session_start();

$file = "admin";
include ("./languages/manage_languages.php");
include ($lang_file);
?>


<!DOCTYPE html>
<html  lang="<?php echo $lang; ?>">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<title>ZZTasks</title>
	</head>	
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-offset-4">
					<h1 class="text-center login-title">ZZTasks : <?php echo $TXT_TITLE ?> </h1>
					<div class="account-wall">
						<img class="profile-img" src="http://thesocialmediamonthly.com/wp-content/uploads/2015/08/photo.png"
						 alt="">
						<form class="form-signin" action="createuser.php" method="POST">
						<input type="text" class="form-control" placeholder="<?php echo $TXT_USERNAME ?>" name="usr" required autofocus>
						<input type="password" class="form-control" placeholder="<?php echo $TXT_PASSWORD ?>" name="pwd" required>
						<button class="btn btn-lg btn-primary btn-block" type="submit">
							<?php echo $TXT_CREATE ?></button>
						<a href="https://www.google.com" class="pull-right need-help"><?php echo $TXT_HELP ?> </a><span class="clearfix"></span>
						</form>
					</div>
					<a href="index.php" class="text-center new-account"> <?php echo $TXT_LOG ?> </a>
				</div>
				<div class="col-sm-6 col-md-4 col-md-offset-0">
					<div class="btn-group">
						<button type="button" class="btn btn-primary"><?php echo $TXT_CURRENT_LANGUAGE ?></button>
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="./admin.php?lang=<?php echo $TXT_LANGUAGE1_LIEN ?>"><?php echo $TXT_LANGUAGE1 ?></a></li>
							<li><a href="./admin.php?lang=<?php echo $TXT_LANGUAGE2_LIEN ?>"><?php echo $TXT_LANGUAGE2 ?></a></li>
							<li><a href="./admin.php?lang=<?php echo $TXT_LANGUAGE3_LIEN ?>"><?php echo $TXT_LANGUAGE3 ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</body>
	
	<footer>
	
	</footer>
	
</html> 
