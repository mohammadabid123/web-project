<?php require_once("connect.php"); ?>
<?php
	$subject_id = $_GET["subject_id"];
	$employee = mysqli_query($con, "SELECT * FROM subject WHERE subject_id = $subject_id");
	$row_employee = mysqli_fetch_assoc($employee);
	if(isset($_POST["subject_name"])) {
		$subject_name = getValue($_POST["subject_name"]);


		
		$result = mysqli_query($con, "UPDATE subject SET subject_name='$subject_name' WHERE subject_id = $subject_id");
		if($result) {
			header("location:subject_list.php?edit=done");
		}
		else {
			header("location:subject_edit.php?error=" . mysqli_error($con) . "&subject_id=$subject_id");
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
				Subject Name:
				</span>
				<input value="<?php echo $row_employee["subject_name"]; ?>" type="text" name="subject_name" class="form-control">
			</div>
			

			

			
			<input type="submit" value="Save Changes" class="btn btn-info btn-block btn-lg">

			
		</form>
	
	</div>
	
</div>

<?php require_once("footer.php"); ?>