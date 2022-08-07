<?php require_once("connect.php"); ?>
<?php
	$class = mysqli_query($con, "SELECT * FROM student_achievement ORDER BY achievement_id ASC");
	$row_class = mysqli_fetch_assoc($class);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">

	<div class="panel-heading">

		<h1 align = "center">Achievement List Of Student</h1>
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
 	
		<table class="table table-striped">
			<tr>
				<th>Achievement ID</th>
				<th>Achievement Title</th>
				<th>Achievement Text</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
			<?php do { ?>
			<tr>
				<td><?php echo $row_class["achievement_id"]; ?></td>
				<td><?php echo $row_class["ach_title"]; ?></td>
				<td><?php echo $row_class["ach_text"]; ?></td>
				<td>
					<a href="employee_achievement_edit.php?achievement_id=<?php echo $row_class["achievement_id"]; ?>">
						<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				
				<td>
					<a class="delete" href="employee_achievement_delete.php?class_id=<?php echo $row_class["achievement_id"]; ?>">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
			
		</table>
	
	
	</div>
	
</div>





<?php require_once("footer.php"); ?>