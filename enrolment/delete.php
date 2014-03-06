<?php
include("header.php");
include("../config.inc");

?>
<?php

	$eid = substr($_SERVER['QUERY_STRING'], -3);
	$query = sprintf("SELECT * FROM `enrolments` WHERE eid = $eid;");
	$result = mysql_query($query);


	$sql = "DELETE FROM `enrolments` WHERE eid = $eid;";

	if (!mysql_query($sql))
	{
		die('Error: ' . mysql_error());
	} else {
	$row = mysql_fetch_array($result);
	$sid = $row['sid'];

	$username = $_SESSION['username'];
	$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
	$row = mysql_fetch_array($query);
	$user = $row['name'];
	mysql_query ("INSERT INTO `saudits` (`sid`, `type`, `description`, `date`, `by`) VALUES ($sid, 'Enrol', 'E$eid cancelled', DATE(NOW()), '$user');");


	header("Location: /student/?S$sid"); }
		
?>