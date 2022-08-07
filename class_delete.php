<?php require_once("connect.php"); ?>
<?php

	$class_id = $_GET["class_id"];
	$result = mysqli_query($con, "DELETE FROM classes WHERE class_id = $class_id");
	if($result) {
		header("location:class_list.php?delete=done");
	}
	else {
		header("location:class_list.php?error=notdelete");
	}

?>