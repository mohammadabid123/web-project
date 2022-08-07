<?php require_once("connect.php"); ?>

<?php
	
	$employee = mysqli_query($con, "SELECT employee_id, firstname, lastname FROM employee ORDER BY firstname ASC, lastname ASC"); 
	$row_employee = mysqli_fetch_assoc($employee);

	if(isset($_POST["overtime_year"])) { 
		$employee_id = getValue($_POST["employee_id"]);
		$overtime_year = getValue($_POST["overtime_year"]);
		$overtime_month = getValue($_POST["overtime_month"]);
		$overtime_day  = getValue($_POST["overtime_day"]);
		$overtime_hour  = getValue($_POST["overtime_hour"]);
		$result = mysqli_query($con, "INSERT INTO emp_overtime VALUES ($employee_id,$overtime_year,$overtime_month, $overtime_day,$overtime_hour)");
		
		if($result) {
			header("location:emp_overtime_list.php?add=done");
		}
		else {
			header("location:employee_overtime_add.php?error=notadd");
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add New Overtime</h1>
		</div>
		
		<div class="panel-body">
		
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Could not add new class!
				</div>
			<?php } ?>
		
			<form method="post">
				
				
				<div class="input-group">
					<span class="input-group-addon">
						Employee Name:
					</span>
				
					<select name="employee_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_employee["employee_id"]; ?>"><?php echo $row_employee["firstname"] . " " . $row_employee["lastname"]; ?></option>
						<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
					</select>
				</div>
		
			<div class="input-group">
				<span class="input-group-addon">
					overtime_year:
				</span>
				<input required type="number" name="overtime_year" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					overtime_month:
				</span>
				<input required type="number" name="overtime_month" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					overtime_day :
				</span>
				<input required type="number" name="overtime_day" class="form-control">
			</div>
			
						
			<div class="input-group">
				<span class="input-group-addon">
					overtime_hour
				</span>
				<input required type="number" name="overtime_hour" class="form-control">
			</div>
			
			<input type="submit" value="Add Class" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>