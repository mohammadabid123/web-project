<?php require_once("connect.php"); ?>
<?php require_once("tools.php"); ?>
<?php
	$users = mysqli_query($con, "SELECT * FROM users INNER JOIN employee ON employee.employee_id = users.employee_id");
	$row_users = mysqli_fetch_assoc($users);
?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1>User List</h1>
		</div>
		
		<div class="panel-body">


			<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>User ID</th>
					<th>Employee Name</th>
					<th>Photo</th>
					<th>Username</th>
					<th>Admin</th>
					<th>Employee</th>
					<th>Teacher</th>
					<th>Student</th>
					<th>Fianance</th>
					<th>Inventory</th>
					<th>Library</th>
					<th>Laboratoar</th>
					<th>Change Level</th>
				</tr>
			
				<?php do { ?>
				<tr>
					<td><?php echo $row_users["user_id"]; ?></td>
					<td><?php echo $row_users["firstname"]; ?> <?php echo $row_users["lastname"]; ?></td>
					<td><img src="<?php echo $row_users["photo"]; ?>" class="img-circle" width="40"></td>
					<td><?php echo $row_users["username"]; ?></td>
					<td><?php echo showLevel($row_users["admin_level"]); ?></td>
					<td><?php echo showLevel($row_users["employee_level"]); ?></td>
					<td><?php echo showLevel($row_users["teacher_level"]); ?></td>
					<td><?php echo showLevel($row_users["student_level"]); ?></td>
					<td><?php echo showLevel($row_users["finance_level"]); ?></td>
					<td><?php echo showLevel($row_users["inventory_level"]); ?></td>
					<td><?php echo showLevel($row_users["library_level"]); ?></td>
					<td><?php echo showLevel($row_users["laboratoar_level"]); ?></td>
					<td>
						<a href="user_edit.php?user_id=<?php echo $row_users["user_id"]; ?>">
							<span class="glyphicon glyphicon-cog"></span>
						</a>
					</td>
				</tr>
				<?php } while($row_users = mysqli_fetch_assoc($users)); ?>
				
			</table>
			</div>
		
		</div>
	</div>

<?php require_once("footer.php"); ?>