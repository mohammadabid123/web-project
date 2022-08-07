<?php require_once("connect.php"); ?>
<?php
	
	$class  = mysqli_query($con, "SELECT student_id, firstname FROM student ORDER BY firstname ASC"); 
	$row_class = mysqli_fetch_assoc($class);
	if(isset($_POST["ach_title"])) { 
		$student_id = getValue($_POST["student_id"]);
		$ach_title = getValue($_POST["ach_title"]);
		$ach_text = getValue($_POST["ach_text"]);
		$ach_date = getValue($_POST["ach_date"]);
		$ach_type = getValue($_POST["ach_type"]);
		
		$result = mysqli_query($con, "INSERT INTO student_achievement VALUES (NULL,$student_id,'$ach_title','$ach_text','$ach_date','$ach_type')");
		
		if($result) {
			header("location:student_achievement_list.php?add=done");
		}
		else {
			header("location:student_achievement_add.php?error=notadd");
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
						Employee:
					</span>
					<select name="student_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class["student_id"]; ?>"><?php echo $row_class["firstname"];?></option>
						<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
					</select>
				</div>
		
			<div class="input-group">
				<span class="input-group-addon">
					ach_title:
				</span>
				<input required type="text" name="ach_title" class="form-control">
			</div>
			<div class="input-group">
				<span class="input-group-addon">
					ach_text:
				</span>
				<input required type="text" name="ach_text" class="form-control">
			</div>
		 <div class="input-group">
					<span class="input-group-addon">
						ach_date			:
					</span>
					<input value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="ach_date" class="form-control">
		</div>
		
		<div class="input-group">
				<span class="input-group-addon">
					
			ach_type:
				</span>
				<input required type="text" name="ach_type" class="form-control">
			</div>
			
			
			<input type="submit" value="Add Subject" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>