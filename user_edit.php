<?php require_once("connect.php"); ?>
<?php

	$user = mysqli_query($con, "SELECT * FROM users WHERE user_id = " . getValue($_GET["user_id"]));
	$row_user = mysqli_fetch_assoc($user);

	if(isset($_POST["admin_level"])) { 
		$user_id = getValue($_GET["user_id"]);
		
		$admin_level = getValue($_POST["admin_level"]);
		$employee_level = getValue($_POST["employee_level"]);
		$teacher_level = getValue($_POST["teacher_level"]);
		$student_level = getValue($_POST["student_level"]);
		$finance_level = getValue($_POST["finance_level"]);
		$inventory_level = getValue($_POST["inventory_level"]);
		$library_level = getValue($_POST["library_level"]);
		$laboratoar_level = getValue($_POST["laboratoar_level"]);
		
		
		$result = mysqli_query($con, "UPDATE users SET admin_level=$admin_level, employee_level=$employee_level, teacher_level=$teacher_level, student_level=$student_level, finance_level=$finance_level, inventory_level=$inventory_level, library_level=$library_level, laboratoar_level=$laboratoar_level WHERE user_id = $user_id");  
		if($result) {
			header("location:user_list.php?edit=done");
		}
		else {
			header("location:user_edit.php?error=notedit&user_id=$user_id");
		}
		
	}
		
?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1>Change User Level</h1>
		</div>
		
		<div class="panel-body">
		
			<?php if(isset($_GET["confirm"])) { ?>
				<div class="alert alert-warning">
					Password and confirm does not match!
				</div>
			<?php } ?>
			
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Could not add new user!
				</div>
			<?php } ?>
		
			<form method="post" class="form">
				
				<div class="input-group">
					<span class="input-group-addon">
						Admin Level:
					</span>
					<select name="admin_level" class="form-control">
						<option value="0" <?php if($row_user["admin_level"] == 0) echo "selected"; ?>>None</option>
						<option value="1" <?php if($row_user["admin_level"] == 1) echo "selected"; ?>>View</option>
						<option value="2" <?php if($row_user["admin_level"] == 2) echo "selected"; ?>>Add</option>
						<option value="4" <?php if($row_user["admin_level"] == 4) echo "selected"; ?>>Change</option>
						<option value="8" <?php if($row_user["admin_level"] == 8) echo "selected"; ?>>Remove</option>
					</select>
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Employee Level:
					</span>
					<select name="employee_level" class="form-control">
						<option value="0" <?php if($row_user["employee_level"] == 0) echo "selected"; ?>>None</option>
						<option value="1" <?php if($row_user["employee_level"] == 1) echo "selected"; ?>>View</option>
						<option value="2" <?php if($row_user["employee_level"] == 2) echo "selected"; ?>>Add</option>
						<option value="4" <?php if($row_user["employee_level"] == 4) echo "selected"; ?>>Change</option>
						<option value="8" <?php if($row_user["employee_level"] == 8) echo "selected"; ?>>Remove</option>
					</select>
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Teacher Level:
					</span>
					<select name="teacher_level" class="form-control">
						<option value="0">None</option>
						<option value="1">View</option>
						<option value="2">Add</option>
						<option value="4">Change</option>
						<option value="8">Remove</option>
					</select>
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Student Level:
					</span>
					<select name="student_level" class="form-control">
						<option value="0">None</option>
						<option value="1">View</option>
						<option value="2">Add</option>
						<option value="4">Change</option>
						<option value="8">Remove</option>
					</select>
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Finance Level:
					</span>
					<select name="finance_level" class="form-control">
						<option value="0">None</option>
						<option value="1">View</option>
						<option value="2">Add</option>
						<option value="4">Change</option>
						<option value="8">Remove</option>
					</select>
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Inventory Level:
					</span>
					<select name="inventory_level" class="form-control">
						<option value="0">None</option>
						<option value="1">View</option>
						<option value="2">Add</option>
						<option value="4">Change</option>
						<option value="8">Remove</option>
					</select>
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Library Level:
					</span>
					<select name="library_level" class="form-control">
						<option value="0">None</option>
						<option value="1">View</option>
						<option value="2">Add</option>
						<option value="4">Change</option>
						<option value="8">Remove</option>
					</select>
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Laboratoar Level:
					</span>
					<select name="laboratoar_level" class="form-control">
						<option value="0">None</option>
						<option value="1">View</option>
						<option value="2">Add</option>
						<option value="4">Change</option>
						<option value="8">Remove</option>
					</select>
				</div>
				
				<input type="submit" value="Save Changes" class="btn btn-primary">
				
			</form>
		</div>
	</div>

<?php require_once("footer.php"); ?>