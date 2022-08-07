<?php

	$con = mysqli_connect("localhost", "root", "","private123");

	
	if(!isset($_SESSION)) {
		session_start();
	}
	function getValue($value) {
		global $con;
		return mysqli_real_escape_string($con, $value);}
		require_once("jdf.php");
?>

