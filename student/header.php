<?php
include("../config.inc");
session_start();
if (!isset($_SESSION['username'])) { header('Location: ..'); }
$sid = substr($_SERVER['QUERY_STRING'], -5);
?>

<!DOCTYPE html>
<html><head>
<title>Lunchbox</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="description" content="" />
<meta name="copyright" content="" />
<link rel="stylesheet" type="text/css" href="../css/kickstart.css" media="all" />                  <!-- KICKSTART -->
<link rel="stylesheet" type="text/css" href="../style.css" media="all" />                          <!-- CUSTOM STYLES -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/kickstart.js"></script>                                  <!-- KICKSTART -->
</head><body>

<!-- Menu Horizontal -->
<ul class="menu">
<li><a href=".." style="text-transform: uppercase; font-weight: bold; letter-spacing: 2px;"><span class="icon" data-icon="R"></span>Lunchbox</a>
	<ul>
	<li><a href=""><span class="icon" data-icon="G"></span>Report</a>
		<ul>
		<li><a href="/report/starters.php"><span class="icon" data-icon="k"></span>Starters</a></li>
		<li><a href="/report/finishers.php"><span class="icon" data-icon="k"></span>Finishers</a></li>
		</ul>
	</li>
	<li><a href=""><span class="icon" data-icon="A"></span>Class</a>
		<ul>
		<li><a href="/class/"><span class="icon" data-icon="T"></span>Class List</a></li>
		<li class="divider">

		<?php
		$query = sprintf("SELECT * FROM `classes`;");
		$result = mysql_query($query);
	
		while($row = mysql_fetch_array($result))
		{
			echo "<a href='/class/?C" . $row['cid'] . "'>" . $row['name'] . "</a></li><li>";
			echo "</li>";
		}		
		mysql_free_result($result);
		?>

		</ul>
	</li>
	<li><a href=""><span class="icon" data-icon="A"></span>New</a>
		<ul>
		<li><a href="/student/create.php"><span class="icon" data-icon="Z"></span>Student</a></li>
		<li><a href="/enrolment/create.php"><span class="icon" data-icon="k"></span>Enrolment</a></li>
		<li><a href="/class/create.php"><span class="icon" data-icon="J"></span>Class</a></li>
		</ul>
	</li>
	<?php if ($_SESSION['type'] == 0) { echo "<li><a href=\"/user\">Users</a></li>"; } ?>
	
	<li class="divider"><a href="/logout.php"><span class="icon" data-icon="T"></span>Logout</a></li>
	</ul>
</li>
</ul>
<div class="right" id="search"><input id="text1" type="text" /> <button class="small"><i class="icon-search"></i> Search</button></div>
<div class="grid">
	
<!-- ===================================== END HEADER ===================================== -->