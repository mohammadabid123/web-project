<?php require_once("connect.php"); ?>
<?php
	

	$class = mysqli_query($con, "SELECT a.firstname,b.transfer_date,b.from_school,b.to_school,b.grade,b.remark FROM student a, student_transfer b WHERE a.student_id=b.transfer_id");
	$row_class = mysqli_fetch_assoc($class);
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">

	<div class="panel-heading">

		<h1 align = "center">Transfer Information  List</h1>
	</div>
	
	<div class="panel-body">
		<table class="table table-striped">
			<tr>
			
				
				<th>Student Name  </th>
				<th>Date  </th>
				<th>From School</th>
				<th>To School</th>
				<th>Grade</th>
				<th>Remark</th>
			</tr>
			<?php do { ?>
			<tr>
				<td><?php echo $row_class["firstname"]; ?></td>
				<td><?php echo $row_class["transfer_date"]; ?></td>
				<td><?php echo $row_class["from_school"]; ?></td>
				<td><?php echo $row_class["to_school"]; ?></td>
				<td><?php echo $row_class["grade"]; ?></td>
				<td><?php echo $row_class["remark"]; ?></td>
			</tr>
			<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
			
		</table>
	
	
	</div>
	
</div>





<?php require_once("footer.php"); ?><?php require_once("connect.php"); ?>
