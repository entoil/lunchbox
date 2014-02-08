<?php

session_start();
include("header.php");
include("../config.inc");

?>
<?php

	$uid = $_SERVER['QUERY_STRING'];;

	$query = sprintf("SELECT * FROM `users` WHERE uid = '" . $uid . "';");

	$result = mysql_query($query);

	if (mysql_num_rows($result) == 0) {	header("Location: index.php"); }

	$sql = "DELETE FROM `users` WHERE uid = '" . $uid . "';";

	if (!mysql_query($sql))
	{
		die('Error: ' . mysql_error());
	}

	echo "hey";
	
	header("Location: index.php");
		
?>