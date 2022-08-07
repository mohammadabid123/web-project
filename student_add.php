<?php require_once("connect.php"); ?>
<?php
	$class  = mysqli_query($con, "SELECT class_id, class_name, section_name FROM classes ORDER BY class_name ASC, section_name ASC"); 
	$row_class = mysqli_fetch_assoc($class);
	if(isset($_POST["firstname"])) { 
		$firstname = getValue($_POST["firstname"]);
		$lastname = getValue($_POST["lastname"]);
		$fathername = getValue($_POST["fathername"]);
		$grandfathername = getValue($_POST["grandfathername"]);
		$gender = getValue($_POST["gender"]);
		$province = getValue($_POST["province"]);
		$district = getValue($_POST["district"]);
		$village = getValue($_POST["village"]);
		$birth_year = getValue($_POST["birth_year"]);
		$nic = getValue($_POST["nic"]);
		$class_id = getValue($_POST["class_id"]);
		
		$result = mysqli_query($con, "INSERT INTO student VALUES (NULL, '$firstname','$lastname','$fathername','$grandfathername',$gender,
		'$province','$district','$village','$birth_year',$nic,'$class_id')");
		
		if($result) {
			header("location:student_list.php?add=done");
		}
		else {
			header("location:student_add.php?error=notadd");
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add New Student To DataBase</h1>
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
					 FirstName:
				</span>
				<input required type="text" name="firstname" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					 LastName:
				</span>
				<input required type="text" name="lastname" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					 fathername:
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
					birth_year:
				</span> 
				<input placeholder="YYYY-MM-DD" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="birth_year" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Nic Number:
				</span>
				<input required type="number" name="nic" class="form-control">
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
			<input type="submit" value="Add Student" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>