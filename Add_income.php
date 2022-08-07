<?php require_once("connect.php"); ?>
<?php
	
	$type  = mysqli_query($con, "SELECT type_id, type_name FROM income_type ORDER BY type_name ASC"); 
	$row_type = mysqli_fetch_assoc($type);
	
	$student  = mysqli_query($con, "SELECT student_id, firstname ,lastname FROM student ORDER BY firstname ASC"); 
	$row_student = mysqli_fetch_assoc($student);
	
	$class  = mysqli_query($con, "SELECT class_id, class_name, section_name FROM classes ORDER BY class_name ASC, section_name ASC"); 
	$row_class = mysqli_fetch_assoc($class);
	
	
	$class1  = mysqli_query($con, "SELECT student_id, firstname, lastname FROM  student ORDER BY firstname ASC, lastname ASC"); 
	$row_class1 = mysqli_fetch_assoc($class1);
	
	if(isset($_POST["income_amount"])) { 
		$income_id = getValue($_POST["income_id"]);
		$income_date = getValue($_POST["income_date"]);
		$type_id = getValue($_POST["type_id"]);
		$income_amount = getValue($_POST["income_amount"]);
		$student_id= getValue($_POST["student_id"]);
		$class_id= getValue($_POST["class_id"]);
		
		$result = mysqli_query($con, "INSERT INTO income VALUES (NULL, '$income_date',$type_id,$income_amount,$student_id,$class_id)");
		if($result) {
			header("location:incometype_list.php?add=done");
		}
		else {
			header("location:Add_income.php?error=notadd");
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add New Income</h1>
		</div>
		
		<div class="panel-body">
		
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Could not add New Income!
				</div>
			<?php } ?>
		
	<form method="post">
		<div class="input-group">
				<span class="input-group-addon">
					Income Date:
				</span> 
				<input required  placeholder="YYYY-MM-DD" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="income_date" class="form-control">
			</div>
	
			<div class="input-group">
					<span class="input-group-addon">
						Type Name:
					</span>
					<select name="type_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_type["type_id"]; ?>"><?php echo $row_type["type_name"];?></option>
						<?php } while($row_type = mysqli_fetch_assoc($type)); ?>
					</select>
			</div>
			

				
				
			
			
			
			<div class="input-group">
				<span class="input-group-addon">
					Income Amount:
				</span> 
				<input required type="number" name="income_amount" class="form-control">
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
						Student Name:
					</span>
					<select name="student_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class1["student_id"]; ?>"><?php echo $row_class1["firstname"];?></option>
						<?php } while($row_class1 = mysqli_fetch_assoc($class1)); ?>
					</select>
			</div>
			
			<input type="submit" value="Add Income" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>

			
