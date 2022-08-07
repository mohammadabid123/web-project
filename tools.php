<?php

	function checkLevel($admin_level, $employee_level, $teacher_level, $student_level, $finance_level, $inventory_level, $library_level, $laboratoar_level) {
		
		$redirect = true;
	
		if($_SESSION["admin_level"] >= $admin_level) {
			$redirect = false;
		}
		
		if($_SESSION["employee_level"] >= $employee_level) {
			$redirect = false;
		}
		
		if($_SESSION["teacher_level"] >= $teacher_level) {
			$redirect = false;
		}
		
		if($_SESSION["student_level"] >= $student_level) {
			$redirect = false;
		}
		
		if($_SESSION["finance_level"] >= $finance_level) {
			$redirect = false;
		}
		
		if($_SESSION["inventory_level"] >= $inventory_level) {
			$redirect = false;
		}
		
		if($_SESSION["library_level"] >= $library_level) {
			$redirect = false;
		}
		
		if($_SESSION["laboratoar_level"] >= $laboratoar_level) {
			$redirect = false;
		}
		
		if($redirect) {
			header("location:employee_home.php?error=userlevel");	
			exit();
		}
	
	}

	
	function showLevel($level) {
		$levelName = "";
		switch($level) {
			case 0:
				$levelName = "None";
			break;
			case 1:
				$levelName = "View";
			break;
			case 2:
				$levelName = "Add";
			break;
			case 4:
				$levelName = "Change";
			break;
			case 8:
				$levelName = "Remove";
			break;
		}
		return $levelName;
	}

	
	
	// 
	
	
	
?>