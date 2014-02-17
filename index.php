<?php include("header.php");  include("config.inc"); ?>
<?php
session_start();
if (isset($_SESSION['username'])) {
	header('Location: portal.php');
}

$user = $pass = "";

$error_user = $error_pass = $error_combo = "";

$nerror = -1;	

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   $nerror = 0;

   $user = validateinput($_POST["user"]);
   $pass = validateinput($_POST["pass"]);

   if ($user == "") { $error_user = "<li>Username required.</li>"; $nerror++; }
   if ($pass == "") { $error_pass = "<li>Password required.</li>"; $nerror++; }
   $result = mysql_query("SELECT * FROM `users` WHERE username = '$user' and password = '$pass'");
	//if(!$result) die ('Unable to run query:'.mysql_error());
   if (mysql_num_rows($result) == 1) {
		$row = mysql_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		$_SESSION['type'] = $row['type'];
		header('Location: portal.php');
   } else  { $error_combo = "<li>Invalid username or password.</li>"; $nerror++; }
}

function validateinput($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>

<div class="col_3">	</div>
<div class="col_5">

	<p><br /><br /><br /><br />
		<?php 
			if ($nerror > 0) { 
				echo "<div class=\"notice error\" ><i class=\"icon-remove-sign icon-large\" ></i>Please correct the following error(s):";
				echo $error_user;
				echo $error_pass;
				echo $error_combo;
				echo "<a href=\"#close\" class=\"icon-remove\"></a></div>";
			} else if ($nerror == 0) {
				echo "<div class=\"notice success\"><i class=\"icon-ok icon-large\"></i> Student successfully modified.
<a href=\"#close\" class=\"icon-remove\"></a></div>";
			}
		?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" name="form"> 
    <table cellspacing='0' cellpadding='4'>
    <tr><td>Username:</td><td><input type="text" name="user" size="18" maxlength="25" value='<?php echo $user; ?>' required ></td></tr>
    <tr><td>Password:</td><td><input type="password" name="pass" size="18" maxlength="25" required></td></tr>
    </table>
    <br />
   	<table>
    <tr><td><input type="submit" style="margin-left:0" value="Log In"></td>
    </table>
	</form>

	</p><br /><br /><br /><br />
	
	
</div>
<div class="col_4">	</div>