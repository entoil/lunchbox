<?php

$hostname = 'mysql16.000webhost.com'; 
$dbname   = 'a7243305_db'; 
$username = 'a7243305_admin';
$password = 'bahbah12'; 

mysql_connect($hostname, $username, $password) or DIE('Connection to host is failed, perhaps the service is down!');

mysql_select_db($dbname) or DIE('Database name is not available!');

?>
