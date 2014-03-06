<?php include("header.php"); include("../config.inc"); ?>

<div class="col_12">

	<ul class="stabs left">
	<li class="current"><a href="/student/?S<?php echo $sid?>">Student</a></li>
	<li><a href="document.php?S<?php echo $sid?>">Documents</a></li>
	<li><a href="audit.php?S<?php echo $sid?>">Audit</a></li>
</ul>

	<div id="student" class="tab-content">	

		<?php 

$sid = substr($_SERVER['QUERY_STRING'], -5);
$error = "";

$query = sprintf("SELECT * FROM `students` WHERE sid = '" . $sid . "';");
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$dtime = new DateTime($row['dob']);

?>
<script>
flag = new Array();
function tree(num){
    menu = document.getElementById("menu" + num)
    if(flag[num] == 1){
        menu.style.display='none';
        flag[num] = 0;
    }
    else{
        menu.style.display='block';
        flag[num] = 1;
    }
}
</script>

	<div class="col_8"  style="line-height: 35px;">

		<div class="col_3">
				Number<br />
				First Name<br />
				Middle Name<br />
				Last Name<br />
				Date of Birth<br />
				Address<br /><br /><br />

				
			
			</div>
			<div class="col_8">
				S<?php echo $row['sid']; ?><br />
				<?php echo $row['fname']; ?><br />
				<?php echo $row['mname']; ?><br />
				<?php echo $row['lname']; ?><br />
				<?php echo $dtime->format("d/m/Y");; ?><br />
				<?php echo $row['street']; ?><br />
				<?php echo $row['suburb']; ?><br />
				<?php echo $row['postcode']; ?>
			</div>
	</div>
	<div class="col_4" style="text-align: right;">

		 <?php

				if (file_exists("photo/" . $sid . ".jpg")) {
					echo "<img src=\"photo/" . $sid . ".jpg\" style=\"border: 1px solid #e5e5e5; height: 230px\"/><br />";
				} else {
					echo "<img src=\"photo/s12345.jpg\" style=\"border: 1px solid #e5e5e5; height: 230px\"/><br />";
				}

			?><br>
					 <a href="edit.php?S<?php echo $sid; ?>"><button style="position: relative; top: -318px; left: 28px; " class="small" <?php if ($_SESSION['type'] != 0) { echo "disabled='disabled'";} ?>><i class="icon-pencil" ></i> Edit Student</button></a>

	</div>
	<div class="col_6"><span onclick="tree(0);"><i class="icon-plus-sign-alt"></i> Contacts</span></div>
	<span id="menu0" style="display:none;">
	<div class="col_12"  style="line-height: 35px;">

		<div class="col_2">
			Name<br />
			Relationship<br />
			Mobile<br />
			Email<br />
		
		</div>
		<div class="col_4">
			<?php echo $row['cname1']; ?><br />
			<?php echo $row['crel1']; ?><br />
			<?php echo $row['cmob1']; ?><br />
			<?php echo $row['cemail1']; ?><br />
		</div>
			<div class="col_2">
			Name<br />
			Relationship<br />
			Mobile<br />
			Email<br />
		
		</div>
		<div class="col_4">
			<?php echo $row['cname2']; ?><br />
			<?php echo $row['crel2']; ?><br />
			<?php echo $row['cmob2']; ?><br />
			<?php echo $row['cemail2']; ?><br />
		</div>
	</div>
	</span>
	<hr />
	<h6>&nbsp;Enrolments</h6><br />
	<!-- Table -->
	<table cellspacing="0" cellpadding="0" class="striped sortable">
	<thead><tr>
		<th width="100px">Number:</th>
		<th width="100px">Class:</th>
		<th>Teacher:</th>
		<th>Start:</th>
		<th>End:</th>
		<th>Owe:</th>
	</tr></thead>
	<?php
		$query = sprintf("SELECT * FROM `enrolments` NATURAL JOIN `classes` WHERE sid = $sid");
		$result = mysql_query($query);

		if (!$result) {
		    $message  = 'Invalid query: ' . mysql_error() . "\n";
		    $message .= 'Whole query: ' . $query;
		    die($message);
		}

		$fields_num = mysql_num_fields($result);

		if (mysql_num_rows($result) == 0) { echo ""; }
		
		else {
	
			while($row = mysql_fetch_array($result))
			{
				$stime = new DateTime($row['start']);
				$etime = new DateTime($row['end']);
				echo "<tr>";
				echo "<td>
				<a href='/enrolment?E" . $row['eid'] . "' title='Edit'>E" . $row['eid'] . "</a></td>
				<td><a href='/class?C" . $row['cid'] . "'>" . $row['name'] . "</a></td>
				<td>" . $row['teacher'] . "</td>
				<td>" . $stime->format("d/m/Y") . "</td>
				<td>" . $etime->format("d/m/Y") . "</td>
				<td>$" . $row['owe'] . "</td>";
				
				echo "</tr>\n";
			}
			echo "</table>";
		
		}
		mysql_free_result($result);
	?>

</div>
</div>

<?php include("footer.php"); ?>