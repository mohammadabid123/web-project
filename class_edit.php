<?php require_once("connect.php"); ?>
<?php

	$class = mysqli_query($con, "SELECT * FROM classes WHERE class_id = " . getValue($_GET["class_id"]));
	$row_class = mysqli_fetch_assoc($class);

	if(isset($_POST["class_name"])) { 
		$class_name = getValue($_POST["class_name"]);
		$section_name = getValue($_POST["section_name"]);
		$fees = getValue($_POST["fees"]);
		
		$result = mysqli_query($con, "UPDATE classes SET class_name='$class_name', section_name='$section_name', fees=$fees WHERE class_id = " . getValue($_GET["class_id"]));
		
		if($result) {
			header("location:class_list.php?edit=done");
		}
		else {
			header("location:class_edit.php?error=notedit&class_id=" . getValue($_GET["class_id"]));
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1>Edit Class</h1>
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
					Class Name:
				</span>
				<input value="<?php echo $row_class["class_name"]; ?>" type="text" name="class_name" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Section Name:
				</span>
				<input value="<?php echo $row_class["section_name"]; ?>" type="text" name="section_name" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Class Fees:
				</span>
				<input value="<?php echo $row_class["fees"]; ?>" type="text" name="fees" class="form-control">
			</div>
			
			<input type="submit" value="Save Changes" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>