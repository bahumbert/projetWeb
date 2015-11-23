<?php

$file = "nav_bar";
include("./languages/manage_languages.php");
include($lang_file);

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


<div class="col-sm-1 col-md-1 col-xs-1 text-center new-account">
	<?php echo $aff; ?>
</div>
