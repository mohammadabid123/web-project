<?php require_once("connect.php"); ?>
<?php
	if(isset($_GET["from"])) { 
		$from = getValue($_GET["from"]);
		$to = getValue($_GET["to"]);
	}
	else {
		$from = jdate("Y-m-d", "", "", "", "en");
		$to = jdate("Y-m-d", "", "", "", "en");
	}
	
	$salary = mysqli_query($con, "SELECT * FROM emp_salary INNER JOIN employee ON employee.employee_id = emp_salary.employee_id WHERE payment_date BETWEEN '$from' AND '$to' ");
	$row_salary = mysqli_fetch_assoc($salary);
	
?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<a id="print" href="#" class="btn btn-info pull-right noprint"> 	
				<span class="glyphicon glyphicon-print"></span> 
				Print
			</a>
			<h1>Salary Report</h1>
		</div>
		
		<div class="panel-body">
		
			<form method="get" class="noprint">
			
				<div class="col-lg-6 col-md-6 col-md-6 col-xs-12">
					<div class="input-group">
						<span class="input-group-addon">
							From:
						</span>
						<input value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="from" class="form-control">
					</div>
				</div>
				
				<div class="col-lg-6 col-md-6 col-md-6 col-xs-12">
					<div class="input-group">
						<span class="input-group-addon">
							To:
						</span>
						<input value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="to" class="form-control">
						<span class="input-group-btn">
							<input type="submit" value="Show" class="btn btn-primary">
						</span>
					</div>
				</div>
				
			</form>
	
			<div class="clearfix"></div>

			<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Photo</th>
					<th>Net Salary</th>
					<th>Pay Date</th>
				</tr>
				
				<?php $totalAFS = 0; $totalUSD = 0; do { ?>
					<tr>
						<td><?php echo $row_salary["employee_id"]; ?></td>
						<td><?php echo $row_salary["firstname"]; ?> <?php echo $row_salary["lastname"]; ?></td>
						<td><img src="<?php echo $row_salary["photo"]; ?>" width="40"></td>
						<td><?php echo $row_salary["net_salary"]; ?>
							<?php echo $row_salary["currency"]; ?>
						</td>
						<?php
							if($row_salary["currency"] == "AFS") {
								$totalAFS += $row_salary["net_salary"];
							}
							else if($row_salary["currency"] == "USD") {
								$totalUSD += $row_salary["net_salary"];
							}
						?>
						<td><?php echo $row_salary["payment_date"]; ?></td>
					</tr>
				<?php } while($row_salary = mysqli_fetch_assoc($salary)); ?>
				
				
			</table>
	
		</div>
		
		<div class="panel-footer text-right">
		<b><big>
			Total AFS Salary: <?php echo number_format($totalAFS, 0); ?> AFS<br>
			Total USD Salary: <?php echo number_format($totalUSD, 0); ?> USD
		</big></b>
		</div>
		
	</div>

<?php require_once("footer.php"); ?>