<?php 

include("header.php"); 
include("../config.inc");

$teacher = $name = "";
$error_name = $error_teacher = "";

$nerror = -1;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   $nerror = 0;

   $name = validateinput($_POST["name"]);
   $teacher = validateinput($_POST["teacher"]);

   if ($name == "") { $error_name = "<li>Class name required.</li>"; $nerror++; }
   if ($teacher == "") { $error_teacher = "<li>Teacher required.</li>"; $nerror++; }

   if ($nerror == 0) {
   		mysql_query ("INSERT INTO classes (`name`,`teacher`) VALUES ('$name','$teacher')");
   		
   		header('Location: index.php');



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
	<li><a href="#student">Class</a></li>
	</ul>

	<div id="user" class="tab-content">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		<div class="col_8" style="line-height: 35px;">
		<?php
			if ($nerror > 0) { 
				echo "<div class=\"notice error\" ><i class=\"icon-remove-sign icon-large\" ></i>Please correct the following error(s):";
				echo $error_teacher;
				echo $error_name;
				echo "<a href=\"#close\" class=\"icon-remove\"></a></div>";
			}
		?>
		

			<div class="col_3">
				Class Name<br />
				Teacher<br />

				
			
			</div>
			<div class="col_5">
				<input type="text" name="name" value=<?php echo "'$name'"; ?>/><br />
				<input type="text" name="teacher" value=<?php echo "'$teacher'"; ?>/><br />
			</div>
		</div>

		<div class="col_12"  style="line-height: 35px;">

		<button type="submit" class="medium" style="margin-top: 15px;">Create</button>
		</div>
	</form>	
	</div>
</div>

<?php include("footer.php"); ?>