<?php require_once("connect.php"); ?>
<?php

	$employee_id = getValue($_GET["employee_id"]);
	$year = getValue($_GET["absent_year"]);
	$month = getValue($_GET["absent_month"]);
	$day = getValue($_GET["absent_day"]);
		
	$result = mysqli_query($con, "DELETE FROM emp_attendance WHERE employee_id = $employee_id AND absent_year=$year AND absent_month = $month AND absent_day = $day");
	if($result) {
		header("location:employee_attendance.php?delete=done");
	}
	else {
		header("location:employee_attendance.php?error=notdelete");
	}

?>