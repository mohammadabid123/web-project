<?php require_once("connect.php"); ?>
<?php
	$class  = mysqli_query($con, "SELECT subject_id, subject_name  FROM subject ORDER BY subject_name ASC"); 
	$row_class = mysqli_fetch_assoc($class);
	$employee = mysqli_query($con, "SELECT  employee_id , firstname, lastname FROM  employee  where employee_type = 1 ORDER BY firstname ASC, lastname ASC"); 
	$row_employee = mysqli_fetch_assoc($employee);
	$class2  = mysqli_query($con, "SELECT employee_id, firstname  FROM employee  ORDER BY firstname ASC"); 
	$row_class2 = mysqli_fetch_assoc($class2);
	
	
	if(isset($_POST["exam_title"])) { 
		$exam_title = getValue($_POST["exam_title"]);
		$exam_type = getValue($_POST["exam_type"]);
		$exam_date = getValue($_POST["exam_date"]);
		$subject_id = getValue($_POST["subject_id"]);
		$employee_id = getValue($_POST["employee_id"]);
		$employee_id = getValue($_POST["employee_id"]);
		
		$result = mysqli_query($con, "INSERT INTO exam VALUES (NULL, '$exam_title','$exam_type','$exam_date',subject_id,$employee_id,$employee_id)");
		
		if($result) {
			header("location:exam_list.php?add=done");
		}
		else {
			header("location:add_exam.php?error=notadd");
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add Information About Exam </h1>
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
					Exam Title:
				</span>
				<input required type="text" name="exam_title" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Exam Type:
				</span>
				<input required type="text" name="exam_type" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Exam Date:
				</span> 
				<input required  placeholder="YYYY-MM-DD" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="exam_date" class="form-control">
			</div>
			
			<div class="input-group">
					<span class="input-group-addon">
						Subject Name:
					</span>
					<select name="subject_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class["subject_id"]; ?>"><?php echo $row_class["subject_name"];?></option>
						<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
					</select>
				</div>
				
			<div class="input-group">
					<span class="input-group-addon">
						Teacher Name:
					</span>
					<select name="employee_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_employee["employee_id"]; ?>"><?php echo $row_employee["firstname"] . " " . $row_employee["lastname"]; ?></option>
						<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
					</select>
			</div>
			
				<div class="input-group">
					<span class="input-group-addon">
						Supervisor Name:
					</span>
					<select name="employee_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class2["employee_id"]; ?>"><?php echo $row_class2["firstname"];?></option>
						<?php } while($row_class2 = mysqli_fetch_assoc($class2)); ?>
					</select>
				</div>
				

			<input type="submit" value="Add Subject" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>