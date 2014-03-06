<?php

session_start();
include("../../config.inc");

?>
<?php

	$did = $_SERVER['QUERY_STRING'];

	$query = sprintf("SELECT * FROM `documents` WHERE did = '" . $did . "';");

	$result = mysql_query($query);

	if (mysql_num_rows($result) == 0) {	header("Location: .."); }

	$row = mysql_fetch_array($result);

	$sid = $row['sid'];
	$name = $row['name'];

	$sql = "DELETE FROM `documents` WHERE did = '" . $did . "';";

	if (!mysql_query($sql))
	{
		die('Error: ' . mysql_error());
	}

	$filename = $row['name'];
	echo 'S' . $sid . '/' . $filename;
	unlink('S' . $sid . '/' . $filename);


	$username = $_SESSION['username'];
	$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
	$row = mysql_fetch_array($query);
	$user = $row['name'];
	mysql_query ("INSERT INTO `saudits` (`sid`, `type`, `description`, `date`, `by`) VALUES ($sid, 'Document', '$name deleted', DATE(NOW()), '$user');");

	
	header("Location: ../document.php?S" . $sid);
		
?>