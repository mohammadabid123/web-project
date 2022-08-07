<?php require_once("connect.php"); ?>
<?php

	$employee_id = getValue($_GET["employee_id"]);
	$year = getValue($_GET["absent_year"]);
	$month = getValue($_GET["absent_month"]);
	$day = getValue($_GET["absent_day"]);
	
	$attendance = mysqli_query($con, "SELECT * FROM emp_attendance WHERE employee_id = $employee_id AND absent_year = $year AND absent_month = $month AND absent_day = $day");
	$row_attendance = mysqli_fetch_assoc($attendance);

	if(isset($_POST["absent_date"])) {
		
		$absent_date = getValue($_POST["absent_date"]);
		$absent_hour = getValue($_POST["absent_hour"]);
		$absent_type = getValue($_POST["absent_type"]);

		$date = explode("-", $absent_date);
		$absent_year = $date[0];
		$absent_month = $date[1];
		$absent_day = $date[2];
		
		$result = mysqli_query($con, "UPDATE emp_attendance SET absent_year=$absent_year, absent_month=$absent_month, absent_day=$absent_day, absent_hour=$absent_hour, absent_type='$absent_type' WHERE employee_id = $employee_id AND absent_year=$year AND absent_month=$month AND absent_day = $day");
		
		if($result) {
			header("location:employee_attendance.php?edit=done");
		}
		else {
			header("location:employee_attendance_edit.php?error=notedit&employee_id=$employee_id&absent_year=$year&absent_month=$month&absent_day=$day");
		}		
		
	}
	
?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1>Edit Employee Absent</h1>
		</div>
		
		<div class="panel-body">
		
			<form method="post">
				
				
				<div class="input-group">
					<span class="input-group-addon">
						Absent Date:
					</span>
					<input value="<?php echo $row_attendance["absent_year"] . "-" . $row_attendance["absent_month"] . "-" . $row_attendance["absent_day"]; ?>" type="text" name="absent_date" class="form-control">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Hour(s):
					</span>
					<input value="<?php echo $row_attendance["absent_hour"]; ?>" min="1" max="8" autocomplete="off" type="number" name="absent_hour" class="form-control">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Absent Type:
					</span>
					<select name="absent_type" class="form-control">
						<option value="0" <?php if($row_attendance["absent_type"] == 0) echo "selected"; ?>>Informed</option>
						<option value="1"  <?php if($row_attendance["absent_type"] == 1) echo "selected"; ?>>Un Informed</option>
					</select>
				</div>
				
				<input type="submit" value="Save Changes" class="btn btn-primary">
				
			</form>
		
		</div>
	</div>

<?php require_once("footer.php"); ?>