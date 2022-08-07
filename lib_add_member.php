<?php require_once("connect.php"); ?>
<?php

	$employee = mysqli_query($con, "SELECT student_id, firstname, lastname FROM student ORDER BY firstname ASC, lastname ASC"); 
	$row_employee = mysqli_fetch_assoc($employee);
	if(isset($_POST["reg_date"])) { 
		$student_id = getValue($_POST["student_id"]);
		$reg_date = getValue($_POST["reg_date"]);
		
		$result = mysqli_query($con, "INSERT INTO  lib_member VALUES (NULL,$student_id,'$reg_date')");
		
		if($result) {
			header("location:lib_member_list.php?add=done");
		}
		else {
			header("location:lib_add_member.php?error=notadd");
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add To library the member</h1>
		</div>
		
		<div class="panel-body">
		
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Could not add new class!
				</div>
			<?php } ?>
			
			<form method="post">
		
			<div class="input-group">
					<span class="input-group-addon">
						Student Name:
					</span>
				
					<select name="student_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_employee["student_id"]; ?>"><?php echo $row_employee["firstname"] . " " . $row_employee["lastname"]; ?></option>
						<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
					</select>
				</div>
		
				<div class="input-group">
				<span class="input-group-addon">
					Register Date:
				</span> 
				<input required  placeholder="YYYY-MM-DD" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="reg_date" class="form-control">
				</div>
				<input type="submit" value="Add Memeber" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>