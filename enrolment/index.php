<?php include("header.php"); include("../config.inc"); ?>
<script type="text/javascript">
function confirm_alert(node) {
return confirm("Are you sure you want to cancel and remove this enrolment?");
}
</script>
<div class="col_12">

	<ul class="tabs left">
	<li><a href="#enrolment">Enrolment</a></li>
	</ul>

	<div id="enrolment" class="tab-content">

	<?php 

	$eid = substr($_SERVER['QUERY_STRING'], -3);
	$error = "";

	$query = sprintf("SELECT * FROM `enrolments` NATURAL JOIN `students`, `classes` WHERE eid = '" . $eid . "';");
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);

	$stime = new DateTime($row['start']);
	$etime = new DateTime($row['end']);
	?>

		<div class="col_8"  style="line-height: 35px;">

			<div class="col_3">
					Enrolment<br />
					Student<br />
					Name<br />
					Class<br />
					Teacher<br />
					Start<br />
					End<br />
					Owing<br /><br />

					
				
				</div>
				<div class="col_8">
					E<?php echo $row['eid']; ?><br />
					<a href="../student/?S<?php echo $row['sid']; ?>">S<?php echo $row['sid']; ?></a><br />
					<?php echo $row['fname']; ?> 
					<?php echo $row['mname']; ?> 
					<?php echo $row['lname']; ?><br />
					<?php echo $row['name']; ?><br />
					<?php echo $row['teacher']; ?><br />
					<?php echo $stime->format("d/m/Y"); ?><br />
					<?php echo $etime->format("d/m/Y"); ?><br />
					$<?php echo $row['owe']; ?>
				</div>
		</div>
		<div class="col_4" style="text-align: right;">

			<a href="edit.php?E<?php echo $eid; ?>"><button class="small" style="position: relative; top: -65px; left: 27px; " <?php if ($_SESSION['type'] != 0) { echo "disabled='disabled'";} ?>><i class="icon-pencil" ></i> Edit</button></a>
			<a href="delete.php?E<?php echo $eid; ?>" onClick='return confirm_alert(this);'><button class="small" style="position: relative; top: -65px; left: 27px; " <?php if ($_SESSION['type'] != 0) { echo "disabled='disabled'";} ?>><i class="icon-remove" ></i> Cancel</button></a>
			
		</div>

		



	</div>

</div>

<?php include("footer.php"); ?>