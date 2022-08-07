<?php require_once("connect.php"); ?>
<?php
	$employee_id = $_GET["employee_id"];
	$employee = mysqli_query($con, "SELECT * FROM employee WHERE employee_id = $employee_id");
	$row_employee = mysqli_fetch_assoc($employee);
	$old_path = $row_employee["photo"];
	if(isset($_POST["firstname"])) {
		$firstname = getValue($_POST["firstname"]);
		$lastname = getValue($_POST["lastname"]);
		$fathername = getValue($_POST["fathername"]);
		$gender = getValue($_POST["gender"]);
		$phone = getValue($_POST["phone"]);
		$email = getValue($_POST["email"]);
		if($email == "") {
			$email = " NULL ";}
		else {
			$email = "'" . $email . "'";}
		$address = getValue($_POST["address"]);
		$education = getValue($_POST["education"]);
		$position = getValue($_POST["position"]);
		$employee_type = getValue($_POST["employee_type"]);
		$gross_salary = getValue($_POST["gross_salary"]);
		$currency = getValue($_POST["currency"]);
		$working_hours = getValue($_POST["working_hours"]);
		$hire_date = getValue($_POST["hire_date"]);
		if($_FILES["photo"]["name"] != "") {
			$filetype = $_FILES["photo"]["type"];
			if($filetype == "image/jpeg" || $filetype == "image/png" || $filetype == "image/gif") {
				if($_FILES["photo"]["size"] <= 4 * 1024 * 1024) {
					$new_path = "images/employee/" . time() . $_FILES["photo"]["name"];
					move_uploaded_file($_FILES["photo"]["tmp_name"], $new_path);
					unlink($old_path);
				}
				else {
					header("location:employee_edit.php?filesize=incorrect&employee_id=$employee_id");
					exit();}
			}
			else {
				header("location:employee_edit.php?filetype=incorrect&employee_id=$employee_id");
				exit();
			}
		}
		else {
			$new_path = $old_path;
		}
		$result = mysqli_query($con, "UPDATE employee SET firstname='$firstname', lastname='$lastname', fathername='$fathername', gender=$gender, photo='$new_path', phone='$phone', email=$email, address='$address', education='$education', position='$position', employee_type=$employee_type, gross_salary=$gross_salary, currency='$currency', working_hours='$working_hours', hire_date='$hire_date' WHERE employee_id = $employee_id");
		if($result) {
			header("location:employee_list.php?edit=done");
		}
		else {
			header("location:employee_edit.php?error=" . mysqli_error($con) . "&employee_id=$employee_id");
		}
	}
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">
	
	<div class="panel-heading">
		<h1 align = "center">Edit Employee Information</h1>
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
					Firstname:
				</span>
				<input value="<?php echo $row_employee["firstname"]; ?>" type="text" name="firstname" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Lastname:
				</span>
				<input value="<?php echo $row_employee["lastname"]; ?>" type="text" name="lastname" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Fathername:
				</span>
				<input value="<?php echo $row_employee["fathername"]; ?>" type="text" name="fathername" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Gender:
				</span> &nbsp;     
				<label><input style="margin-top:12px;" type="radio" name="gender" value="0" <?php if($row_employee["gender"] == 0) echo "checked"; ?>> Male</label> &nbsp;
				<label><input type="radio" name="gender" value="1" <?php if($row_employee["gender"] == 1) echo "checked"; ?>> Female</label>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Photo:
				</span>
				<input type="file" name="photo" class="form-control">
				<span class="input-group-addon" style="width:40px;">
					<img src="<?php echo $row_employee["photo"]; ?>" width="40">
				</span>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Phone:
				</span>
				<input value="<?php echo $row_employee["phone"]; ?>" type="tel" name="phone" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Email:
				</span> 
				<input value="<?php echo $row_employee["email"]; ?>" type="email" name="email" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Address:
				</span> 
				<input  value="<?php echo $row_employee["address"]; ?>" type="text" name="address" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Education:
				</span> 
				<select name="education" class="form-control">
					<option <?php if($row_employee["education"] == "Illiterate") echo "selected"; ?>>Illiterate</option>
					<option <?php if($row_employee["education"] == "Bachloria") echo "selected"; ?>>Bachloria</option>
					<option <?php if($row_employee["education"] == "College") echo "selected"; ?>>College</option>
					<option <?php if($row_employee["education"] == "Bachlore") echo "selected"; ?>>Bachlore</option>
					<option <?php if($row_employee["education"] == "Master") echo "selected"; ?>>Master</option>
					<option <?php if($row_employee["education"] == "PHD") echo "selected"; ?>>PHD</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Position:
				</span> 
				<input value="<?php echo $row_employee["position"]; ?>" type="text" name="position" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Employee Type:
				</span> 
				<select type="text" name="employee_type" class="form-control">
					<option value="0" <?php if($row_employee["employee_type"] == 0) echo "selected"; ?>>Staff</option>
					<option value="1" <?php if($row_employee["employee_type"] == 1) echo "selected"; ?>>Teacher</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Gross Salary:
				</span> 
				<input value="<?php echo $row_employee["gross_salary"]; ?>" type="number" name="gross_salary" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Salary Currency:
				</span> 
				<select name="currency" class="form-control">
					<option <?php if($row_employee["currency"] == "AFS") echo "selected"; ?>>AFS</option>
					<option <?php if($row_employee["currency"] == "USD") echo "selected"; ?>>USD</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Working Hours:
				</span> 
				<input value="<?php echo $row_employee["working_hours"]; ?>" type="text" name="working_hours" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Hire Date:
				</span> 
				<input value="<?php echo $row_employee["hire_date"]; ?>" placeholder="YYYY-MM-DD" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$" type="text" name="hire_date" class="form-control">
			</div>

			<br>
			
			<input type="submit" value="Save Changes" class="btn btn-info btn-block btn-lg">

			
		</form>
	
	</div>
	
</div>

<?php require_once("footer.php"); ?>