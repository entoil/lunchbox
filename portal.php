<?php include("header.php"); ?>
	 
<div class="col_12">
	<div class="col_9">
	<h4>Welcome to Lunchbox</h4>
<script src="moment.js"></script>
Today is <script>
document.write(moment().format('dddd  Do MMMM YYYY'));
</script>
	<h5>Generate Reports</h5>
	<ul class="icons">
	<li><i class="icon-caret-right"></i> <a href="/report/starters.php">Starters List</a></li>
	<li><i class="icon-caret-right"></i> <a href="/report/finishers.php">Finishers List</a></li>
	</ul>

	<h5>Create New</h5>
	<ul class="icons">
	<li><i class="icon-double-angle-right"></i> <a href="/student/create.php">Student Profile</a></li>
	<li><i class="icon-double-angle-right"></i> <a href="/enrolment/create.php">Enrolment</a></li>
	<li><i class="icon-double-angle-right"></i> <a href="/class/create.php">Class</a></li>
	</ul>
	</div>
	
	<div class="col_3">
	<h5>Classes</h5>
	<ul>
	<?php
	$query = sprintf("SELECT * FROM `classes`;");
	$result = mysql_query($query);

	while($row = mysql_fetch_array($result))
	{
		echo "<li><a href='/class/?C" . $row['cid'] . "'>" . $row['name'] . "</a></li>";
	}		
	mysql_free_result($result);
	?>

	</ul>
	
	
</div>

<?php include("footer.php"); ?>