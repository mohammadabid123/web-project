<?php require_once("connect.php"); ?>
<?php

	$class  = mysqli_query($con, "SELECT student_id, firstname, lastname FROM student ORDER BY firstname ASC, lastname ASC"); 
	$row_class = mysqli_fetch_assoc($class);

if(isset($_POST["relative_name"])) { 
		$student_id = getValue($_POST["student_id"]);
		$relative_name = getValue($_POST["relative_name"]);
		$relative_relation = getValue($_POST["relative_relation"]);
		$relative_job = getValue($_POST["relative_job"]);
		$relative_phone = getValue($_POST["relative_phone"]);
		
		$result = mysqli_query($con, "INSERT INTO student_relative VALUES (NULL,$student_id,'$relative_name','$relative_relation','$relative_job','$relative_phone')");
		
		if($result) {
			header("location:student_relative_list.php?add=done");
		}
		else {
			header("location:student_add_relative.php?error=notadd");
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add New Achievement For Student</h1>
		</div>
		
		<div class="panel-body">
		
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Could not add new Achievement!
				</div>
			<?php } ?>
		
			<form method="post">
						<div class="input-group">
					<span class="input-group-addon">
						Student information:
					</span>
					<select name="student_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class["student_id"]; ?>"><?php echo $row_class["firstname"];?></option>
						<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
					</select>
				</div>
		
			<div class="input-group">
				<span class="input-group-addon">
					relative_name:
				</span>
				<input required type="text" name="relative_name" class="form-control">
			</div>
		
		
		
			<div class="input-group">
				<span class="input-group-addon">
					relative_relation:
				</span>
				<input required type="text" name="relative_relation" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					relative_job:
				</span>
				<input required type="text" name="relative_job" class="form-control">
			</div>

			<div class="input-group">
				<span class="input-group-addon">		
			relative_phone:
				</span>
				<input required type="text" name="relative_phone" class="form-control">
			</div>
			
			
			<input type="submit" value="Add Subject" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>