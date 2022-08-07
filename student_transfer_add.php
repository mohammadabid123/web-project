<?php require_once("connect.php"); ?>
<?php

	$student= mysqli_query($con, "SELECT student_id, firstname, lastname FROM student ORDER BY firstname ASC, lastname ASC"); 
	$row_student = mysqli_fetch_assoc($student);
	
	$class = mysqli_query($con, "SELECT class_id, class_name, section_name FROM classes ORDER BY class_name ASC, section_name ASC"); 
	$row_class = mysqli_fetch_assoc($class);
	if(isset($_POST["from_school"])) {
		$student_id= getValue($_POST["student_id"]);
		$transfer_date= getValue($_POST["transfer_date"]);
		$from_school= getValue($_POST["from_school"]);
		$to_school = getValue($_POST["to_school"]);
		$class_id= getValue($_POST["class_id"]);
		$grade = getValue($_POST["grade"]);
		$remark = getValue($_POST["remark"]);
		$result = mysqli_query($con, "INSERT INTO student_transfer VALUES (NULL, $student_id, '$transfer_date', '$from_school','$to_school',$class_id,$grade,'$remark')");
		
		if($result) {
			
			header("location:student_transfer_list.php?add=INSERTED");
		}
		else {
			header("location:stuent_transfer_add.php?error=" . mysqli_error($con));
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-success">
	
	<div class="panel-heading">
		<h1 align = "center">Add New Student Transfer Informatioin</h1>
	</div>
	
	<div class="panel-body">
		
		<form class="form" method="post" enctype="multipart/form-data">
			
			<?php if(isset($_GET["filetype"])) { ?>
				<div class="alert alert-warning">
					Incorrect Your Picture Type! <br> (allowed type is: jpeg, png, gif)<br>
					Please try Agin!
				</div>
			<?php } ?>
			
			<?php if(isset($_GET["filesize"])) { ?>
				<div class="alert alert-danger">
					Incorrect File Size! <br> (allowed size is less than 4 MB)
				</div>
			<?php } ?>
			
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Sorry! Could not add new employee! Please try again!
					<br>
					<?php echo $_GET["error"]; ?>
				</div>
			<?php } ?>
			
			<div class="input-group">
					<span class="input-group-addon">
						Student Name:
					</span>
				
					<select name="student_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_student["student_id"]; ?>"><?php echo $row_student["firstname"] . " " . $row_student["lastname"]; ?></option>
						<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
					</select>
					
			</div>
					
			<div class="input-group">
				<span class="input-group-addon">
				Transfer_Date:
				</span> 
				<input required  placeholder="YYYY-MM-DD" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="transfer_date" class="form-control">
			</div>
			
			
			
			
			<div class="input-group">
				<span class="input-group-addon">
					From_School	:  
				</span>
				<input required type="text" name="from_school" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					To_School	:  
				</span>
				<input required type="text" name="to_school" class="form-control">
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
			<div class="input-group">
				<span class="input-group-addon">
				Grade:
				</span>
				<input required type="number" name="grade" class="form-control">
			</div>
			<div class="input-group">
				<span class="input-group-addon">
					Remark:
				</span>
				<input required type="text" name="remark" class="form-control">
			</div>
			<input type="submit" value="Add Student Transfort info" class="btn btn-info btn-block btn-lg">
			
		</form>
	
	</div>
	
</div>

<?php require_once("footer.php"); ?>