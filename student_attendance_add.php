 <?php require_once("connect.php"); ?>
<?php
	$employee = mysqli_query($con, "SELECT student_id, firstname, fathername FROM student ORDER BY firstname  ASC, fathername ASC"); 
	$row_employee = mysqli_fetch_assoc($employee);
	
	if(isset($_POST["absent_date"])) {
		$student_id = getValue($_POST["student_id"]);
		$absent_date = getValue($_POST["absent_date"]);
		$absent_hour = getValue($_POST["absent_hour"]);
		$date = explode("-", $absent_date);
		$absent_year = $date[0];
		$absent_month = $date[1];
		$absent_day = $date[2];
		$result = mysqli_query($con, "INSERT INTO student_attendance VALUES ($student_id, $absent_year, $absent_month, $absent_day, $absent_hour)");
		if($result) {
			header("location:student_attenadance.php?add=done");
		}
		else {
			header("location:student_attendance_add.php?error=notadd");
		}}
?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add Student Absent</h1>
		</div>
				<div class="panel-body">
		
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Could not add new Student Attendance!
				</div>
			<?php } ?>
		
			<form method="post">
				<div class="input-group">
					<span class="input-group-addon">
						Student Name:
					</span>
					<select name="student_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_employee["student_id"]; ?>"><?php echo $row_employee["firstname"] . " " . $row_employee["fathername"]; ?></option>
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