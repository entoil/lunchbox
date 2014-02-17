<h6> Class List</h6>
<br />
<table cellspacing="0" cellpadding="0" class="striped sortable">
	<thead><tr>
		<th>Class:</th>
		<th>Teacher:</th>
		<th>Students:</th>
	</tr></thead>

<?php

$query = sprintf("SELECT * FROM `classes`;");
		$result = mysql_query($query);

		if (!$result) {
		    $message  = 'Invalid query: ' . mysql_error() . "\n";
		    $message .= 'Whole query: ' . $query;
		    die($message);
		}

		$fields_num = mysql_num_fields($result);

		if (mysql_num_rows($result) == 0) { echo "No classes"; }
		
		else {
	
			while($row = mysql_fetch_array($result))
			{
				$cid = $row['cid'];
				$countq = sprintf("SELECT COUNT(*) as 'count' FROM enrolments WHERE cid = $cid AND start <= DATE(NOW()) AND end >= DATE(NOW());");
				$countr = mysql_query($countq);
				$count = mysql_fetch_array($countr);
				$inclass =  $count['count'];

				echo "<tr>";
				echo "<td>
				<a href='/class/?C" . $row['cid'] . "'>" . $row['name'] . "</td>
				<td>" . $row['teacher'] . "</td>
				<td>" . $inclass . "</td>";
				
				echo "</tr>\n";
			}
			echo "</table>";
		
		}
		mysql_free_result($result);

?>