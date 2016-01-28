<?php 
if(!isset($_SESSION)){
    session_start();
}
$file1 = "updatetask";
$file = "updatetask";
include("./languages/manage_languages.php");
include($lang_file);
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
	<?php include('./includes/head.php'); ?>
	<?php include('./includes/header.php'); ?>
	<body>
		<div class="container pagebody">
			<div class="row">
				<?php include("./includes/nav_bar.php"); ?>
			</div>
			<div class="row ">
				<div class="col-sm-6 col-md-6 col-xs-6 col-sm-push-3 col-md-push-3 col-xs-push-3 account-wall">
					<h1 class="text-center title"><?php echo $TXT_UPDATETASK; ?> </h1>
					<form class="form-signin" action="taskmanager.php" method="POST">
						<input type="text" class="form-control" placeholder="Old Name" name="oldname" required autofocus>
						<input type="text" class="form-control" placeholder="New Name" name="newname" required>
						<input type="date" class="form-control" placeholder="Deadline (dd-mm-yyyy)" name="del" required>
						<input type="text" class="form-control" placeholder="Description" name="des" required>
						<button class="btn btn-lg btn-primary btn-block" type="submit" name="Update">
							<?php echo $TXT_UPDATE?></button>
					</form>
					<div class="col-sm-6 col-md-6 col-xs-6 col-sm-push-3 col-md-push-3 col-xs-push-3">
						<?php
							if (isset($_GET['error'])){
								echo "<div class=\"alert alert-danger\">
										<a href=\".\updatetask.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
										".$_GET['error'].".
									 </div>";
							}
							if (isset($_GET['done'])){
								echo "<div class=\"alert alert-success\">
										<a href=\".\updatetask.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
										".$_GET['done'].".
									 </div>";
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
	<?php include('./includes/footer.php'); ?>
		
</html> 
