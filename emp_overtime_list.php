<?php require_once("connect.php"); ?>
<?php

	
	$class = mysqli_query($con, "SELECT a.firstname,a.lastname,b.overtime_year,b.overtime_month,b.overtime_day,b.overtime_hour FROM employee a, emp_overtime b
	WHERE a.employee_id=b.overtime_day");
	$row_class = mysqli_fetch_assoc($class);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">

	<div class="panel-heading">

		<h1 align = "center">OverTime List</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["add"])) { ?>
			<div class="alert alert-success">
				New class has been successfully added!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["delete"])) { ?>
			<div class="alert alert-success">
				Selected class has been successfully removed!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["edit"])) { ?>
			<div class="alert alert-success">
				Selected class has been successfully updated!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Selected class has not been deleted!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["erroradd"])) { ?>
			<div class="alert alert-danger">
				Could not add new class!
			</div>
		<?php } ?>
 	
		<table class="table table-bordered"  border = "10">
			<tr>
				<th> Serious Numbers</th>
				<th>Employee Name </th>
				<th>Employee Last Name </th>
				<th>Year </th>
				<th>Month</th>
				<th>Day</th>
				<th>hours</th>
			</tr>
			
			
			<?php $x=1; do { ?>
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $row_class["firstname"]; ?></td>
				<td><?php echo $row_class["lastname"]; ?></td>
				
				<td><?php echo $row_class["overtime_year"]; ?></td>
				<td><?php echo $row_class["overtime_month"]; ?></td>
				<td><?php echo $row_class["overtime_day"]; ?></td>
				<td><?php echo $row_class["overtime_hour"]; ?></td>
				
			</tr>
			<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
			
		</table>
	
	
	</div>
	
</div>





<?php require_once("footer.php"); ?>