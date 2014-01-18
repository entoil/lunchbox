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

	<div class="col_8"  style="line-height: 35px;">

		<div class="col_3">
				Number<br />
				First Name<br />
				Middle Name<br />
				Last Name<br />
				Date of Birth<br />
				Address<br /><br /><br />

				
			
			</div>
			<div class="col_8">
				S<?php echo $row['sid']; ?><br />
				<?php echo $row['fname']; ?><br />
				<?php echo $row['mname']; ?><br />
				<?php echo $row['lname']; ?><br />
				<?php echo $dtime->format("d/m/Y");; ?><br />
				<?php echo $row['street']; ?><br />
				<?php echo $row['suburb']; ?><br />
				<?php echo $row['postcode']; ?>
			</div>
	</div>
	<div class="col_4" style="text-align: right;">
		<ul class="button-bar" style="position: relative; top: -65px; left: 30px">
		<li><a href="edit.php"><i class="icon-pencil"></i> Edit</a></li>
		<li><a href=""><i class="icon-remove"></i> Delete</a></li>
	</ul>
		<img src="photo/s12345.jpg" width="60%" class="sphoto"/>
	</div>
	<div class="col_6"><span onclick="tree(0);"><i class="icon-plus-sign-alt"></i> Contacts</span></div>
	<span id="menu0" style="display:none;">
	<div class="col_12"  style="line-height: 35px;">

		<div class="col_2">
			Name<br />
			Relationship<br />
			Mobile<br />
			Email<br />
		
		</div>
		<div class="col_4">
			<?php echo $row['cname1']; ?><br />
			<?php echo $row['crel1']; ?><br />
			<?php echo $row['cmob1']; ?><br />
			<?php echo $row['cemail1']; ?><br />
		</div>
			<div class="col_2">
			Name<br />
			Relationship<br />
			Mobile<br />
			Email<br />
		
		</div>
		<div class="col_4">
			<?php echo $row['cname2']; ?><br />
			<?php echo $row['crel2']; ?><br />
			<?php echo $row['cmob2']; ?><br />
			<?php echo $row['cemail2']; ?><br />
		</div>
	</div>
	</span>
	<hr />
	<h6>&nbsp;Enrolments</h6><br />
	<!-- Table -->
	<table cellspacing="0" cellpadding="0" class="striped sortable">
	<thead><tr>
		<th>Number:</th>
		<th>Class:</th>
		<th>Teacher:</th>
		<th>Start:</th>
		<th>End:</th>
		<th>Owe:</th>
	</tr></thead>
	<tbody><tr>
		<td><a href="../enrolment/?1234">E34568</a></td>
		<td>Grade 5/6</td>
		<td>Justin Henry</td>
		<td>05/01/2013</td>
		<td>12/10/2014</td>
		<td>$250.00</td>
	</tr><tr>
		<td><a href="../enrolment/?1234">E34567</a></td>
		<td>Grade 5</td>
		<td>Morgan Malone</td>
		<td>09/01/2012</td>
		<td>15/10/2013</td>
		<td>$0.00</td>
	</tr><tr>
		<td><a href="../enrolment/?1234">E34566</a></td>
		<td>Grade 4</td>
		<td>Justin Henry</td>
		<td>10/01/2011</td>
		<td>12/10/2012</td>
		<td>$0.00</td>
	</tr><tr>
		<td><a href="../enrolment/?1234">E33268</a></td>
		<td>Grade 3</td>
		<td>Patrick Hampton</td>
		<td>06/01/2010</td>
		<td>12/10/2011</td>
		<td>$0.00</td>
	</tr></tbody>
	</table>