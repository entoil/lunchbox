<?php include("header.php"); include("../config.inc"); ?>

<div class="col_12">

	<ul class="tabs left">
	<li><a href="#class">Class</a></li>
	<li><a href="#audit">Audit</a></li>
	</ul>

	<div id="class" class="tab-content">

	<?php

	if (strlen($_SERVER['QUERY_STRING']) > 0) {
		include ('class.php');
	} else {
		include ('list.php');
	}
	
	?>


	</div>
	<div id="audit" class="tab-content">

	</div>
</div>

<?php include("footer.php"); ?>