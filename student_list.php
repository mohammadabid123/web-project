<?php require_once("connect.php"); ?>
<?php
	$student = mysqli_query($con, "SELECT * FROM student  ORDER BY student_id ASC");
	$row_student = mysqli_fetch_assoc($student);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">

	<div class="panel-heading">

		<h1 align = "center">Student List</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["add"])) { ?>
			<div class="alert alert-success">
				New student  has been successfully added!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["delete"])) { ?>
			<div class="alert alert-success">
				Selected Student  has been successfully removed!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["edit"])) { ?>
			<div class="alert alert-success">
				Selected Student  has been successfully updated!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Selected Student  has not been deleted!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["erroradd"])) { ?>
			<div class="alert alert-danger">
				Could not add new Student!
			</div>
		<?php } ?>
 	
		<table class="table table-striped">
			<tr>	
				
				<th>Serious Number</th>
				<th>Student ID</th>
				<th>student Name</th>
				<th>Father Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
			<?php $x=1; do { ?>
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $row_student["student_id"]; ?></td>
				<td><?php echo $row_student["firstname"]; ?></td>
				<td><?php echo $row_student["fathername"]; ?></td>

			<td>
					<a href="student_edit.php?student_id=<?php echo $row_student["student_id"]; ?>">
						<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				
				<td>
					<a class="delete" href="student_delete.php?student_id=<?php echo $row_student["student_id"]; ?>">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
			
		</table>
	
	
	</div>
	
</div>
<?php require_once("footer.php"); ?>