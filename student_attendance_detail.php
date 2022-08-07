<?php require_once("connect.php"); ?>
<?php
	$student_id = getValue($_GET["student_id"]);
	$year = getValue($_GET["year"]);
	$month = getValue($_GET["month"]);
	
	$attendance = mysqli_query($con, "SELECT * FROM student_attendance WHERE student_id = $student_id AND absent_year = $year AND absent_month = $month ORDER BY absent_day ASC");
	$row_attendance = mysqli_fetch_assoc($attendance);
	
	$employee = mysqli_query($con, "SELECT firstname, fathername FROM student WHERE student_id = $student_id");
	$row_employee = mysqli_fetch_assoc($employee);
	
?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1>Attendance Detail of 
				<?php echo $row_employee["firstname"]; ?> 
				<?php echo $row_employee["fathername"]; ?>
			</h1>
		</div>
		
		<div class="panel-body">
		
			<table class="table table-striped">
				<tr>
					<th>Absent Date</th>
					<th>Absent Hour</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				
				<?php do { ?>
					<tr>
						<td><?php echo $row_attendance["absent_year"]; ?>-<?php echo $row_attendance["absent_month"]; ?>-<?php echo $row_attendance["absent_day"]; ?></td>
						<td><?php echo $row_attendance["absent_hour"]; ?></td>
						<td>
							<a href="student_attendance_edit.php?student_id=<?php echo $student_id; ?>&absent_year=<?php echo $row_attendance["absent_year"]; ?>&absent_month=<?php echo $row_attendance["absent_month"]; ?>&absent_day=<?php echo $row_attendance["absent_day"]; ?>">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
						</td>
						<td>
							<a class="delete" href="student_attendance_delete.php?student_id=<?php echo $student_id; ?>&absent_year=<?php echo $row_attendance["absent_year"]; ?>&absent_month=<?php echo $row_attendance["absent_month"]; ?>&absent_day=<?php echo $row_attendance["absent_day"]; ?>">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
				<?php } while($row_attendance = mysqli_fetch_assoc($attendance)); ?>
				
			</table>
		
		
		</div>
	</div>

<?php require_once("footer.php"); ?>