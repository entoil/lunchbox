<?php include("header.php"); include("../config.inc"); ?>
<script type="text/javascript">
function confirm_alert(node) {
return confirm("Are you sure you want to delete this document?");
}
</script>
<div class="col_12">

	<ul class="tabs left">
	<li><a href="/student/?S<?php echo $sid?>">Student</a></li>
	<li  class="current"><a href="document.php?S<?php echo $sid?>">Documents</a></li>
	<li><a href="audit.php?S<?php echo $sid?>">Audit</a></li>
	</ul>

	<div id="document" class="tab-content">


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
	if(isset($_FILES["file"])){
$allowedExts = array("jpeg", "jpg", "png", "pdf");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {

    if (file_exists("document/S" . $sid . "/" . $_FILES["file"]["name"]))
      {
      $error_exist = $_FILES["file"]["name"] . " already exists. ";
      $nerror++;
      }
    else
      {
      	if (!file_exists("document/S" . $sid)) {
    		mkdir("document/S" . $sid, 0777, true);
		}
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "document/S" . $sid . "/" . $_FILES["file"]["name"]);
      $name = $_FILES["file"]["name"];
      $username = $_SESSION['username'];
      $query = mysql_query("SELECT * FROM users WHERE username = '$username'");
      $row = mysql_fetch_array($query);
      $uploader = $row['name'];
      $notes = validateinput($_POST["notes"]);


      mysql_query ("INSERT INTO documents (`sid`,`name`, `uploaded`, `uploader`, `notes`) VALUES ($sid, '$name', DATE(NOW()), '$uploader', '$notes')");

	$username = $_SESSION['username'];
	$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
	$row = mysql_fetch_array($query);
	$user = $row['name'];
	mysql_query ("INSERT INTO `saudits` (`sid`, `type`, `description`, `date`, `by`) VALUES ($sid, 'Document', '$name uploaded', DATE(NOW()), '$user');");

      }
    }
  }
else
  {
  echo "Invalid file";
  }
}
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
		<span onclick="tree(1);"> <i class="icon-plus-sign-alt"></i> Add Document</span>
		<span id="menu1" style="display:none;">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);echo "?S" . $sid . "#documents";?>" method="post"
		enctype="multipart/form-data">
		<br /><label for="file" class="btn small" ><i class="icon-upload-alt" id="upload"></i> Upload</label>
		<input type="text" name="notes" style="width: 60%;" placeholder="Description">
		<input type="file" name="file" id="file" style="display:none;" required> 
		<button type="submit" class="btn small" name="submit"  value="Submit">Save</button>  
		</form>
		</span><br /><br />
		</div>

		<table cellspacing="0" cellpadding="0">
		<thead><tr>
			<th>Name</th>
			<th>Uploaded</th>
			<th>By</th>
			<th>Notes</th>
			<th></th>
		</tr></thead>
		<tbody>

		<?php
		$query = sprintf("SELECT * FROM `documents` WHERE sid = '$sid';");
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
				$date = new DateTime($row['uploaded']);
				echo "<tr>";
				echo "<td><a href='document/S" . $row['sid'] . "/" . $row['name'] . "' target=\"_blank\">" . $row['name'] . "</td>";
				echo "<td>" . $date->format("d/m/Y") . "</td>";
				echo "<td>" . $row['uploader'] . "</td>";
				echo "<td>" . $row['notes'] . "</td>";
				echo "<td><a href='document/delete.php?" . $row['did'] . "'  onClick='return confirm_alert(this);'><i class=\"icon-remove\"></i></td>";
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