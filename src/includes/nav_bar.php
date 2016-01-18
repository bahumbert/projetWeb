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
<div class="col-sm-8 col-md-8 col-xs-8">
	<ul class="nav nav-tabs">
	  <li class="active"><a href="task.php"><?php echo $TXT_TASK?></a></li>
	  <li><a href="createtask.php"><?php echo $TXT_CREATETASK?></a></li>
	  <li><a href="deletetask.php"><?php echo $TXT_DELETETASK?></a></li>
	  <?php if ($_SESSION['role'] == 2){ ?>
	  <li>
			<a href="admin.php"> <?php echo $TXT_CREATE; ?> </a>
		</li>
	<?php } ?>
	<?php include("./includes/languages_menu.php");?>
		<li>
			<a href="logout.php"><?php echo $TXT_SIGNOUT; ?></a>
		</li>
</div>
	<?php echo $TXT_YOU." ".$aff; ?>

<?php
}
else header("Location: index.php?error=3");

?>
