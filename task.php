<?php session_start();
$file = "task";
include("./languages/manage_languages.php");
include($lang_file);
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" ng-app="zztask" ng-controller="who_is_online">
	<?php include('./includes/head.php'); ?>
	<body>
		<div class="container">
			<?php include("./includes/languages_menu.php"); ?>
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
