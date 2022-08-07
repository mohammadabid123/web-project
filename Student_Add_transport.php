<?php require_once("connect.php"); ?>
<?php


	$student= mysqli_query($con, "SELECT student_id, firstname, lastname FROM student ORDER BY firstname ASC, lastname ASC"); 
	$row_student = mysqli_fetch_assoc($student);
	
	$class = mysqli_query($con, "SELECT class_id, class_name, section_name FROM classes ORDER BY class_name ASC, section_name ASC"); 
	$row_class = mysqli_fetch_assoc($class);
			
	if(isset($_POST["date_year"])) {
		$transport_id= getValue($_POST["transport_id"]);
		$student_id= getValue($_POST["student_id"]);
		$class_id= getValue($_POST["class_id"]);
		$date_year= getValue($_POST["date_year"]);
		$transport_fee = getValue($_POST["transport_fee"]);
		$car_information= getValue($_POST["car_information"]);
		$result = mysqli_query($con, "INSERT INTO student_transport VALUES (NULL,$student_id, $class_id, '$date_year',$transport_fee,'$car_information')");
		if($result) {
			
			header("location:Student_transport_list.php?add=INSERTED");
		}
		else {
			header("location:Student_Add_transport.php?error=" . mysqli_error($con));
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-success">
	
	<div class="panel-heading">
		<h1 align = "center">Add New Student Transport Informatioin</h1>
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
						Class Info:
					</span>
				
					<select name="class_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class["class_id"]; ?>"><?php echo $row_class["class_name"] . " " . $row_class["section_name"]; ?></option>
						<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
					</select>
					
					
					
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					Date_Year:
				</span> 
				<input required  placeholder="YYYY-MM-DD" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="date_year" class="form-control">
			</div>


			
			
			<div class="input-group">
				<span class="input-group-addon">
				Transport_Fee:
				</span> 
				<input required type="number" name="transport_fee" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
				Car Info:
				</span> 
				<input required type="text" name="car_information" class="form-control">
			</div>

			<input type="submit" value="Add Student Transport info" class="btn btn-info btn-block btn-lg">
			
		</form>
	
	</div>
	
</div>

<?php require_once("footer.php"); ?>