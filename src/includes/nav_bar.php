<?php

$file = "nav_bar";
include("./languages/manage_languages.php");
include($lang_file);
if (isset($_SESSION['login']) && isset($_SESSION['role'])){

	switch($_SESSION['role']){
		
		case 1:
			$aff = $TXT_ROLE_1;
			break;
		case 2:
			$aff = $TXT_ROLE_2;
			break;
		default:
		case 0:
			$aff = $TXT_ROLE_0;
			break;
}
?>
<div class="col-sm-12 col-md-12 col-xs-12">
	<ul class="nav nav-tabs">
	<li <?php if($file1 == "task"){echo 'class="active"';}?>><a href="task.php"><?php echo $TXT_TASK?></a></li>
	<li <?php if($file1 == "createtask"){echo 'class="active"';}?>><a href="createtask.php"><?php echo $TXT_CREATETASK?></a></li>
	<li <?php if($file1 == "deletetask"){echo 'class="active"';}?>><a href="deletetask.php"><?php echo $TXT_DELETETASK?></a></li>
	<li <?php if($file1 == "updatetask"){echo 'class="active"';}?>><a href="updatetask.php"><?php echo $TXT_UPDATETASK?></a></li>
	<?php if ($_SESSION['role'] == 2){ ?>
	<li <?php if($file1 == "admin"){echo 'class="active"';}?>>
		<a href="admin.php"> <?php echo $TXT_CREATE; ?> </a>
	</li>
	<?php } ?>
	<?php include("./includes/languages_menu.php");?>
	<li class="navbar-right">
		<a href="logout.php"><?php echo $TXT_SIGNOUT; ?></a>
	</li>
</div>
<div class="col-sm-12 col-md-12 col-xs-12 you-are">	
	<?php echo $TXT_YOU." ".$aff; ?>
</div>
<?php
}
else header("Location: index.php?error=3");

?>
