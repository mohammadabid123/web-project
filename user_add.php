<?php require_once("connect.php"); ?>
<?php
	if(isset($_POST["username"])) { 
		$employee_id = getValue($_POST["employee_id"]);
		$username = getValue($_POST["username"]);
		$password = getValue($_POST["password"]);
		$confirm = getValue($_POST["confirm"]);
		$admin_level = getValue($_POST["admin_level"]);
		$employee_level = getValue($_POST["employee_level"]);
		$teacher_level = getValue($_POST["teacher_level"]);
		$student_level = getValue($_POST["student_level"]);
		$finance_level = getValue($_POST["finance_level"]);
		$inventory_level = getValue($_POST["inventory_level"]);
		$library_level = getValue($_POST["library_level"]);
		$laboratoar_level = getValue($_POST["laboratoar_level"]);
		
		if($password == $confirm) {
			$result = mysqli_query($con, "INSERT INTO users VALUES (NULL, $employee_id, '$username', PASSWORD('$password'), $admin_level, $employee_level, $teacher_level, $student_level, $finance_level, $inventory_level, $library_level, $laboratoar_level)");  
			if($result) {
				header("location:user_list.php?add=done");
			}
			else {
				header("location:user_add.php?error=notadd");
			}
		}
		else {
			header("location:user_add.php?confirm=no");
		}		
	}
	
	$employee = mysqli_query($con, "SELECT employee_id, firstname, lastname FROM employee WHERE employee_id NOT IN (SELECT employee_id FROM users) ORDER BY firstname ASC, lastname ASC");
	$row_employee = mysqli_fetch_assoc($employee);
	
?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1>Add New User</h1>
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
						Employee:
					</span>
					<select name="employee_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_employee["employee_id"]; ?>"><?php echo $row_employee["firstname"]; ?> <?php echo $row_employee["lastname"]; ?></option>
						<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
					</select>
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Username:
					</span>
					<input type="text" name="username" class="form-control">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Password:
					</span>
					<input type="password" name="password" class="form-control">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Confirm:
					</span>
					<input type="password" name="confirm" class="form-control">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Admin Level:
					</span>
					<select name="admin_level" class="form-control">
						<option value="0">None</option>
						<option value="1">View</option>
						<option value="2">Add</option>
						<option value="4">Change</option>
						<option value="8">Remove</option>
					</select>
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Employee Level:
					</span>
					<select name="employee_level" class="form-control">
						<option value="0">None</option>
						<option value="1">View</option>
						<option value="2">Add</option>
						<option value="4">Change</option>
						<option value="8">Remove</option>
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
				
				<input type="submit" value="Add User" class="btn btn-primary">
				
			</form>
		</div>
	</div>

<?php require_once("footer.php"); ?>