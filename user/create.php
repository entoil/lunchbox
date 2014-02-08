<?php 

include("header.php"); 
include("../config.inc");

$user = $pass = $name = "";
$error_user = $error_pass = $error_name = $error_exist = "";

$nerror = -1;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   $nerror = 0;

   $user = validateinput($_POST["user"]);
   $pass = validateinput($_POST["pass"]);
   $name = validateinput($_POST["name"]);
   $type = validateinput($_POST["type"]);

   if ($user == "") { $error_user = "<li>Username required.</li>"; $nerror++; }
   if ($pass == "") { $error_pass = "<li>Password required.</li>"; $nerror++; }
   if ($name == "") { $error_name = "<li>Name required.</li>"; $nerror++; }

   $result = mysql_query("SELECT * FROM `users` WHERE username = '$user'");
   if (mysql_num_rows($result) != 0) { $error_exist = "<li>Username already exists.</li>"; $nerror++; }

   if ($nerror == 0) {
   		mysql_query ("INSERT INTO users (`username`,`password`,`type`,`name`) VALUES ('$user','$pass','$type','$name')");
   		
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
	<li><a href="#student">Student</a></li>
	</ul>

	<div id="user" class="tab-content">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		<div class="col_8" style="line-height: 35px;">
		<?php
			if ($nerror > 0) { 
				echo "<div class=\"notice error\" ><i class=\"icon-remove-sign icon-large\" ></i>Please correct the following error(s):";
				echo $error_user;
				echo $error_pass;
				echo $error_name;
				echo $error_exist;
				echo "<a href=\"#close\" class=\"icon-remove\"></a></div>";
			}
		?>
		

			<div class="col_3">
				Username<br />
				Password<br />
				Name<br />
				Type<br />

				
			
			</div>
			<div class="col_5">
				<input type="text" name="user" value=<?php echo "'$user'"; ?>/><br />
				<input type="password" name="pass" value=<?php echo "'$pass'"; ?>/><br />
				<input type="text" name="name" value=<?php echo "'$name'"; ?>/><br />
				<input type="radio" name="type" value="1" checked> Teacher 
				<input type="radio" name="type" value="0"> Admin	
			</div>
		</div>

		<div class="col_12"  style="line-height: 35px;">

		<button type="submit" class="medium" style="margin-top: 15px;">Create</button>
		</div>
	</form>	
	</div>
</div>

<?php include("footer.php"); ?>