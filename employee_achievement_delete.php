<?php require_once("connect.php"); ?>
<?php

	$achievement_id = $_GET["achievement_id"];
	$result = mysqli_query($con, "DELETE FROM employee_achievement WHERE achievement_id = $achievement_id");
	if($result) {
		header("location:employee_achievement_list.php?delete=done");
	}
	else {
		header("location:employee_achievement_list.php?error=notdelete");
	}

?>
