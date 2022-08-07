<?php require_once("connect.php"); ?>
<?php
	$employee_id = getValue($_GET["employee_id"]);
	$year = getValue($_GET["year"]);
	$month = getValue($_GET["month"]);
	
	$attendance = mysqli_query($con, "SELECT * FROM emp_attendance WHERE employee_id = $employee_id AND absent_year = $year AND absent_month = $month ORDER BY absent_day ASC");
	$row_attendance = mysqli_fetch_assoc($attendance);
	
	$employee = mysqli_query($con, "SELECT firstname, lastname, photo FROM employee WHERE employee_id = $employee_id");
	$row_employee = mysqli_fetch_assoc($employee);
	
?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<img src="<?php echo $row_employee["photo"]; ?>" width="30" class="pull-right img-circle">
			<h1>Attendance Detail of 
				<?php echo $row_employee["firstname"]; ?> 
				<?php echo $row_employee["lastname"]; ?>
			</h1>
		</div>
		
		<div class="panel-body">
		
			<table class="table table-striped">
				<tr>
					<th>Absent Date</th>
					<th>Absent Hour</th>
					<th>Absent Type</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				
				<?php do { ?>
					<tr>
						<td><?php echo $row_attendance["absent_year"]; ?>-<?php echo $row_attendance["absent_month"]; ?>-<?php echo $row_attendance["absent_day"]; ?></td>
						<td><?php echo $row_attendance["absent_hour"]; ?></td>
						<td><?php echo $row_attendance["absent_type"] == 0 ? "Informed" : "Uninformed"; ?></td>
						<td>
							<a href="employee_attendance_edit.php?employee_id=<?php echo $employee_id; ?>&absent_year=<?php echo $row_attendance["absent_year"]; ?>&absent_month=<?php echo $row_attendance["absent_month"]; ?>&absent_day=<?php echo $row_attendance["absent_day"]; ?>">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
						</td>
						<td>
							<a class="delete" href="employee_attendance_delete.php?employee_id=<?php echo $employee_id; ?>&absent_year=<?php echo $row_attendance["absent_year"]; ?>&absent_month=<?php echo $row_attendance["absent_month"]; ?>&absent_day=<?php echo $row_attendance["absent_day"]; ?>">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
				<?php } while($row_attendance = mysqli_fetch_assoc($attendance)); ?>
				
			</table>
		
		
		</div>
	</div>

<?php require_once("footer.php"); ?>