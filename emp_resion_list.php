<?php require_once("connect.php"); ?>

<?php
	$class = mysqli_query($con, "SELECT * FROM emp_resign ORDER BY resign_id ASC");
	$row_class = mysqli_fetch_assoc($class);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">

	<div class="panel-heading">

		<h1 align = "center">The Employee Resign Information</h1>
	</div>
	
	<div class="panel-body">
 	
		<table class="table table-bordered">
			<tr>
				<th>resign_id</th>
				<th>Employee_id</th>
				<th>resign_date</th>
				<th>resign_reason</th>
			</tr>
			
			<?php do { ?>
			<tr>
				<td><?php echo $row_class["resign_id"]; ?></td>
				<td><?php echo $row_class["employee_id"]; ?> </td>
				<td><?php echo $row_class["resign_date"]; ?></td>
				<td><?php echo $row_class["resign_reason"]; ?></td>
			
			</tr>
			<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
			
		</table>
	
	
	</div>
	
</div>





<?php require_once("footer.php"); ?>