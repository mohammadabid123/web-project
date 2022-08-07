

			
<?php require_once("connect.php"); ?>
<?php
	
	$class  = mysqli_query($con, "SELECT student_id, firstname, lastname FROM student ORDER BY firstname ASC, firstname ASC"); 
	$row_class = mysqli_fetch_assoc($class);
	
	
	$class2  = mysqli_query($con, "SELECT exam_id,exam_title FROM exam ORDER BY exam_title ASC"); 
	$row_class2 = mysqli_fetch_assoc($class2);
	
	
	if(isset($_POST["written_mark"])) { 
		$exam_id = getValue($_POST["exam_id"]);
		$student_id = getValue($_POST["student_id"]);
		$written_mark = getValue($_POST["written_mark"]);
		$oral_mark = getValue($_POST["oral_mark"]);
		$class_activity = getValue($_POST["class_activity"]);
		$homework = getValue($_POST["homework"]);
		$final_mark	 = getValue($_POST["final_mark"]);
		$remark = getValue($_POST["remark"]);
		
		$result = mysqli_query($con, "INSERT INTO score VALUES ($exam_id,$student_id,$written_mark,$oral_mark,$class_activity,$homework,$final_mark,'$remark')");
		
		if($result) {
			header("location:score_list.php?add=done");
		}
		else {
			header("location:add_socre.php?error=notadd");
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add New Score For Student</h1>
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
						Info Exam:
					</span>
					<select name="exam_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class2["exam_id"]; ?>"><?php echo $row_class2["exam_title"];?></option>
						<?php } while($row_class2 = mysqli_fetch_assoc($class2)); ?>
					</select>
				</div>
				
				
			<div class="input-group">
					<span class="input-group-addon">
						Student Name:
					</span>
					<select name="student_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class["student_id"]; ?>"><?php echo $row_class["firstname"];?></option>
						<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
					</select>
				</div>
				
		
		
			<div class="input-group">
				<span class="input-group-addon">
					written_mark:
				</span>
				<input required type="number" name="written_mark" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					oral_mark:
				</span>
				<input required type="number" name="oral_mark" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					class_activity:
				</span>
				<input required type="number" name="class_activity" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					homework:
				</span>
				<input required type="number" name="homework" class="form-control">
			</div>
			
			
		
			
			<div class="input-group">
				<span class="input-group-addon">
					final_mark:
				</span>
				<input required type="number" name="final_mark" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					remark:
				</span>
				<input required type="text" name="remark" class="form-control">
			</div>
			
				
			<input type="submit" value="Add" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>