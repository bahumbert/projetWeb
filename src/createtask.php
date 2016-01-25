<?php 
if(!isset($_SESSION)){
    session_start();
}
$file1 = "createtask";
$file = "createtask";
include("./languages/manage_languages.php");
include($lang_file);
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
	<?php include('./includes/head.php'); ?>
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
				<div class="title"><?php echo $TXT_CREATETASK?></div>
				<form class="form-signin" action="taskmanager.php" method="POST">
					<input type="text" class="form-control" placeholder="Name" name="name" required autofocus>
					<input type="date" class="form-control" placeholder="Deadline (dd-mm-yyyy)" name="del" required>
					<input type="text" class="form-control" placeholder="Description" name="des" required>
					<button class="btn btn-lg btn-primary btn-block" type="submit" name="Create">
						<?php echo $TXT_CREATE?></button>
				</form>
				<div class="col-sm-4 col-md-4 col-xs-4 col-sm-push-4 col-md-push-4 col-xs-push-4">
					<?php
						if (isset($_GET['done'])){
							echo "<div class=\"alert alert-success\">
									<a href=\".\createtask.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
									".$_GET['done'].".
								 </div>";
						}
					?>
				</div>
			</div>
		</div>	
	</body>
	<footer>
		<div class="container footercontainer">
			Copyright
		</div>
	</footer>
		
</html> 
