<?php 

include("header.php"); 
include("../config.inc");

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
   		mysql_query ("INSERT INTO students (`fname`,`mname`,`lname`,`dob`,`street`,`suburb`,`postcode`,`cname1`,`crel1`,`cmob1`,`cemail1`,`cname2`,`crel2`,`cmob2`,`cemail2`) VALUES ('$fname','$mname','$lname','$year-$month-$day','$street','$suburb','$postcode', '$cname1', '$crel1', '$cmobile1', '$cemail1', '$cname2', '$crel2', '$cmobile2', '$cemail2')");

		$query = mysql_query("SELECT * FROM students ORDER BY sid DESC LIMIT 1;");
		$row = mysql_fetch_array($query);
		$sid = $row['sid'];

		$username = $_SESSION['username'];
		$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
		$row = mysql_fetch_array($query);
		$user = $row['name'];
   		mysql_query ("INSERT INTO `saudits` (`sid`, `type`, `description`, `date`, `by`) VALUES ($sid, 'Create', 'Student profile created', DATE(NOW()), '$user');");

   		$fname = $mname = $lname = $day = $month = $year = $street = $suburb = $postcode = "";
		$error_fname = $error_lname = $error_dob = $error_address = "";
		$cname1 = $crel1 = $cmobile1 = $cemail1 = $cname2 = $crel2 = $cmobile2 = $cemail2 = "";


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
				echo $error_fname;
				echo $error_lname;
				echo $error_dob;
				echo $error_address;
				echo "<a href=\"#close\" class=\"icon-remove\"></a></div>";
			} else if ($nerror == 0) {
				echo "<div class=\"notice success\"><i class=\"icon-ok icon-large\"></i> Student <a href=\"/student/?S$sid\">S$sid</a> has been successfully registered.
<a href=\"#close\" class=\"icon-remove\"></a></div>";
			}
		?>
		

			<div class="col_3">
				First Name<br />
				Middle Name<br />
				Last Name<br />
				Date of Birth<br />
				Address<br /><br /><br />

				
			
			</div>
			<div class="col_5">
				<input type="text" name="fname" value=<?php echo "'$fname'"; ?>/><br />
				<input type="text" name="mname" value=<?php echo "'$mname'"; ?>/><br />
				<input type="text" name="lname" value=<?php echo "'$lname'"; ?>/><br />
				<input type="text" name="day" maxlength="2" placeholder="DD" style="width: 35px !important" value=<?php echo "'$day'"; ?> /> / <input type="text" name="month" maxlength="2" placeholder="MM" style="width: 35px !important" value=<?php echo "'$month'"; ?>/> / <input type="text" name="year" maxlength="4" placeholder="YYYY" style="width: 50px !important" value=<?php echo "'$year'"; ?>/><br />
				<input type="text" name="street" value=<?php echo "'$street'"; ?>/><br />
				<input type="text" name="suburb" value=<?php echo "'$suburb'"; ?>/><br />
				<input type="text" name="postcode" value=<?php echo "'$postcode'"; ?>/>
			</div>
		</div>
		<div class="col_4" style="text-align: right;">
			<img src="photo/s12345.jpg" width="60%" height="60%" /><br />
			<label for="file" class="btn small" style="position: relative; top: 5px; left: 4px; width: 60%; text-align: center;"><i class="icon-upload-alt" id="upload"></i> Upload</label>
			<input type="file" name="file" id="file" style="display:none;"><br>
		</div>
		<div class="col_6">Contacts</div>
		<div class="col_12"  style="line-height: 35px;">

			<div class="col_2">
				Name<br />
				Relationship<br />
				Phone<br />
				Email<br />
			
			</div>
			<div class="col_4">
				<input type="text" name="cname1" value=<?php echo "'$cname1'"; ?>/><br />
				<input type="text" name="crel1" value=<?php echo "'$crel1'"; ?>/><br />
				<input type="text" name="cmobile1" value=<?php echo "'$cmobile1'"; ?>/><br />
				<input type="email" name="cemail1" value=<?php echo "'$cemail1'"; ?>/><br />
			</div>
				<div class="col_2">
				Name<br />
				Relationship<br />
				Phone<br />
				Email<br />
			
			</div>
			<div class="col_4">
				<input type="text" name="cname2" value=<?php echo "'$cname2'"; ?>/><br />
				<input type="text" name="crel2" value=<?php echo "'$crel2'"; ?>/><br />
				<input type="text" name="cmobile2" value=<?php echo "'$cmobile2'"; ?>/><br />
				<input type="email" name="cemail2" value=<?php echo "'$cemail2'"; ?>/><br />
			</div>
		<button type="submit" class="medium" style="margin-top: 15px;"><i class="icon-save"></i> Save</button>
		</div>
	</form>	
	</div>
</div>

<?php include("footer.php"); ?>