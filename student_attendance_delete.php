<?php require_once("connect.php"); ?>
<?php

	$student_id = getValue($_GET["student_id"]);
	$year = getValue($_GET["absent_year"]);
	$month = getValue($_GET["absent_month"]);
	$day = getValue($_GET["absent_day"]);
		
	$result = mysqli_query($con, "DELETE FROM student_attendance WHERE student_id = $student_id AND absent_year=$year AND absent_month = $month AND absent_day = $day");
	if($result) {
		header("location:student_attenadance.php?delete=done");
	}
	else {
		header("location:student_attenadance.php?error=notdelete");
	}

?>