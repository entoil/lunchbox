<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); echo "?C" . $cid;?>"> 
		<div class="col_8" style="line-height: 35px;">
		<?php
			if ($nerror > 0) { 
				echo "<div class=\"notice error\" ><i class=\"icon-remove-sign icon-large\" ></i>Please correct the following error(s):";
				echo $error_teacher;
				echo $error_name;
				echo "<a href=\"#close\" class=\"icon-remove\"></a></div>";
			}
		?>
		

			<div class="col_2">
				Class<br />
				Teacher<br /><br />

				
			
			</div>
			<div class="col_5">
				<input type="text" name="name" value='<?php echo $row['name']; ?>'/><br />
				<input type="text" name="teacher" value='<?php echo $row['teacher']; ?>'/><br />

			</div>
		<div class="col_12"  style="line-height: 35px;">
		<button type="submit" class="medium" style="margin-top: 15px;"><i class="icon-save"></i> Save</button> <a href="../class/?C<?php echo $row['cid']; ?>"><button type="button" class="medium" style="margin-top: 15px;">Cancel</button></a>
		</div>


	</form>	