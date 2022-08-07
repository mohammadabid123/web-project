<?php require_once("connect.php"); ?>
<?php
	$class = mysqli_query($con, "SELECT * FROM lib_loan ORDER BY loan_id ASC");
	$row_class = mysqli_fetch_assoc($class);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">

	<div class="panel-heading">

		<h1 align = "center">Loan  List</h1>
	</div>
	
	<div class="panel-body">
	
 	
		<table class="table table-striped">
		

			<tr>
				<th>loan_id</th>
				<th>student_id</th>
				<th>book_id	</th>
				<th>loan_date</th>
				<th>return_date</th>
				<th>surcharge</th>
			</tr>
			
			<?php do { ?>
			<tr>
				<td><?php echo $row_class["loan_id"]; ?></td>
				<td><?php echo $row_class["student_id"]; ?></td>
				<td><?php echo $row_class["book_id"]; ?></td>
				<td><?php echo $row_class["loan_date"]; ?></td>
				<td><?php echo $row_class["return_date"]; ?></td>
				<td><?php echo $row_class["surcharge"]; ?></td>

			</tr>
			<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
			
		</table>
	
	
	</div>
	
</div>





<?php require_once("footer.php"); ?>