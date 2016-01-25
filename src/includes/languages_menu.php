<?php 
$file = $file1;
include("./languages/manage_languages.php");
include($lang_file);
?>

<li class="dropdown active navbar-right">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $TXT_CURRENT_LANGUAGE ?>
	<span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="./<?php echo $file?>.php?lang=<?php echo $TXT_LANGUAGE1_LIEN ?>"><?php echo $TXT_LANGUAGE1 ?></a></li>
		<li><a href="./<?php echo $file?>.php?lang=<?php echo $TXT_LANGUAGE2_LIEN ?>"><?php echo $TXT_LANGUAGE2 ?></a></li>
		<li><a href="./<?php echo $file?>.php?lang=<?php echo $TXT_LANGUAGE3_LIEN ?>"><?php echo $TXT_LANGUAGE3 ?></a></li>
	</ul>
</li>
