<?php require_once("connect.php"); ?>
<?php
	$student = mysqli_query($con, "SELECT a.firstname,b.date_year,b.transport_fee,b.car_information FROM student a, student_transport b WHERE a.student_id=b.transport_id");
	$row_student = mysqli_fetch_assoc($student);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">

	<div class="panel-heading">

		<h1 align = "center">Student Transfort Info</h1>
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
				<th>Student Name</th>
				<th>Date Year</th>
				<th>Transfort Fee</th>
				<th>Car Info</th>
			</tr>
			
			<?php $x=1; do { ?>
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $row_student["firstname"]; ?></td>
				<td><?php echo $row_student["date_year"]; ?></td>
				<td><?php echo $row_student["transport_fee"]; ?></td>
				<td><?php echo $row_student["car_information"]; ?></td>

			</tr>
			<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
			
		</table>
	
	
	</div>
	
</div>
<?php require_once("footer.php"); ?>