<?php 

include("header.php"); 
include("../config.inc");

$student = $class = $sday = $smonth = $syear = $eday = $emonth = $eyear = $owe = "";
$error_student = $error_class = $error_start = $error_end = $error_invalid = $error_owe = $error_exist = "";

$nerror = -1;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   $nerror = 0;

   $student = validateinput($_POST["student"]);
   $class = validateinput($_POST["class"]);
   $sday = validateinput($_POST["sday"]);
   $smonth = validateinput($_POST["smonth"]);
   $syear = validateinput($_POST["syear"]);
   $eday = validateinput($_POST["eday"]);
   $emonth = validateinput($_POST["emonth"]);
   $eyear = validateinput($_POST["eyear"]);
   $owe = validateinput($_POST["owe"]);

	$query = "SELECT * FROM students WHERE sid = $student";
    $result = mysql_query($query);

   if ($student == "") { $error_student = "<li>Student number required.</li>"; $nerror++; } else if (mysql_num_rows($result) < 1) { $error_exist = "<li>Student does not exist.</li>"; $nerror++; }
   if ($class == "") { $error_class = "<li>Class selection required.</li>"; $nerror++; }
   if (!checkdate((int) $smonth, (int) $sday, (int) $syear)) { $error_start = "<li>Invalid start date.</li>"; $nerror++; }
   if (!checkdate((int) $emonth, (int) $eday, (int) $eyear)) { $error_end = "<li>Invalid end date.</li>"; $nerror++; }
   if ((int) $syear >= (int) $eyear && (int) $smonth >= (int) $emonth && (int) $sday >= (int) $eday) { $error_invalid = "<li>Start date must be before end date.</li>"; $nerror++; }
   if ($owe == "") { $owe = "0.00"; }

   if (!preg_match('/^[0-9]+(?:\.[0-9]+)?$/', $owe))
    {
        $error_owe = "<li>Invaid owe amount.</li>"; $nerror++; 
    }

   if ($nerror == 0) {
   		$sid = $student;
   		mysql_query ("INSERT INTO enrolments (`sid`,`cid`,`start`,`end`,`owe`) VALUES ( $student , $class,'$syear-$smonth-$sday','$eyear-$emonth-$eday','$owe')");
       
		$query = mysql_query("SELECT * FROM enrolments ORDER BY eid DESC LIMIT 1;");
		$row = mysql_fetch_array($query);
		$eid = $row['eid'];

		$username = $_SESSION['username'];
		$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
		$row = mysql_fetch_array($query);
		$user = $row['name'];
		mysql_query ("INSERT INTO `saudits` (`sid`, `type`, `description`, `date`, `by`) VALUES ($sid, 'Enrol', '<a href=/enrolment/?E$eid>E$eid</a> created', DATE(NOW()), '$user');");

   		$student = $class = $sday = $smonth = $syear = $eday = $emonth = $eyear = $owe = "";
		$error_student = $error_class = $error_start = $error_end = $error_invalid = $error_owe = $error_exist = "";

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
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		<div class="col_8" style="line-height: 35px;">
		<?php 
			if ($nerror > 0) { 
				echo "<div class=\"notice error\" ><i class=\"icon-remove-sign icon-large\" ></i>Please correct the following error(s):";
				echo $error_student;
				echo $error_exist;
				echo $error_class;
				echo $error_start;
				echo $error_end;
				echo $error_invalid;
				echo $error_owe;
				echo "<a href=\"#close\" class=\"icon-remove\"></a></div>";
			} else if ($nerror == 0) {
				echo "<div class=\"notice success\"><i class=\"icon-ok icon-large\"></i> Enrolment successfully created for student <a href='/student/?S" . $sid . "'>S" . $sid . "</a>.
<a href=\"#close\" class=\"icon-remove\"></a></div>";
			}
		?>
		

			<div class="col_3">
				Student<br />
				Class<br />
				Start<br />
				End<br />
				Owing<br /><br />

				
			
			</div>
			<div class="col_5">
				S <input type="text" name="student" style="width: 70px !important" value='<?php echo $student; ?>'/><br />
				<select name="class">
				<option value="">Select Class</option>
				<?php
				$query = sprintf("SELECT * FROM `classes`;");
				$result = mysql_query($query);

				while($row = mysql_fetch_array($result))
				{
					echo "<option value=\"". $row['cid'] . "\">" . $row['name'] . "</option>";
				}		
				mysql_free_result($result);
				?>		
				</select>
				<br />
				<input type="text" name="sday" maxlength="2" placeholder="DD" style="width: 35px !important" value='<?php echo $sday; ?>' /> / <input type="text" name="smonth" maxlength="2" placeholder="MM" style="width: 35px !important" value='<?php echo $smonth; ?>'/> / <input type="text" name="syear" maxlength="4" placeholder="YYYY" style="width: 50px !important" value='<?php echo $syear; ?>'/><br />
				<input type="text" name="eday" maxlength="2" placeholder="DD" style="width: 35px !important" value='<?php echo $eday; ?>' /> / <input type="text" name="emonth" maxlength="2" placeholder="MM" style="width: 35px !important" value='<?php echo $emonth; ?>'/> / <input type="text" name="eyear" maxlength="4" placeholder="YYYY" style="width: 50px !important" value='<?php echo $eyear; ?>'/><br />
				$ <input type="text" name="owe" style="width: 70px !important" value='<?php echo $owe; ?>'/><br />
			</div>
		<div class="col_12"  style="line-height: 35px;">
		<button type="submit" class="medium" style="margin-top: 15px;"><i class="icon-save"></i> Save</button> <a href="../enrolment/?E<?php echo $row['eid']; ?>"><button type="button" class="medium" style="margin-top: 15px;">Cancel</button></a>
		</div>

	</form>	
	</div>
</div>

<?php include("footer.php"); ?>