<?php require_once("connect.php"); ?>
<?php
	
	$student = mysqli_query($con, "SELECT * FROM student_achievement WHERE achievement_id = " . getValue($_GET["achievement_id"]));
	$row_student = mysqli_fetch_assoc($student);

	if(isset($_POST["ach_title"])) { 
		$ach_title = getValue($_POST["ach_title"]);
		$ach_text = getValue($_POST["ach_text"]);
	
		
		$result = mysqli_query($con, "UPDATE student_achievement SET  ach_title='$ach_title', ach_text='$ach_text' WHERE  achievement_id = " . getValue($_GET["achievement_id"]));
		
		if($result) {
			header("location:student_achievement_list.php?edit=done");
		}
		else {
			header("location:student_achievement_edit.php?error=notedit&achievement_id=" . getValue($_GET["achievement_id"]));
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1>Edit Achievement Of Student</h1>
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
					ach_title:
				</span>
				<input value="<?php echo $row_student["ach_title"]; ?>" type="text" name="ach_title" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					ach_text:
				</span>
				<input value="<?php echo $row_student["ach_text"]; ?>" type="text" name="ach_text" class="form-control">
			</div>
			<input type="submit" value="Save Changes" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>