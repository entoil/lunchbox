<?php include("header.php"); ?>
	 
<div class="col_12">

	<ul class="tabs left">
	<li><a href="#student">Student</a></li>
	<li><a href="#documents">Documents</a></li>
	<li><a href="#audit">Audit</a></li>
	</ul>

	<div id="student" class="tab-content"><?php include("student.php"); ?></div>
	<div id="documents" class="tab-content"><?php include("document.php"); ?></div>
	<div id="audit" class="tab-content"><?php include("audit.php"); ?></div>

</div>

<?php include("footer.php"); ?>