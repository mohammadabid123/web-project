<?php require_once("connect.php"); ?>
<?php

	$subject_id = $_GET["subject_id"];
	$result = mysqli_query($con, "DELETE FROM subject WHERE subject_id = $subject_id");
	if($result) {
		header("location:subject_list.php?delete=done");
	}
	else {
		header("location:subject_list.php?error=notdelete");
	}

?>