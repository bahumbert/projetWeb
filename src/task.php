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
				<?php 
				include("./includes/languages_menu.php"); 
				include("./includes/nav_bar.php");
				?>
			
			</div>
			<div class="row">	
				<div class="col-xs-4">
						<fieldset class="scheduler-border">
							<legend class="scheduler-border"><?php echo $TXT_TODO?></legend>
							<ul ui-on-Drop="onDrop($event,$data,todo2)">
								<li ui-draggable="true" drag="todo" 
								on-drop-success="dropSuccessHandler($event,$index,todo2)"
								ng-repeat="todo in todo2 track by $index">
								<fieldset class="scheduler-border">
									<legend class="scheduler-border">{{todo}}</legend>
								</fieldset>
								</li>
							</ul>
					</fieldset>
				</div>
				<div class="col-xs-4">
					<fieldset class="scheduler-border">
							<legend class="scheduler-border"><?php echo $TXT_INPROG?></legend>
							<ul ui-on-Drop="onDrop($event,$data,inprog2)">
								<li ui-draggable="true" drag="inprog" 
								on-drop-success="dropSuccessHandler($event,$index,inprog2)"
								ng-repeat="inprog in inprog2 track by $index">
								<fieldset class="scheduler-border">
									<legend class="scheduler-border">{{inprog}}</legend>
								</fieldset>
								</li>
							</ul>
					</fieldset>
				</div>
				<div class="col-xs-4">
					<fieldset class="scheduler-border">
							<legend class="scheduler-border"><?php echo $TXT_DONE?></legend>
							<ul ui-on-Drop="onDrop($event,$data,done2)">
								<li ui-draggable="true" drag="done" 
								on-drop-success="dropSuccessHandler($event,$index,done2)"
								ng-repeat="done in done2 track by $index">
								<fieldset class="scheduler-border">
									<legend class="scheduler-border">{{done}}</legend>
								</fieldset>
								</li>
							</ul>
					</fieldset>
				</div>
			</div>
		</div>
		
		<?php 
		
		include("./includes/who_is_online.php"); 
		$array = who_is_online("./files/who_is_online.json");
		
		?>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="./jquery.js" async></script>

	</body>
		
</html> 
