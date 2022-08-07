<?php require_once("connect.php"); ?>
<?php
	$class = mysqli_query($con, "SELECT * FROM lab ORDER BY lab_id ASC");
	$row_class = mysqli_fetch_assoc($class);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">

	<div class="panel-heading">

		<h1 align = "center">Lab  List</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["add"])) { ?>
			<div class="alert alert-success">
				New Item has been successfully added!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["delete"])) { ?>
			<div class="alert alert-success">
				Selected item has been successfully removed!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["edit"])) { ?>
			<div class="alert alert-success">
				Selected item has been successfully updated!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Selected item has not been deleted!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["erroradd"])) { ?>
			<div class="alert alert-danger">
				Could not add new class!
			</div>
		<?php } ?>

		<table class="table table-striped">
			<tr>
				<th>Lab ID</th>
				<th>Item Name</th>
				<th>Unit</th>
				<th>Description</th>
				<th>Quantity</th>
			</tr>
			
			<?php do { ?>
			<tr>
				<td><?php echo $row_class["lab_id"]; ?></td>
				<td><?php echo $row_class["item_name"]; ?></td>
				<td><?php echo $row_class["unit"]; ?></td>
				<td><?php echo $row_class["description"]; ?></td>
				<td><?php echo $row_class["quantity"]; ?></td>

			</tr>
			<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
			
		</table>
	
	
	</div>
	
</div>





<?php require_once("footer.php"); ?>