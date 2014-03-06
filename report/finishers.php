<?php 
include("header.php"); 
include("../config.inc");

$sday = $smonth = $syear = $eday = $emonth = $eyear = "";
$error_start = $error_end = "";

$nerror = -1;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$nerror = 0;

	$sday = validateinput($_POST["sday"]);
	$smonth = validateinput($_POST["smonth"]);
	$syear = validateinput($_POST["syear"]);
	$eday = validateinput($_POST["eday"]);
	$emonth = validateinput($_POST["emonth"]);
	$eyear = validateinput($_POST["eyear"]);

	if (!checkdate((int) $smonth, (int) $sday, (int) $syear)) { $error_start = "<li>Invalid lower bound date.</li>"; $nerror++; }
    if (!checkdate((int) $emonth, (int) $eday, (int) $eyear)) { $error_end = "<li>Invalid higher bound date.</li>"; $nerror++; }
}

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
<li><a href="#student">Student</a></li>
</ul>

<div id="student" class="tab-content">
<h6>Finishers List</h6>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<div class="col_12" style="line-height: 35px;">
<?php 
	if ($nerror > 0) { 
		echo "<div class=\"notice error\" ><i class=\"icon-remove-sign icon-large\" ></i>Please correct the following error(s):";
		echo $error_start;
		echo $error_end;
		echo "<a href=\"#close\" class=\"icon-remove\"></a></div>";
	}
?>


<div class="col_3">
	From<br />
	To<br />
</div>
<div class="col_5">
<input type="text" name="sday" maxlength="2" placeholder="DD" style="width: 35px !important" value='<?php echo $sday; ?>' /> / <input type="text" name="smonth" maxlength="2" placeholder="MM" style="width: 35px !important" value='<?php echo $smonth; ?>'/> / <input type="text" name="syear" maxlength="4" placeholder="YYYY" style="width: 50px !important" value='<?php echo $syear; ?>'/><br />
<input type="text" name="eday" maxlength="2" placeholder="DD" style="width: 35px !important" value='<?php echo $eday; ?>' /> / <input type="text" name="emonth" maxlength="2" placeholder="MM" style="width: 35px !important" value='<?php echo $emonth; ?>'/> / <input type="text" name="eyear" maxlength="4" placeholder="YYYY" style="width: 50px !important" value='<?php echo $eyear; ?>'/><br />
</div>
<div class="col_12">
<button type="submit" class="medium" name="submit" style="margin-top: 15px;" value="Submit">Generate</button> <br><br>


<?php 
	if ($nerror == 0) { 
		echo "<table cellspacing=\"0\" cellpadding=\"0\" class=\"striped sortable\">
		<thead><tr>
		<th>Number:</th>
		<th>Enrolment:</th>
		<th>Name:</th>
		<th>Start:</th>
		<th>End:</th>
		</tr></thead>";
		$query = sprintf("SELECT * FROM `enrolments` NATURAL JOIN `classes` NATURAL JOIN `students` WHERE end >= '$syear-$smonth-$sday' AND end <= '$eyear-$emonth-$eday';");
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
				<td><a href='/enrolment?E" . $row['eid'] . "'>E" . $row['eid'] . "</td>
				<td>" . $row['fname'] . " " .  $row['mname'] . " " . $row['lname'] . "</td>
				<td>" . $stime->format("d/m/Y") . "</td>
				<td>" . $etime->format("d/m/Y") . "</td>";
				
				echo "</tr>\n";
			}
			echo "</table>";
		
		}
		mysql_free_result($result);

	}
?>
</div>

</div>
</div>
</div>
