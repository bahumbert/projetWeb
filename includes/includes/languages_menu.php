<div class="col-sm-4 col-md-4 col-xs-6 col-md-offset-8 col-sm-offset-8 col-xs-offset-6">
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
