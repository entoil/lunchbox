<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); echo "?E" . $eid;?>"> 
		<div class="col_8" style="line-height: 35px;">
		<?php 
			if ($nerror > 0) { 
				echo "<div class=\"notice error\" ><i class=\"icon-remove-sign icon-large\" ></i>Please correct the following error(s):";
				echo $error_start;
				echo $error_end;
				echo $error_invalid;
				echo $error_owe;
				echo "<a href=\"#close\" class=\"icon-remove\"></a></div>";
			} else if ($nerror == 0) {
				echo "<div class=\"notice success\"><i class=\"icon-ok icon-large\"></i> Student successfully modified.
<a href=\"#close\" class=\"icon-remove\"></a></div>";
			}
		?>
		

			<div class="col_3">
				Enrolment<br />
				Student<br />
				Name<br />
				Class<br />
				Teacher<br />
				Start<br />
				End<br />
				Owing<br /><br />

				
			
			</div>
			<div class="col_5">
				E<?php echo $row['eid']; ?><br />
				<a href="../student/?S<?php echo $row['sid']; ?>">S<?php echo $row['sid']; ?></a><br />
				<?php echo $row['fname']; ?> 
				<?php echo $row['mname']; ?> 
				<?php echo $row['lname']; ?><br />
				<?php echo $row['name']; ?><br />
				<?php echo $row['teacher']; ?><br />
				<input type="text" name="sday" maxlength="2" placeholder="DD" style="width: 35px !important" value='<?php echo substr($row['start'], -2); ?>' /> / <input type="text" name="smonth" maxlength="2" placeholder="MM" style="width: 35px !important" value='<?php echo substr($row['start'], 5, 2); ?>'/> / <input type="text" name="syear" maxlength="4" placeholder="YYYY" style="width: 50px !important" value='<?php echo substr($row['start'], 0, 4); ?>'/><br />
				<input type="text" name="eday" maxlength="2" placeholder="DD" style="width: 35px !important" value='<?php echo substr($row['end'], -2); ?>' /> / <input type="text" name="emonth" maxlength="2" placeholder="MM" style="width: 35px !important" value='<?php echo substr($row['end'], 5, 2); ?>'/> / <input type="text" name="eyear" maxlength="4" placeholder="YYYY" style="width: 50px !important" value='<?php echo substr($row['end'], 0, 4); ?>'/><br />
				$ <input type="text" name="owe" style="width: 70px !important" value='<?php echo $row['owe']; ?>'/><br />
			</div>
		<div class="col_12"  style="line-height: 35px;">
		<button type="submit" class="medium" style="margin-top: 15px;"><i class="icon-save"></i> Save</button> <a href="../enrolment/?E<?php echo $row['eid']; ?>"><button type="button" class="medium" style="margin-top: 15px;">Cancel</button></a>
		</div>


	</form>	