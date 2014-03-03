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
	$username = $_SESSION['username'];
	$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
	$row = mysql_fetch_array($query);
	$uploader = $row['name'];
	$notes = validateinput($_POST["notes"]);


      mysql_query ("INSERT INTO documents (`sid`,`name`, `uploaded`, `uploader`, `notes`) VALUES ($sid, '$name', DATE(NOW()), '$uploader', '$notes')");
}


function validateinput($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<?php 
			if ($nerror > 0) { 
				echo "<div class=\"notice error\" ><i class=\"icon-remove-sign icon-large\" ></i>";
				echo $error_exist;

				echo "<a href=\"#close\" class=\"icon-remove\"></a></div>";
			} else if ($nerror == 0) {
				echo "<div class=\"notice success\"><i class=\"icon-ok icon-large\"></i> Document successfully uploaded.
<a href=\"#close\" class=\"icon-remove\"></a></div>";
			}
		?>
<?php 


$error = "";

$query = sprintf("SELECT * FROM `classes` WHERE cid = '" . $cid . "';");
$result = mysql_query($query);
$row = mysql_fetch_array($result);


?>

	<div class="col_8"  style="line-height: 35px;">

		<div class="col_3">
				Class<br />
				Teacher<br />
				Students<br />

				
			
			</div>
			<div class="col_8">
				<?php echo $row['name']; ?><br />
				<?php echo $row['teacher']; ?> <br />
				<?php  
					$query = sprintf("SELECT COUNT(*) as 'count' FROM enrolments WHERE cid = $cid AND start <= DATE(NOW()) AND end >= DATE(NOW());");
					$result = mysql_query($query);
					$row = mysql_fetch_array($result);
					echo $row['count'];
				?> 
			</div>
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
		$query = sprintf("SELECT * FROM `caudits` WHERE cid = '$cid' ORDER BY caid DESC;");
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