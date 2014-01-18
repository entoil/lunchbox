<?php include("header.php"); ?>
	 
<div class="col_12">

	<ul class="tabs left">
	<li><a href="#student">Student</a></li>
	</ul>

	<div id="student" class="tab-content">

		<div class="col_8" style="line-height: 35px;">

			<div class="col_3">
				Number<br />
				First Name<br />
				Middle Name<br />
				Last Name<br />
				English Name<br />
				Date of Birth<br />
				Address<br /><br /><br />

				
			
			</div>
			<div class="col_5">
				S98765<br />
				<input type="text" name="fname" value=""/><br />
				<input type="text" name="mname" value=""/><br />
				<input type="text" name="lname" value=""/><br />
				<input type="text" name="ename" value=""/><br />
				<input type="text" name="day" placeholder="DD" style="width: 35px !important" value="" /> / <input type="text" name="month" placeholder="MM" style="width: 35px !important" value=""/> / <input type="text" name="year" placeholder="YYYY" style="width: 50px !important" value=""/><br />
				<input type="text" name="street" value=""/><br />
				<input type="text" name="suburb" value=""/><br />
				<input type="text" name="statecode" value=""/>
			</div>
		</div>
		<div class="col_4" style="text-align: right;">
			<ul class="button-bar" style="position: relative; top: -65px; left: 30px">
			<li><a href=""><i class="icon-save"></i> Save</a></li>
			<li><a href=""><i class="icon-remove"></i> Cancel</a></li>
		</ul>
			<img src="photo/s12345.jpg" width="60%" height="60%" class="sphoto"/><br />
			<button class="small"  style="position: relative; top: -25px; width: 60%;"><i class="icon-upload-alt"></i> Upload</button>
		</div>
		<div class="col_6">Contacts</div>
		<div class="col_12"  style="line-height: 35px;">

			<div class="col_2">
				Name<br />
				Relationship<br />
				Mobile<br />
				Email<br />
			
			</div>
			<div class="col_4">
				<input type="text" name="cname1" value=""/><br />
				<input type="text" name="crel1" value=""/><br />
				<input type="text" name="cmobile1" value=""/><br />
				<input type="text" name="cemail1" value=""/><br />
			</div>
				<div class="col_2">
				Name<br />
				Relationship<br />
				Mobile<br />
				Email<br />
			
			</div>
			<div class="col_4">
				<input type="text" name="cname2" value=""/><br />
				<input type="text" name="crel2" value=""/><br />
				<input type="text" name="cmobile2" value=""/><br />
				<input type="text" name="cemail2" value=""/><br />
			</div>
		</div>
		</span>
		
	</div>
</div>

<?php include("footer.php"); ?>