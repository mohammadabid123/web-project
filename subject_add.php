<?php require_once("connect.php"); ?>
<?php
	
	$class  = mysqli_query($con, "SELECT class_id, class_name, section_name FROM classes ORDER BY class_name ASC, section_name ASC"); 
	$row_class = mysqli_fetch_assoc($class);
	if(isset($_POST["subject_name"])) { 
		$subject_name = getValue($_POST["subject_name"]);
		$class_id = getValue($_POST["class_id"]);
		
		$result = mysqli_query($con, "INSERT INTO subject VALUES (NULL, '$subject_name','$class_id')");
		
		if($result) {
			header("location:subject_list.php?add=done");
		}
		else {
			header("location:subject_add.php?error=notadd");
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add New Subject</h1>
		</div>
		
		<div class="panel-body">
		
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Could not add new Subject!
				</div>
			<?php } ?>
		
			<form method="post">
		
			<div class="input-group">
				<span class="input-group-addon">
					Subject Name:
				</span>
				<input required type="text" name="subject_name" class="form-control">
			</div>

			
			<div class="input-group">
					<span class="input-group-addon">
						Class:
					</span>
					<select name="class_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class["class_id"]; ?>"><?php echo $row_class["class_name"];?></option>
						<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
					</select>
				</div>
			<input type="submit" value="Add Subject" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>