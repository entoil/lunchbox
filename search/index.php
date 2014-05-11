<?php include("header.php"); include("../config.inc"); 

function validateinput($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>

<div class="col_12">

	<ul class="tabs left">
	<li><a href="#search">Search</a></li>	
	</ul>

	<div id="class" class="tab-content">
	<?php
	if (strlen($_GET['q']) > 0) {
		$search = validateinput($_GET['q']);
	}	
	echo "Search for <b>" . $search . "</b>:<br /><br />";
	?>

			<table cellspacing="0" cellpadding="0" class="striped sortable">
	<thead><tr>
		<th width="100px">Number:</th>
		<th>Name:</th>
	</tr></thead>
	<?php 
	$query = sprintf("SELECT * FROM lunchbox.students WHERE sid LIKE '%%$search%%' OR fname LIKE '%%$search%%' OR mname LIKE '%%$search%%' OR lname LIKE '%%$search%%'");
	$result = mysql_query($query);

	if (!$result) {
	    $message  = 'Invalid query: ' . mysql_error() . "\n";
	    $message .= 'Whole query: ' . $query;
	    die($message);
	}

	$fields_num = mysql_num_fields($result);

	if (mysql_num_rows($result) == 0) { echo "No Results Found."; }
	
	else {

		while($row = mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>
			<a href='/student?S" . $row['sid'] . "'>S" . $row['sid'] . "</td>
			<td>" . $row['fname'] . " " .  $row['mname'] . " " . $row['lname'] . "</td>";
			
			echo "</tr>\n";
		}
		
	
	}
	mysql_free_result($result);
	echo "</table>";
	?>


	</div>
</div>

<?php include("footer.php"); ?>