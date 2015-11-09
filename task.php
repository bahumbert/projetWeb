<?php 
if(!isset($_SESSION)){
    session_start();
}
$file = "task";
include("./languages/manage_languages.php");
include($lang_file);
?>

<!DOCTYPE html>
<html ng-app="plunker" lang="<?php echo $lang; ?>">
	<?php include('./includes/head.php'); ?>
	<body>
		<div class="container" ng-controller="MainCtrl">
			<div class="row">
				<?php include("./includes/languages_menu.php"); ?>
			</div>
			<div class="row">	
				<div class="col-xs-4">
						<fieldset>
							<legend><?php echo $TXT_TODO?></legend>
							<ul ui-on-Drop="onDrop($event,$data,todo2)">
								<li ui-draggable="true" drag="todo" 
								on-drop-success="dropSuccessHandler($event,$index,todo2)"
								ng-repeat="todo in todo2 track by $index">
									{{todo}}
								</li>
							</ul>
					</fieldset>
				</div>
				<div class="col-xs-4">
					<fieldset>
							<legend><?php echo $TXT_INPROG?></legend>
							<ul ui-on-Drop="onDrop($event,$data,inprog2)">
								<li ui-draggable="true" drag="inprog" 
								on-drop-success="dropSuccessHandler($event,$index,inprog2)"
								ng-repeat="inprog in inprog2 track by $index">
									{{inprog}}
								</li>
							</ul>
					</fieldset>
				</div>
				<div class="col-xs-4">
					<fieldset>
							<legend><?php echo $TXT_DONE?></legend>
							<ul ui-on-Drop="onDrop($event,$data,done2)">
								<li ui-draggable="true" drag="done" 
								on-drop-success="dropSuccessHandler($event,$index,done2)"
								ng-repeat="done in done2 track by $index">
									{{done}}
								</li>
							</ul>
					</fieldset>
				</div>
			</div>
		</div>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="./jquery.js" async></script>

	</body>
		
</html> 
