<?php
if(!isset($_SESSION)){
    session_start();
}

if ($_SESSION["role"] != 2){
	header("Location: index.php?error=4");
	exit();
}
$file1 = "admin";
$file = "admin";
include("./languages/manage_languages.php");
include($lang_file);
?>


<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" ng-app="zztask">
	<head>
		<?php include('./includes/head.php'); ?>
	</head>	
	<header>
		<div class="container">
				<div class="header-title"> ZZTask
				</div>
		</div>
	</header>
	<body>
		<div class="container pagebody">
			<div class="row">
				<?php include("./includes/nav_bar.php"); ?>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-6 col-xs-6 account-wall">
					<h1 class="text-center title"><?php echo $TXT_TITLE ?> </h1>
					<div>
						 <?php
						if (isset($_GET['error1'])){
							switch ($_GET['error1']) {

								case 0:
									$alert = "success";
									$error = $TXT_ERROR0;
									break;
							
								case 1:
									$alert = "danger";
									$error = $TXT_ERROR1;
									break;
									
								case 2:
									$alert = "danger";
									$error = $TXT_ERROR2;
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
							<?php echo $TXT_CREATEUSER; ?></button>
						</form>

					</div>
				</div>	
				<div class="col-sm-6 col-md-6 col-xs-6 account-wall delete-wall">
					<h1 class="text-center title"><?php echo $TXT_TITLE2 ?> </h1>
					<div class="delete-form">
						
						<?php
						if (isset($_GET['error2'])){
							switch ($_GET['error2']) {
							case 4:
										$alert = "success";
										$error = $TXT_ERROR4;
										break;
										
									case 5:
										$alert = "danger";
										$error = $TXT_ERROR5;
										break;
										
									case 6:
										$alert = "danger";
										$error = $TXT_ERROR6;
										break;
										
									case 7:
										$alert = "danger";
										$error = $TXT_ERROR7;
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
						include("./includes/list_all_user.php"); 
						$array = list_all_user("./files/roles.json");
						
						$ROLES = array(0 => $TXT_USER, 1 => $TXT_MANAGER, 2 => $TXT_ADMIN);
						?>
							<form action="./deleteuser.php" method="POST">
							<label class="select-delete" for="sel2"><?php echo $TXT_LIST;?></label>
							<select class="form-control" id="sel2" name="user">
						<?php	
						foreach($array as $name => $role){?>
							<option value="<?php echo $name;?>"> <?php echo $name." : ".$ROLES[$role];?></option>
						<?php	
						}
						?>
						</select>
						<button class="btn btn-lg btn-primary btn-block btn-delete" type="button" data-toggle="modal" data-target="#myModal"><?php echo $TXT_TITLE2;?></button>
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><?php echo $TXT_SURE ;?></h4>
									</div>
									<div class="modal-body">
										<button  class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $TXT_YES;?></button>
										<button  class="btn btn-lg btn-primary btn-block"  data-dismiss="modal"><?php echo $TXT_NO;?></button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</body>
	<footer>
		<div class ="container footercontainer">
			 © 2016 S.A.B. Inc. All rights reserved.
		</div>
	</footer>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="./jquery.js" async></script>
	
</html> 
