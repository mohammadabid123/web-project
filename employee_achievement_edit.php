<?php require_once("connect.php"); ?>
<?php
	$achievement_id = $_GET["achievement_id"];
	$employee = mysqli_query($con, "SELECT * FROM employee_achievement WHERE achievement_id = $achievement_id");
	$row_employee = mysqli_fetch_assoc($employee);
	if(isset($_POST["ach_text"])) {
		$ach_text = getValue($_POST["ach_text"]);


		
		$result = mysqli_query($con, "UPDATE employee_achievement SET ach_text='$ach_text' WHERE achievement_id = $achievement_id");
		if($result) {
			header("location:employee_achievement_list.php?edit=done");
		}
		else {
			header("location:employee_achievement_edit.php?error=" . mysqli_error($con) . "&achievement_id=$achievement_id");
		}
	}
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">
	
	<div class="panel-heading">
		<h1 align = "center">Edit Subject Information</h1>
	</div>
	
	<div class="panel-body">
		
		<form class="form" method="post" enctype="multipart/form-data">
			
			<?php if(isset($_GET["filetype"])) { ?>
				<div class="alert alert-danger">
					Incorrect File Type! <br> (allowed type is: jpeg, png, gif)
				</div>
			<?php } ?>
			
			<?php if(isset($_GET["filesize"])) { ?>
				<div class="alert alert-danger">
					Incorrect File Size! <br> (allowed size is less than 4 MB)
				</div>
			<?php } ?>
			
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Sorry! Could not edit employee! Please try again!
					<br>
					<?php echo $_GET["error"]; ?>
				</div>
			<?php } ?>
			
			<div class="input-group">
				<span class="input-group-addon">
				ach_text:
				</span>
				<input value="<?php echo $row_employee["ach_text"]; ?>" type="text" name="ach_text" class="form-control">
			</div>
			

			

			
			<input type="submit" value="Save Changes" class="btn btn-info btn-block btn-lg">

			
		</form>
	
	</div>
	
</div>

<?php require_once("footer.php"); ?>