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

	if ($_SESSION['role'] == 2){ ?>
		<div class="col-sm-4 col-md-4 col-xs-4">
			<a href="admin.php" class="text-center new-account"> <?php echo $TXT_CREATE ?> </a>
		</div>
	<?php } ?>


	<div class="col-sm-2 col-md-2 col-xs-2 text-center new-account">
		<?php echo $TXT_YOU." ".$aff; ?>
	</div>
	
	<div class="col-sm-2 col-md-2 col-xs-2 text-center new-account">
		<a href="logout.php"><?php echo $TXT_SIGNOUT; ?></a>
	</div>

<?php
}
else header("Location: index.php?error=3");

?>
