<?php require_once("connect.php"); ?>
<?php
	$class = mysqli_query($con, "SELECT * FROM score");
	$row_class = mysqli_fetch_assoc($class);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">

	<div class="panel-heading">

		<h1 align = "center">Score  List</h1>
	</div>
	
	<div class="panel-body">
	
		<table class="table table-striped">
			<tr>
				<th>exam_id</th>
				<th>student_id</th>
				<th>written_mark</th>
				<th>oral_mark</th>
				<th>class_activity	</th>
				<th>homework</th>
				<th>final_mark</th>
				<th>remark</th>
			</tr>
			
			<?php do { ?>
			<tr>
				<td><?php echo $row_class["exam_id"]; ?></td>
				<td><?php echo $row_class["student_id"]; ?></td>
				<td><?php echo $row_class["written_mark"]; ?></td>
				<td><?php echo $row_class["oral_mark"]; ?></td>
				<td><?php echo $row_class["class_activity"]; ?></td>
				<td><?php echo $row_class["homework"]; ?></td>
				<td><?php echo $row_class["final_mark"]; ?></td>
				<td><?php echo $row_class["remark"]; ?></td>

			</tr>
			<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
			
		</table>
	
	
	</div>
	
</div>





<?php require_once("footer.php"); ?>