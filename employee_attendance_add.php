 <?php require_once("connect.php"); ?>
<?php
	$employee = mysqli_query($con, "SELECT employee_id, firstname, lastname FROM employee ORDER BY firstname ASC, lastname ASC"); 
	$row_employee = mysqli_fetch_assoc($employee);
	
	if(isset($_POST["absent_date"])) {
		$employee_id = getValue($_POST["employee_id"]);
		$absent_date = getValue($_POST["absent_date"]);
		$absent_hour = getValue($_POST["absent_hour"]);
		$absent_type = getValue($_POST["absent_type"]);
		$date = explode("-", $absent_date);
		$absent_year = $date[0];
		$absent_month = $date[1];
		$absent_day = $date[2];
		$result = mysqli_query($con, "INSERT INTO emp_attendance VALUES ($employee_id, $absent_year, $absent_month, $absent_day, $absent_hour, '$absent_type')");
		if($result) {
			header("location:employee_attendance.php?add=done");
		}
		else {
			header("location:employee_attendance_add.php?error=notadd");
		}}
?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add Employee Absent</h1>
		</div>
				<div class="panel-body">
		
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Could not add new Employee Attendance!
				</div>
			<?php } ?>
		
			<form method="post">
				<div class="input-group">
					<span class="input-group-addon">
						Employee Name:
					</span>
					<select name="employee_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_employee["employee_id"]; ?>"><?php echo $row_employee["firstname"] . " " . $row_employee["lastname"]; ?></option>
						<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
					</select>
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Absent Date:
					</span>
					<input value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="absent_date" class="form-control">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Hour(s):
					</span>
					<input min="1" max="8" autocomplete="off" type="number" name="absent_hour" class="form-control">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Absent Type:
					</span>
					<select name="absent_type" class="form-control">
						<option value="0"> Absent</option>
						<option value="1">Leave  </option> 
					</select>
				</div>
																				
				<input type="submit" value="Add Absent" class="btn btn-info btn-block btn-lg">
				
			</form>
		
		</div>
	</div>

<?php require_once("footer.php"); ?>