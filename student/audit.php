<?php include("header.php"); include("../config.inc"); ?>

<div class="col_12">

	<ul class="tabs left">
	<li><a href="/student/?S<?php echo $sid?>">Student</a></li>
	<li><a href="document.php?S<?php echo $sid?>">Documents</a></li>
	<li  class="current"><a href="audit.php?S<?php echo $sid?>">Audit</a></li>
	</ul>

	<div id="audit" class="tab-content">


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
<?php
$error_exist = "";
$nerror = -1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nerror = 0;

	$type = validateinput($_POST["type"]);
	$description = validateinput($_POST["description"]);

	$username = $_SESSION['username'];
	$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
	$row = mysql_fetch_array($query);
	$user = $row['name'];
	mysql_query ("INSERT INTO `saudits` (`sid`, `type`, `description`, `date`, `by`) VALUES ($sid, '$type', '$description', DATE(NOW()), '$user');");

}


function validateinput($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

		if ($nerror > 0) { 
			echo "<div class=\"notice error\" ><i class=\"icon-remove-sign icon-large\" ></i>";
			echo $error_exist;
			echo "<a href=\"#close\" class=\"icon-remove\"></a></div>";
		} else if ($nerror == 0) {
			echo "<div class=\"notice success\"><i class=\"icon-ok icon-large\"></i>  Audit successfully documented.
			<a href=\"#close\" class=\"icon-remove\"></a></div>";
		}

		$query = sprintf("SELECT * FROM `students` WHERE sid = '" . $sid . "';");
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		?>
		<div class="col_8">

		<div class="col_3">
		Number<br />
		Name<br />			
		</div>
		<div class="col_5">
		S<?php echo $sid ?><br />
		<?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname'];?><br />
		</div>
		</div>

		<div class="col_12">
		<span onclick="tree(2);"> <i class="icon-plus-sign-alt"></i> Add Audit</span>
		<span id="menu2" style="display:none;">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);echo "?S" . $sid;?>" method="post"
		enctype="multipart/form-data">
		<br />
		<select name="type">
		<option value="Contact">Contact</option>
		<option value="Other">Other</option>
		</select>
		<input type="text" name="description" style="width: 60%;" placeholder="Description">
		<button type="submit" class="btn small" name="submit"  value="Submit">Save</button>  
		</form>
		</span><br /><br />
		</div>

		<table cellspacing="0" cellpadding="0">
		<thead><tr>
			<th>Type</th>
			<th>Description</th>
			<th>Date</th>
			<th>By</th>
			<th></th>
		</tr></thead>
		<tbody>

		<?php
		$query = sprintf("SELECT * FROM `saudits` WHERE sid = '$sid' ORDER BY said DESC;");
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
				$date = new DateTime($row['date']);
				echo "<tr>";
				echo "<td>" . $row['type'] . "</td>";
				echo "<td>" . $row['description'] . "</td>";
				echo "<td>" . $date->format("d/m/Y") . "</td>";
				echo "<td>" . $row['by'] . "</td>";
				echo "</tr>\n";
			}
			echo "</table>";
		
		}
		mysql_free_result($result);
		?>
		</tbody>
		</table>
		</div>
		</div>

<?php include("footer.php"); ?>