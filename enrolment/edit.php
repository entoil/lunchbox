<?php 

include("header.php"); 
include("../config.inc");
if ($_SESSION['type'] != 0) { header('Location: ..'); }
$eid = substr($_SERVER['QUERY_STRING'], -3);

$query = mysql_query("SELECT * FROM enrolments WHERE eid = $eid");
$row = mysql_fetch_array($query);
$sid = $row['sid'];

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

   if (!checkdate((int) $smonth, (int) $sday, (int) $syear)) { $error_start = "<li>Invalid start date.</li>"; $nerror++; }
   if (!checkdate((int) $emonth, (int) $eday, (int) $eyear)) { $error_end = "<li>Invalid end date.</li>"; $nerror++; }
   if ((int) $syear >= (int) $eyear && (int) $smonth >= (int) $emonth && (int) $sday >= (int) $eday) { $error_invalid = "<li>Start date must be before end date.</li>"; $nerror++; }
   if ($owe == "") { $owe = "0.00"; }

   if (!preg_match('/^[0-9]+(?:\.[0-9]+)?$/', $owe))
    {
        $error_owe = "<li>Invaid owe amount.</li>"; $nerror++; 
    }

   if ($nerror == 0) {
   		

      $username = $_SESSION['username'];
      $query = mysql_query("SELECT * FROM users WHERE username = '$username'");
      $row = mysql_fetch_array($query);
      $user = $row['name'];


      $query = "SELECT * FROM enrolments WHERE eid = $eid";
      $result = mysql_query($query);
      $row = mysql_fetch_assoc($result);
      $stime = substr($row['start'], -2) . "/" . substr($row['start'], 5, 2) . "/" . substr($row['start'], 0, 4);
      $stimeafter = $sday . "/" . $smonth . "/" . $syear;
      $etime = substr($row['end'], -2) . "/" . substr($row['end'], 5, 2) . "/" . substr($row['end'], 0, 4);
      $etimeafter = $eday . "/" . $emonth . "/" . $eyear;
      $original_owe = $row['owe'];

      if ($original_owe != $owe) {
        mysql_query ("INSERT INTO `saudits` (`sid`, `type`, `description`, `date`, `by`) VALUES ($sid, 'Enrol', '<a href=/enrolment/?E$eid>E$eid</a>: Owe amount from \$$original_owe to \$$owe', DATE(NOW()), '$user');");
      }

      if ($stime != $stimeafter) {
        mysql_query ("INSERT INTO `saudits` (`sid`, `type`, `description`, `date`, `by`) VALUES ($sid, 'Enrol', '<a href=/enrolment/?E$eid>E$eid</a>: Start date from $stime to $sday/$smonth/$syear', DATE(NOW()), '$user');");
      }

      if ($etime != $etimeafter) {
        mysql_query ("INSERT INTO `saudits` (`sid`, `type`, `description`, `date`, `by`) VALUES ($sid, 'Enrol', '<a href=/enrolment/?E$eid>E$eid</a>: End date from $etime to $eday/$emonth/$eyear', DATE(NOW()), '$user');");
      }

      mysql_query ("UPDATE enrolments SET `start`='$syear-$smonth-$sday', `end`='$eyear-$emonth-$eday', `owe`='$owe' WHERE eid = $eid");
      //header('Location: /enrolment/?E' . $eid);
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