<div class="col-sm-4 col-md-4 col-xs-4">
	<div class="btn-group">
		<button type="button" class="btn btn-primary"><?php echo $TXT_CURRENT_LANGUAGE ?></button>
		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu">
			<li><a href="./<?php echo $file?>.php?lang=<?php echo $TXT_LANGUAGE1_LIEN ?>"><?php echo $TXT_LANGUAGE1 ?></a></li>
			<li><a href="./<?php echo $file?>.php?lang=<?php echo $TXT_LANGUAGE2_LIEN ?>"><?php echo $TXT_LANGUAGE2 ?></a></li>
			<li><a href="./<?php echo $file?>.php?lang=<?php echo $TXT_LANGUAGE3_LIEN ?>"><?php echo $TXT_LANGUAGE3 ?></a></li>
		</ul>
	</div>
</div>
