<?php
		$con = mysqli_connect("localhost","root","","private1");
		

		$result = mysqli_query($con, "INSERT INTO classes VALUES (NULL, 'A10', 'A', 123)");
		if($result){
			print "insertde";
		}
		else{
			print "not insertde!";
		}
		
		



?>