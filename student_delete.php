<?php require_once("connect.php"); ?>
<?php

	$student_id = $_GET["student_id"];
	$result = mysqli_query($con, "DELETE FROM student WHERE student_id = $student_id");
	if($result) {
		header("location:student_list.php?delete=done");
	}
	else {
		header("location:student_list.php?error=notdelete");
	}

?>