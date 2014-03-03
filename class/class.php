<?php 


	$error = "";

	$query = sprintf("SELECT * FROM `classes` WHERE cid = '" . $cid . "';");
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);


	?>

		<div class="col_8"  style="line-height: 35px;">

			<div class="col_3">
					Class<br />
					Teacher<br />
					Students<br /><br />

					
				
				</div>
				<div class="col_8">
					<?php echo $row['name']; ?><br />
					<?php echo $row['teacher']; ?> <br />
					<?php  
						$query = sprintf("SELECT COUNT(*) as 'count' FROM enrolments WHERE cid = $cid AND start <= DATE(NOW()) AND end >= DATE(NOW());");
						$result = mysql_query($query);
						$row = mysql_fetch_array($result);
						echo $row['count'];
					?> <br />
				</div>
		</div>
		<div class="col_4" style="text-align: right;">

			<a href="edit.php?C<?php echo $cid; ?>"><button class="medium" <?php if ($_SESSION['type'] != 0) { echo "disabled='disabled'";} ?>><i class="icon-pencil" ></i> Edit</button></a>
			
		</div>

		<table cellspacing="0" cellpadding="0" class="striped sortable">
	<thead><tr>
		<th>Number:</th>
		<th>Name:</th>
		<th>Enrolment:</th>
		<th>End:</th>
	</tr></thead>
	<?php
		$query = sprintf("SELECT * FROM `enrolments` NATURAL JOIN `classes` NATURAL JOIN `students` WHERE cid = $cid AND start <= DATE(NOW()) AND end >= DATE(NOW());");
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
				<a href='/student?S" . $row['sid'] . "'>S" . $row['sid'] . "</td>
				<td>" . $row['fname'] . " " .  $row['mname'] . " " . $row['lname'] . "</td>
				<td><a href='/enrolment?E" . $row['eid'] . "'>E" . $row['eid'] . "</td>
				<td>" . $etime->format("d/m/Y") . "</td>";
				
				echo "</tr>\n";
			}
			echo "</table>";
		
		}
		mysql_free_result($result);

		?>