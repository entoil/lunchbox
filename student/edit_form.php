<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); echo "?S" . $sid;?>"> 
		<div class="col_8" style="line-height: 35px;">
		<?php 
			if ($nerror > 0) { 
				echo "<div class=\"notice error\" ><i class=\"icon-remove-sign icon-large\" ></i>Please correct the following error(s):";
				echo $error_fname;
				echo $error_lname;
				echo $error_dob;
				echo $error_address;
				echo "<a href=\"#close\" class=\"icon-remove\"></a></div>";
			} else if ($nerror == 0) {
				echo "<div class=\"notice success\"><i class=\"icon-ok icon-large\"></i> Student successfully modified.
<a href=\"#close\" class=\"icon-remove\"></a></div>";
			}
		?>
		

			<div class="col_3">
				Number<br />
				First Name<br />
				Middle Name<br />
				Last Name<br />
				Date of Birth<br />
				Address<br /><br /><br />

				
			
			</div>
			<div class="col_5">
				S<?php echo $row['sid']; ?><br />
				<input type="text" name="fname" value='<?php echo $row['fname']; ?>'/><br />
				<input type="text" name="mname" value='<?php echo $row['mname']; ?>'/><br />
				<input type="text" name="lname" value='<?php echo $row['lname']; ?>'/><br />
				<input type="text" name="day" maxlength="2" placeholder="DD" style="width: 35px !important" value='<?php echo substr($row['dob'], -2); ?>' /> / <input type="text" name="month" maxlength="2" placeholder="MM" style="width: 35px !important" value='<?php echo substr($row['dob'], 5, 2); ?>'/> / <input type="text" name="year" maxlength="4" placeholder="YYYY" style="width: 50px !important" value='<?php echo substr($row['dob'], 0, 4); ?>'/><br />
				<input type="text" name="street" value='<?php echo $row['street']; ?>'/><br />
				<input type="text" name="suburb" value='<?php echo $row['suburb']; ?>'/><br />
				<input type="text" name="postcode" value='<?php echo $row['postcode']; ?>'/>
			</div>
		</div>
		<div class="col_4" style="text-align: right;">
			<?php

				if (file_exists("photo/" . $sid . ".jpg")) {
					echo "<img src=\"photo/" . $sid . ".jpg\" style=\"border: 1px solid #e5e5e5; height: 230px\"/><br />";
				} else {
					echo "<img src=\"photo/s12345.jpg\" style=\"border: 1px solid #e5e5e5; height: 230px\"/><br />";
				}

			?>
			<label for="file" class="btn small" style="position: relative; top: 5px; left: 4px; width: 60%; text-align: center;"><i class="icon-upload-alt" id="upload"></i> Upload</label>
			<input type="file" name="file" id="file" style="display:none;"><br>
		</div>
		<div class="col_6">Contacts</div>
		<div class="col_12"  style="line-height: 35px;">

			<div class="col_2">
				Name<br />
				Relationship<br />
				Phone<br />
				Email<br />
			
			</div>
			<div class="col_4">
				<input type="text" name="cname1" value='<?php echo $row['cname1']; ?>'/><br />
				<input type="text" name="crel1" value='<?php echo $row['crel1']; ?>'/><br />
				<input type="text" name="cmobile1" value='<?php echo $row['cmob1']; ?>'/><br />
				<input type="email" name="cemail1" value='<?php echo $row['cemail1']; ?>'/><br />
			</div>
				<div class="col_2">
				Name<br />
				Relationship<br />
				Phone<br />
				Email<br />
			
			</div>
			<div class="col_4">
				<input type="text" name="cname2" value='<?php echo $row['cname2']; ?>'/><br />
				<input type="text" name="crel2" value='<?php echo $row['crel2']; ?>'/><br />
				<input type="text" name="cmobile2" value='<?php echo $row['cmob2']; ?>'/><br />
				<input type="email" name="cemail2" value='<?php echo $row['cemail2']; ?>'/><br />
			</div>
		<button type="submit" class="medium" name="submit" style="margin-top: 15px;" value="Submit"><i class="icon-save"></i> Save</button>  <a href="../student/?S<?php echo $row['sid']; ?>"><button type="button" class="medium" style="margin-top: 15px;">Cancel</button></a>
		</div>
	</form>	