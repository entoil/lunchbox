<?php include("config.inc"); ?>
<!DOCTYPE html>
<html><head>
<title>Lunchbox</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="description" content="" />
<meta name="copyright" content="" />
<link rel="stylesheet" type="text/css" href="css/kickstart.css" media="all" />                  <!-- KICKSTART -->
<link rel="stylesheet" type="text/css" href="style.css" media="all" />                          <!-- CUSTOM STYLES -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="js/kickstart.js"></script>                                  <!-- KICKSTART -->
<style>
body {
	margin: 300px;
}
#loginbox {
	border: 1px solid #ccc;
	background: #FFF; 
	width: 350px; 
	height: 250px;
	margin:auto;
	padding: 50px;
}
table, tr, td {
	border:none;
	margin:0;
	padding:0;
}
</style>

</head><body>

<!-- Menu Horizontal -->
<ul class="menu" style="width: 350px; margin:auto;">
<li><a href=""><span class="icon" data-icon="R"></span>Lunchbox Login</a></li>
</ul>
	
<!-- ===================================== END HEADER ===================================== -->
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
<div id="loginbox">
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
    <table height="150px">
    <tr height="15px"><td>Username:</td><td><input type="text" name="user" size="18" maxlength="25" value='<?php echo $user; ?>' required ></td></tr>
    <tr height="15px"><td>Password:</td><td><input type="password" name="pass" size="18" maxlength="25" required></td></tr>
    <tr height="15px"><td colspan="2" style="text-align:center"><input type="submit" value="Log In"></td></tr>
    </table>
	</form>
</div>
</body>