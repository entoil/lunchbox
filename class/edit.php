<?php 

include("header.php"); 
include("../config.inc");
if ($_SESSION['type'] != 0) { header('Location: ..'); }
$cid = substr($_SERVER['QUERY_STRING'], 1);

$teacher = $name = "";
$error_name = $error_teacher = "";

$nerror = -1;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   $nerror = 0;

   $name = validateinput($_POST["name"]);
   $teacher = validateinput($_POST["teacher"]);

   if ($name == "") { $error_name = "<li>Class name required.</li>"; $nerror++; }
   if ($teacher == "") { $error_teacher = "<li>Teacher required.</li>"; $nerror++; }

   if ($nerror == 0) {
      
      $username = $_SESSION['username'];
      $query = mysql_query("SELECT * FROM users WHERE username = '$username'");
      $row = mysql_fetch_array($query);
      $user = $row['name'];

      $query = "SELECT * FROM classes WHERE cid = $cid";
      $result = mysql_query($query);
      $row = mysql_fetch_assoc($result);
      $original_name = $row['name'];
      $original_teacher = $row['teacher'];

      if ($original_name != $name) {
        mysql_query ("INSERT INTO `lunchbox`.`caudits` (`cid`, `type`, `description`, `date`, `by`) VALUES ($cid, 'Name', 'Class name changed from $original_name to $name', DATE(NOW()), '$user');");
      }

      if ($original_teacher != $teacher) {
        mysql_query ("INSERT INTO `lunchbox`.`caudits` (`cid`, `type`, `description`, `date`, `by`) VALUES ($cid, 'Teacher', 'Changed from $original_teacher to $teacher', DATE(NOW()), '$user');");
      }

      mysql_query ("UPDATE classes SET `name` = '$name',`teacher` = '$teacher' WHERE cid = $cid");

      header('Location: /class/?C' . $cid);



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
	 
<div class="col_12">

	<ul class="tabs left">
	<li><a href="#Class">Class</a></li>
	</ul>

	<div id="Class" class="tab-content">
	<?php 
    $query = "SELECT * FROM classes WHERE cid = $cid";
    $result = mysql_query($query);

    if (mysql_num_rows($result) < 1) {
            echo "Class does not exist.";
    } else {
    		$row = mysql_fetch_assoc($result);
    		include ("edit_form.php");
    }

    ?>
	</div>
</div>

<?php include("footer.php"); ?>