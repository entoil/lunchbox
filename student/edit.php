<?php 

include("header.php"); 
include("../config.inc");

$sid = substr($_SERVER['QUERY_STRING'], -5);

$fname = $mname = $lname = $day = $month = $year = $street = $suburb = $postcode = "";
$error_fname = $error_lname = $error_dob = $error_address = $image = "";
$cname1 = $crel1 = $cmobile1 = $cemail1 = $cname2 = $crel2 = $cmobile2 = $cemail2 = "";

$nerror = -1;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   $nerror = 0;

   $fname = validateinput($_POST["fname"]);
   $mname = validateinput($_POST["mname"]);
   $lname = validateinput($_POST["lname"]);
   $day = validateinput($_POST["day"]);
   $month = validateinput($_POST["month"]);
   $year = validateinput($_POST["year"]);
   $street = validateinput($_POST["street"]);
   $suburb = validateinput($_POST["suburb"]);
   $postcode = validateinput($_POST["postcode"]);

   $cname1 = validateinput($_POST["cname1"]);
   $crel1 = validateinput($_POST["crel1"]);
   $cmobile1 = validateinput($_POST["cmobile1"]);
   $cemail1 = validateinput($_POST["cemail1"]);

   $cname2 = validateinput($_POST["cname2"]);
   $crel2 = validateinput($_POST["crel2"]);
   $cmobile2 = validateinput($_POST["cmobile2"]);
   $cemail2 = validateinput($_POST["cemail2"]);

   if ($fname == "") { $error_fname = "<li>First name required.</li>"; $nerror++; }
   if ($lname == "") { $error_lname = "<li>Family name required.</li>"; $nerror++; }
   if (!checkdate((int) $month, (int) $day, (int) $year)) { $error_dob = "<li>Invalid birth date.</li>"; $nerror++; }
   if ($street == "") { $error_address = "<li>Postal Address Required.</li>"; $nerror++; }

   if ($nerror == 0) {
   		echo "UPDATE students SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`dob`='$year-$month-$day',`street`='$street',`suburb`='$suburb',`postcode`='$postcode',`cname1`='$cname1',`crel1`='$crel1',`cmob1`='$cmobile1',`cemail1`='$cemail1',`cname2`='$cname2',`crel2`='$crel2',`cmob2`='$cmobile2',`cemail2`='$cemail2' WHERE sid = $sid";
   		mysql_query ("UPDATE students SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`dob`='$year-$day-$day',`street`='$street',`suburb`='$suburb',`postcode`='$postcode',`cname1`='$cname1',`crel1`='$crel1',`cmob1`='$cmobile1',`cemail1`='$cemail1',`cname2`='$cname2',`crel2`='$crel2',`cmob2`='$cmobile2',`cemail2`='$cemail2' WHERE sid = $sid");
   		header('Location: ?S' . $sid);
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
	$sid = substr($_SERVER['QUERY_STRING'], -5);
    $query = "SELECT * FROM students WHERE sid = $sid";
    $result = mysql_query($query);

    if (mysql_num_rows($result) < 1) {
            echo "Student does not exist.";
    } else {
    		$row = mysql_fetch_assoc($result);
    		include ("edit_form.php");
    }

    ?>
	</div>
</div>

<?php include("footer.php"); ?>