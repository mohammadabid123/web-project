<?php require_once("connect.php"); ?>
<?php
	
	
	if(isset($_POST["firstname"])) {
		$firstname = getValue($_POST["firstname"]);
		$lastname = getValue($_POST["lastname"]);
		$fathername = getValue($_POST["fathername"]);
		$gender = getValue($_POST["gender"]);
		
		$phone = getValue($_POST["phone"]);
		$email = getValue($_POST["email"]);
		if($email == "") { 
			$email = " NULL ";
		}
		else {
			$email = "'" . $email . "'";
		}
		
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
					$path = "images/employee/" . time() . $_FILES["photo"]["name"];
					move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
				}
				else {
					header("location:employee_add.php?filesize=incorrect");
					exit();
				}
			}
			else {
				header("location:employee_add.php?filetype=incorrect");
				exit();
			}
		}
		else {
			if($gender == 0) {
				$path = "images/employee/user_m.png";
			}
			else {
				$path = "images/employee/user_f.png";
			}
		}

		$result = mysqli_query($con, "INSERT INTO employee VALUES (NULL, '$firstname', '$lastname', '$fathername', $gender, '$path', '$phone', $email, '$address', '$education', '$position', $employee_type, $gross_salary, '$currency', '$working_hours', '$hire_date', NULL)");
		
		if($result) {
			header("location:employee_list.php?add=done");
		}
		else {
			header("location:employee_add.php?error=" . mysqli_error($con));
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">
	
	<div class="panel-heading">
		<h1 align = "center">Add New Employee To DataBase </h1>
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
					Sorry! Could not add new employee! Please try again!
					<br>
					<?php echo $_GET["error"]; ?>
				</div>
			<?php } ?>
			
			<div class="input-group">
				<span class="input-group-addon">
					Firstname:
				</span>
				<input type="text" name="firstname" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Lastname:
				</span>
				<input required type="text" name="lastname" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Fathername:
				</span>
				<input required type="text" name="fathername" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Gender:
				</span> &nbsp;     
				<label><input style="margin-top:12px;" type="radio" name="gender" value="0" checked> Male</label> &nbsp;
				<label><input type="radio" name="gender" value="1"> Female</label>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Photo:
				</span>
				<input required type="file" name="photo" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Phone:
				</span>
				<input required type="tel" name="phone" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Email:
				</span> 
				<input required type="email" name="email" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Address:
				</span> 
				<input required type="text" name="address" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Education:
				</span> 
				<select name="education" class="form-control">
					<option>Illiterate</option>
					<option>Bachloria</option>
					<option>College</option>
					<option>Bachlore</option>
					<option>Master</option>
					<option>PHD</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Position:
				</span> 
				<input required type="text" name="position" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Employee Type:
				</span> 
				<select type="text" name="employee_type" class="form-control">
					<option value="0">Staff</option>
					<option value="1">Teacher</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Gross Salary:
				</span> 
				<input required type="number" name="gross_salary" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Salary Currency:
				</span> 
				<select name="currency" class="form-control">
					<option>AFS</option>
					<option>USD</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Working Hours:
				</span> 
				<input required type="text" name="working_hours" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Hire Date:
				</span> 
				<input placeholder="YYYY-MM-DD" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="hire_date" class="form-control">
			</div>

			<br>
			<input type="submit" value="Add Employee" class="btn btn-info btn-block btn-lg">
			
		</form>
	
	</div>
	
</div>

<?php require_once("footer.php"); ?>