<?php require_once("connect.php"); ?>
<?php

			
	$class = mysqli_query($con, "SELECT * FROM expense_type ORDER BY type_id ASC");
	$row_class = mysqli_fetch_assoc($class);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">

	<div class="panel-heading">

		<h1 align = "center">Expense type</h1>
	</div>
	
	<div class="panel-body">

		<table class="table table-striped">
			<tr>
				<th>Type ID</th>
				<th>Type Name</th>
			</tr>
			
			<?php do { ?>
			<tr>
				<td><?php echo $row_class["type_id"]; ?></td>
				<td><?php echo $row_class["type_name"]; ?></td>

			</tr>
			<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
			
		</table>
	
	
	</div>
	
</div>





<?php require_once("footer.php"); ?>