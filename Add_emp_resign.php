<?php require_once("connect.php"); ?>
<?php
	if(isset($_POST["firstname"])) {
		$firstname = getValue($_POST["firstname"]);
		$lastname = getValue($_POST["lastname"]);
		$fathername = getValue($_POST["fathername"]);
		$gender = getValue($_POST["gender"]);
		$phone = getValue($_POST["phone"]);
		
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

		$result = mysqli_query($con, "INSERT INTO employee VALUES (NULL, '$firstname', '$lastname', '$fathername', $gender, 
		'$path', '$phone', $email, '$address', '$education', '$position', $employee_type, $gross_salary, '$currency', '$working_hours', '$hire_date', NULL)");
		
		if($result) {
			
			header("location:employee_list.php?add=INSERTED");
		}
		else {
			header("location:employee_add.php?error=" . mysqli_error($con));
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-success">
	
	<div class="panel-heading">
		<h1 align = "center">Add New Employee</h1>
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
					firstname:  
				</span>
				<input required type="text" name="firstname" class="form-control">
			</div>
			
			
			
			
			<div class="input-group">
				<span class="input-group-addon">
					lastname:  
				</span>
				<input required type="text" name="lastname" class="form-control">
			</div>
			
			
			
			
			
			
			
			
			<div class="input-group">
				<span class="input-group-addon">
					fathername	:
				</span>
				<input required type="text" name="fathername" class="form-control">
			</div>
			
			
			
			
			
			
			
			<div class="input-group">
				<span class="input-group-addon">
					grandfathername:
				</span>
				<input required type="text" name="grandfathername" class="form-control">
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
				<input type="file" name="photo" class="form-control">
			</div>

			

			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<div class="input-group">
				<span class="input-group-addon">
					province:
				</span> 
				<input required type="text" name="province" class="form-control">
			</div>
			

			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<div class="input-group">
				<span class="input-group-addon">
					district:
				</span> 
				<input required type="text" name="district" class="form-control">
			</div>
			

			
			<div class="input-group">
				<span class="input-group-addon">
					village:
				</span> 
				<input required type="text" name="village" class="form-control">
			</div>

			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<div class="input-group">
				<span class="input-group-addon">
					Nic Number:
				</span> 
				<input required type="number" name="nic" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					birth_year:
				</span> 
				<input required  placeholder="YYYY-MM-DD" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="birth_year" class="form-control">
			</div>

		
			<input type="submit" value="Add Employee" class="btn btn-info btn-block btn-lg">
			
		</form>
	
	</div>
	
</div>

<?php require_once("footer.php"); ?>