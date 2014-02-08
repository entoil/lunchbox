<?php include("header.php"); include("../config.inc"); ?>
<script type="text/javascript">
function confirm_alert(node) {
return confirm("Are you sure you want to delete this user?");
}
</script>
<div class="col_12">

	<ul class="tabs left">
	<li><a href="#student">Users</a></li>
	</ul>

	<div id="student" class="tab-content">

	<?php 

$sid = substr($_SERVER['QUERY_STRING'], -5);
$error = "";

$query = sprintf("SELECT * FROM `students` WHERE sid = '" . $sid . "';");
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$dtime = new DateTime($row['dob']);

for ($i = 54734; $i < 54750; $i++)
?>
<script>
flag = new Array();
function tree(num){
    menu = document.getElementById("menu" + num)
    if(flag[num] == 1){
        menu.style.display='none';
        flag[num] = 0;
    }
    else{
        menu.style.display='block';
        flag[num] = 1;
    }
}
</script>

	<h6>&nbsp;Users</h6><br />
	<!-- Table -->
	<a href="create.php"> New User</a><br/><br/>
	<table cellspacing="0" cellpadding="0" class="striped sortable">
	<thead><tr>
		<th>Username:</th>
		<th>Name:</th>
		<th>Type:</th>
		<th>Delete:</th>
	</tr></thead>
	<?php
		$query = sprintf("SELECT * FROM `users`");
		$result = mysql_query($query);

		if (!$result) {
		    $message  = 'Invalid query: ' . mysql_error() . "\n";
		    $message .= 'Whole query: ' . $query;
		    die($message);
		}

		$fields_num = mysql_num_fields($result);

		if (mysql_num_rows($result) == 0) { echo ""; }
		
		else {
	
			while($row = mysql_fetch_array($result))
			{
				echo "<tr>";
				echo "
				<td>" . $row['username'] . "</td>
				<td>" . $row['name'] . "</td>
				<td>";
				if ($row['type']) { echo 'Teacher'; } else { echo 'Admin'; }
				echo "</td>
				<td>
				<a href='delete.php?" . $row['uid'] . "' title='Delete' onClick='return confirm_alert(this);'><i class='icon-remove'></i></td>";
				echo "</tr>";
			}
			echo "</table>";
		
		}
		mysql_free_result($result);
	?>

</div>

</div>

<?php include("footer.php"); ?>