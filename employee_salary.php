<?php require_once("connect.php"); ?>
<?php

	$year = jdate("Y", "", "", "", "en");
	$month = jdate("m", "", "", "", "en");

	$employee = mysqli_query($con, "SELECT employee_id, firstname, lastname, position, gross_salary, currency, photo, (SELECT net_salary FROM emp_salary WHERE salary_year=$year AND salary_month=$month AND employee_id = employee.employee_id) AS net_salary FROM employee ORDER BY employee_id ASC");
	$row_employee = mysqli_fetch_assoc($employee);

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1>Employee Salary
				(<?php echo $year; ?> - 
				<?php echo $month; ?>)
			</h1>
		</div>
		
		<div class="panel-body">
		
			<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Position</th>
					<th>Photo</th>
					<th>Gross Salary</th>
					<th>Net Salary</th>
				</tr>
				
				<?php do { ?>
				<tr>
					<td><?php echo $row_employee["employee_id"]; ?></td>
					<td><?php echo $row_employee["firstname"]; ?> <?php echo $row_employee["firstname"]; ?></td>
					<td><?php echo $row_employee["position"]; ?></td>
					<td><img src="<?php echo $row_employee["photo"]; ?>" width="30" class="img-circle"></td>
					<td><?php echo $row_employee["gross_salary"]; ?>
						<?php echo $row_employee["currency"]; ?>
					</td>
					<td>
						<?php if($row_employee["net_salary"] == "") { ?>
							<a href="employee_salary_add.php?employee_id=<?php echo $row_employee["employee_id"]; ?>&salary_year=<?php echo $year; ?>&salary_month=<?php echo $month; ?>">
								<span class="glyphicon glyphicon-usd"></span>
								 Calculate
							</a>
						<?php } else { ?>
							<?php echo $row_employee["net_salary"]; ?>
						<?php } ?>
						
					</td>
				</tr>
				<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
				
			</table>
		
		
		
		
		</div>
	</div>

<?php require_once("footer.php"); ?>