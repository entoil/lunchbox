<?php 

include("header.php"); 
include("../config.inc");

$eid = substr($_SERVER['QUERY_STRING'], -3);

$sday = $smonth = $syear = $eday = $emonth = $eyear = $owe = "";
$error_start = $error_end = $error_invalid = $error_owe = "";

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
   $owe = validateinput($_POST["owe"]);

   if (!checkdate((int) $smonth, (int) $sday, (int) $syear)) { $error_start = "<li>First name required.</li>"; $nerror++; }
   if (!checkdate((int) $emonth, (int) $eday, (int) $eyear)) { $error_end = "<li>Family name required.</li>"; $nerror++; }
   if ((int) $syear >= (int) $syear && (int) $smonth >= (int) $emonth && (int) $eday >= (int) $eday) { $error_invalid = "<li>Start date must be before end date.</li>"; $nerror++; }
   if ($owe == "") { $owe = "0.00"; }

   if (!preg_match('/^[0-9]+(?:\.[0-9]+)?$/', $owe))
    {
        $error_owe = "<li>Invaid owe amount.</li>"; $nerror++; 
    }

   if ($nerror == 0) {
   		echo "UPDATE enrolments SET `start`='$syear-$smonth-$sday', `end`='$eyear-$emonth-$eday', `owe`='$owe' WHERE eid = $eid";
   		mysql_query ("UPDATE enrolments SET `start`='$syear-$smonth-$sday', `end`='$eyear-$emonth-$eday', `owe`='$owe' WHERE eid = $eid");
   		header('Location: ?E' . $eid);
   }
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
	<?php 
	$sid = substr($_SERVER['QUERY_STRING'], -3);
    $query = "SELECT * FROM enrolments NATURAL JOIN students NATURAL JOIN classes WHERE eid = $eid";
    $result = mysql_query($query);

    if (mysql_num_rows($result) < 1) {
            echo "Enrolment does not exist.";
    } else {
    		$row = mysql_fetch_assoc($result);
    		include ("edit_form.php");
    }

    ?>
	</div>
</div>

<?php include("footer.php"); ?>