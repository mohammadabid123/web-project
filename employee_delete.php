<?php

	require_once("connect.php");

	
	$employee_id = getValue($_GET["employee_id"]);

	$employee_photo = mysqli_query($con, "SELECT photo FROM employee WHERE employee_id = $employee_id");
	$row_employee_photo = mysqli_fetch_assoc($employee_photo);
	
	$path = $row_employee_photo["photo"];
	
	if($path != "images/employee/user_m.png" && $path != "images/employee/user_f.png") {
		unlink($path);
	}
	
	$result = mysqli_query($con, "DELETE FROM employee WHERE employee_id = $employee_id");
	
	if($result) {
		header("location:employee_list.php?delete=done");
	}
	else {
		header("location:employee_list.php?delete=failed");
	}

?>



