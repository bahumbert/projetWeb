<?php
$file = "task";
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
				<div class="col-sm-6 col-md-4 col-xs-10  col-md-offset-4 col-sm-offset-3 col-xs-offset-1">
					<h1 class="text-center login-title">ZZTasks : <?php echo $TXT_TITLE ?>
					</h1>
				</div>
				<div class="col-sm-4 col-md-4 col-xs-6">
					<div class="btn-group">
						<button type="button" class="btn btn-primary"><?php echo $TXT_CURRENT_LANGUAGE ?></button>
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="./task.php?lang=<?php echo $TXT_LANGUAGE1_LIEN ?>"><?php echo $TXT_LANGUAGE1 ?></a></li>
							<li><a href="./task.php?lang=<?php echo $TXT_LANGUAGE2_LIEN ?>"><?php echo $TXT_LANGUAGE2 ?></a></li>
							<li><a href="./task.php?lang=<?php echo $TXT_LANGUAGE3_LIEN ?>"><?php echo $TXT_LANGUAGE3 ?></a></li>
						</ul>
					</div>
				</div>
				
			</div>
			<div class="row">	
				<div class="col-md-4">
					<fieldset class="scheduler-border">
						<legend class="scheduler-border"><?php echo $TXT_TODO?></legend>
						<fieldset class="scheduler-border">
							<legend class="scheduler-border"><h5>Projet 1</h5></legend>
						</fieldset>
						<fieldset class="scheduler-border">
							<legend class="scheduler-border"><h5>Projet 2</h5></legend>
						</fieldset>
					</fieldset>
				</div>
				<div class="col-md-4">
					<fieldset class="scheduler-border">
						<legend class="scheduler-border"><?php echo $TXT_INPROG?></legend>
						<fieldset class="scheduler-border">
							<legend class="scheduler-border"><h5>Projet 1</h5></legend>
						</fieldset>
						<fieldset class="scheduler-border">
							<legend class="scheduler-border"><h5>Projet 2</h5></legend>
						</fieldset>						
					</fieldset>
				</div>
				<div class=	"col-md-4">
					<fieldset class="scheduler-border">
						<legend class="scheduler-border"><?php echo $TXT_DONE?></legend>
						<fieldset class="scheduler-border">
							<legend class="scheduler-border"><h5>Projet 1</h5></legend>
						</fieldset>
						<fieldset class="scheduler-border">
							<legend class="scheduler-border"><h5>Projet 2</h5></legend>
						</fieldset>
					</fieldset>
				</div>
			</div>
		</div>
	</body>
	
</html> 
