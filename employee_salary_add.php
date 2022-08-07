<?php require_once("connect.php"); ?>
<?php
	$employee_id = getValue($_GET["employee_id"]);
	$year = getValue($_GET["salary_year"]);
	$month = getValue($_GET["salary_month"]);
	
	$salary = mysqli_query($con, "SELECT gross_salary, currency FROM employee WHERE employee_id = $employee_id");
	$row_salary = mysqli_fetch_assoc($salary);
	
	$attendance = mysqli_query($con, "SELECT SUM(absent_hour) AS totalabsent FROM emp_attendance WHERE employee_id = $employee_id AND absent_year=$year AND absent_month=$month AND absent_type = 1");
	$row_attendance = mysqli_fetch_assoc($attendance);
	
	$overtime = mysqli_query($con, "SELECT SUM(overtime_hour) AS totalovertime FROM emp_overtime WHERE employee_id = $employee_id AND overtime_year=$year AND overtime_month=$month");
	$row_overtime = mysqli_fetch_assoc($overtime);
	
	$gross_salary = $row_salary["gross_salary"];
	$absent_hour = $row_attendance["totalabsent"];
	$overtime_hour = $row_overtime["totalovertime"];
	
	$sph = $gross_salary / 30 / 8;
	
	$absent_amount = round($absent_hour * $sph, 2);
	$overtime_amount = round($overtime_hour * $sph, 2);

	$tax_amount;
	
	if($row_salary["currency"] == "AFS") {
		if($gross_salary <= 5000) {
			$tax_amount = 0;
		}
		else if($gross_salary <= 12500) {
			$tax_amount = $gross_salary * 2 / 100;
		}
		else if($gross_salary <= 50000) {
			$tax_amount = $gross_salary * 5 / 100;
		}
		else if($gross_salary <= 100000) {
			$tax_amount = $gross_salary * 10 / 100;
		}
		else if($gross_salary > 100000) {
			$tax_amount = $gross_salary * 20 / 100;
		}
	}else { 
		if($gross_salary <= 100) {
			$tax_amount = 0;
		}
		else if($gross_salary <= 200) {
			$tax_amount = $gross_salary * 2 / 100;
		}
		else if($gross_salary <= 1000) {
			$tax_amount = $gross_salary * 5 / 100;
		}
		else if($gross_salary <= 2000) {
			$tax_amount = $gross_salary * 10 / 100;
		}
		else if($gross_salary > 2000) {
			$tax_amount = $gross_salary * 20 / 100;
		}
	}
	
	
	$net_salary = round($gross_salary - $absent_amount + $overtime_amount - $tax_amount, 0);


	if(isset($_POST["absent_amount"])) {
		$absent_amount = $_POST["absent_amount"];
		$overtime_amount = $_POST["overtime_amount"];
		$tax_amount = $_POST["tax_amount"];
		$net_salary = $_POST["net_salary"];
		$exchange_rate = $_POST["exchange_rate"];
		$changed_amount = $_POST["changed_amount"];
		$payment_date = $_POST["payment_date"];

		$result = mysqli_query($con, "INSERT INTO emp_salary VALUES ($employee_id, $year, $month, $absent_amount, $overtime_amount, $tax_amount, $net_salary, $exchange_rate, $changed_amount, '$payment_date')");
		
		if($result) {
			header("location:employee_salary.php?add=done");
		}
		else {
			header("location:employee_salary_add.php?error=notadd&employee_id=$employee_id&salary_year=$year&salary_month=$month");
		}		
	}
?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1>Add Employee Salary</h1>
		</div>
		
		<div class="panel-body">
		
			<form method="post" class="form">
				<div class="input-group">
					<span class="input-group-addon">
						Gross Salary:
					</span>
					<input readonly value="<?php echo $row_salary["gross_salary"]; ?>" type="text" name="gross_salary" class="form-control">
					<span id="currency" class="input-group-addon" style="width:40px;">
						<?php echo $row_salary["currency"]; ?>
					</span>
				</div>
				<div class="input-group">
					<span class="input-group-addon">
						Absent Amount:
					</span>
					<input value="<?php echo $absent_amount; ?>" type="text" name="absent_amount" class="form-control">
					<span class="input-group-addon" style="width:40px;">
						<?php echo $row_salary["currency"]; ?>
					</span>
				</div>
				<div class="input-group">
					<span class="input-group-addon">
						Overtime Amount:
					</span>
					<input value="<?php echo $overtime_amount; ?>" type="text" name="overtime_amount" class="form-control">
					<span class="input-group-addon" style="width:40px;">
						<?php echo $row_salary["currency"]; ?>
					</span>
				</div>
				<div class="input-group">
					<span class="input-group-addon">
						Tax Amount:
					</span>
					<input value="<?php echo $tax_amount; ?>" type="text" name="tax_amount" class="form-control">
				</div>
				<div class="input-group">
					<span class="input-group-addon">
						Net Salary:
					</span>
					<input id="net_salary" value="<?php echo $net_salary; ?>" type="text" name="net_salary" class="form-control">
				</div>
				<div class="input-group">
					<span class="input-group-addon">
						Exchange Rate:
					</span>
					<input id="exchange" type="text" value="1" name="exchange_rate" class="form-control">
				</div>
				<div class="input-group">
					<span class="input-group-addon">
						Changed Amount:
					</span>
					<input id="changed_amount" value="<?php echo $net_salary; ?>" type="text" name="changed_amount" class="form-control">
				</div>
				<div class="input-group">
					<span class="input-group-addon">
						Payment Date:
					</span>
					<input type="text" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" name="payment_date" class="form-control">
				</div>
				
				<input type="submit" value="Calculate" class="btn btn-primary">
				
			</form>
		
		
		</div>
	</div>

<?php require_once("footer.php"); ?>