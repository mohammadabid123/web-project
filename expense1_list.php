<?php require_once("connect.php"); ?>
<?php
	$class = mysqli_query($con, "SELECT * FROM expense ORDER BY expense_id ASC");
	$row_class = mysqli_fetch_assoc($class);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">

	<div class="panel-heading">

		<h1 align = "center">Expense List</h1>
	</div>
	
	<div class="panel-body">
	
 	
		<table class="table table-striped">
			<tr>
				<th>expense id</th>
				<th>employee id	</th>
				<th>type_id</th>
				<th>expense_year</th>
				<th>amount</th>
				<th>Delete</th>
			</tr>
			
			<?php do { ?>
			<tr>
				<td><?php echo $row_class["expense_id"]; ?></td>
				<td><?php echo $row_class["employee_id"]; ?></td>
				<td><?php echo $row_class["type_id"]; ?></td>
				<td><?php echo $row_class["expense_year"]; ?></td>
				<td><?php echo $row_class["amount"]; ?></td>
				<td><?php echo $row_class["remark"]; ?></td>

			</tr>
			<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
			
		</table>
	
	
	</div>
	
</div>





<?php require_once("footer.php"); ?>