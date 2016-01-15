<?php 
if(!isset($_SESSION)){
    session_start();
}
$file = "task";
include("./languages/manage_languages.php");
include($lang_file);
?>

<!DOCTYPE html>
<html ng-app="DragAndDrop" lang="<?php echo $lang; ?>">
	<?php include('./includes/head.php'); ?>
	<body>
		<div class="container" ng-controller="MainCtrl">
			<div class="row">
				<div class="col-sm-10 col-md-10 col-xs-10">
					<ul class="nav nav-tabs">
					  <li class="active"><a href="task.php"><?php echo $TXT_TASK?></a></li>
					  <li><a href="createtask.php"><?php echo $TXT_CREATETASK?></a></li>
					  <li><a href="deletetask.php"><?php echo $TXT_DELETETASK?></a></li>
					</ul>
				</div>
				<?php include("./includes/languages_menu.php"); ?>
			</div>
			<div class="row">
				<div class="col-xs-4">
						<fieldset class="scheduler-border">
							<legend class="scheduler-border"><?php echo $TXT_TODO?></legend>
							<ul class="conteneur" ui-on-Drop="onDrop($event,$data,todos)">
								<li >
								<fieldset class="scheduler-border"
									ui-draggable="true" drag="todo" 
									on-drop-success="dropSuccessHandler($event,$index,todos)"
									ng-repeat="todo in todos track by $index">
									<legend class="scheduler-border">{{todo[0].name}}</legend>
									<div class="subtitle"><?php echo $TXT_CREATOR?>:</div>
									{{todo[0].creator}}<br/>
									<div class="subtitle"><?php echo $TXT_DEADLINE?>: </div>
									{{todo[0].deadline}}<br/>
									<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal1{{$index}}">More...</button>
									<!-- Modal -->
									<div id="myModal1{{$index}}" class="modal fade" role="dialog">
									  <div class="modal-dialog modal-lg">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">{{todo[0].name}}</h4>
											</div>
											<div class="modal-body">
												<div class="subtitle"><?php echo $TXT_CREATOR?>:</div>
												{{todo[0].creator}}<br/>
												<div class="subtitle"><?php echo $TXT_DATECREA?>: </div>
												{{todo[0].datecreation}}<br/>
												<div class="subtitle"><?php echo $TXT_DEADLINE?>: </div>
												{{todo[0].deadline}}<br/>
												<div class="subtitle"><?php echo $TXT_DESCRIPTION?>: </div>
												{{todo[0].descrip}}<br/>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									  </div>
									</div>
								</fieldset>
								</li>
							</ul>
					</fieldset>
				</div>
				<div class="col-xs-4">
					<fieldset class="scheduler-border">
							<legend class="scheduler-border"><?php echo $TXT_INPROG?></legend>
							<ul class="conteneur" ui-on-Drop="onDrop($event,$data,inprogs)">
								<li>
								<fieldset class="scheduler-border" 
									ui-draggable="true" drag="inprog" 
									on-drop-success="dropSuccessHandler($event,$index,inprogs)"
									ng-repeat="inprog in inprogs track by $index">
									<legend class="scheduler-border">{{inprog[0].name}}</legend>
									<div class="subtitle"><?php echo $TXT_CREATOR?>:</div>
									{{inprog[0].creator}}<br/>
									<div class="subtitle"><?php echo $TXT_DEADLINE?>: </div>
									{{inprog[0].deadline}}<br/>
									<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal2{{$index}}">More...</button>.
									<!-- Modal -->
									<div id="myModal2{{$index}}" class="modal fade" role="dialog">
									  <div class="modal-dialog modal-lg">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">{{inprog[0].name}}</h4>
											</div>
											<div class="modal-body">
												<div class="subtitle"><?php echo $TXT_CREATOR?>:</div>
												{{inprog[0].creator}}<br/>
												<div class="subtitle"><?php echo $TXT_DATECREA?>: </div>
												{{inprog[0].datecreation}}<br/>
												<div class="subtitle"><?php echo $TXT_DEADLINE?>: </div>
												{{inprog[0].deadline}}<br/>
												<div class="subtitle"><?php echo $TXT_DESCRIPTION?>: </div>
												{{inprog[0].descrip}}<br/>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									  </div>
									</div>
								</fieldset>
								</li>
							</ul>
					</fieldset>
				</div>
				<div class="col-xs-4">
					<fieldset class="scheduler-border">
							<legend class="scheduler-border"><?php echo $TXT_DONE?></legend>
							<ul class="conteneur" ui-on-Drop="onDrop($event,$data,dones)">
								<li>
								<fieldset class="scheduler-border"
									ui-draggable="true" drag="done"
									on-drop-success="dropSuccessHandler($event,$index,dones)"
									ng-repeat="done in dones track by $index">
									<legend class="scheduler-border">{{done[0].name}}</legend>
									<div class="subtitle"><?php echo $TXT_CREATOR?>:</div>
									{{done[0].creator}}<br/>
									<div class="subtitle"><?php echo $TXT_DEADLINE?>: </div>
									{{done[0].deadline}}<br/>
									<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal3{{$index}}">More...</button>
									<!-- Modal -->
									<div id="myModal3{{$index}}" class="modal fade" role="dialog">
									  <div class="modal-dialog modal-lg">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">{{done[0].name}}</h4>
											</div>
											<div class="modal-body">
												<div class="subtitle"><?php echo $TXT_CREATOR?>:</div>
												{{done[0].creator}}<br/>
												<div class="subtitle"><?php echo $TXT_DATECREA?>: </div>
												{{done[0].datecreation}}<br/>
												<div class="subtitle"><?php echo $TXT_DEADLINE?>: </div>
												{{done[0].deadline}}<br/>
												<div class="subtitle"><?php echo $TXT_DESCRIPTION?>: </div>
												{{done[0].descrip}}<br/>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									  </div>
									</div>
								</fieldset>
								</li>
							</ul>
					</fieldset>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-2 col-md-2 col-md-push-10 col-xs-push-10">
					<button href="task.php" type="button" class="btn btn-primary" ng-click="save()"><?php echo $TXT_SAVE?></button>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="./jquery.js" async></script>
	</body>
		
</html> 
