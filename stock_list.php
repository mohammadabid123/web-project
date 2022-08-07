<?php require_once("connect.php"); ?>
<?php
	$stock = mysqli_query($con, "SELECT * FROM stock");
	$row_stock = mysqli_fetch_assoc($stock);
?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<a href="stock_out_add.php" class="pull-right btn btn-info">
				Item Out
			</a>
			<a href="stock_in_add.php" class="pull-right btn btn-info">
				Item In
			</a>
			<h1>Stock Management</h1>
		</div>
		
		<div class="panel-body">
		
			<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price</th>
				</tr>
				
				<?php do { ?>
					<tr>
						<td><?php echo $row_stock["item_id"]; ?></td>
						<td><?php echo $row_stock["item_name"]; ?></td>
						<td><?php echo $row_stock["quantity"]; ?></td>
						<td><?php echo $row_stock["price"]; ?></td>
					</tr>
				<?php } while($row_stock = mysqli_fetch_assoc($stock)); ?>
				
			</table>
		
		
		</div>
	</div>

<?php require_once("footer.php"); ?>