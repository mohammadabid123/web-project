<?php require_once("connect.php"); ?>
<?php

	$student = mysqli_query($con, "SELECT * FROM student WHERE student_id = " . getValue($_GET["student_id"]));
	$row_student = mysqli_fetch_assoc($student);

	if(isset($_POST["firstname"])) { 
		$firstname = getValue($_POST["firstname"]);
		$fathername = getValue($_POST["fathername"]);
	
		
		$result = mysqli_query($con, "UPDATE student SET  firstname='$firstname', fathername='$fathername' WHERE  student_id = " . getValue($_GET["student_id"]));
		
		if($result) {
			header("location:student_list.php?edit=done");
		}
		else {
			header("location:student_edit.php?error=notedit&student_id=" . getValue($_GET["student_id"]));
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1>Edit Student</h1>
		</div>
		
		<div class="panel-body">
		
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Could not save changes!
				</div>
			<?php } ?>
		
			<form class="form" method="post">
		
			<div class="input-group">
				<span class="input-group-addon">
					Student Name:
				</span>
				<input value="<?php echo $row_student["firstname"]; ?>" type="text" name="firstname" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Father Name:
				</span>
				<input value="<?php echo $row_student["fathername"]; ?>" type="text" name="fathername" class="form-control">
			</div>
			<input type="submit" value="Save Changes" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>