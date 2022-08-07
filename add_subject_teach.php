<?php require_once("connect.php"); ?>
<?php
	$sub = mysqli_query($con, "SELECT  subject_id, subject_name  FROM  subject ORDER BY  subject_name ASC"); 
	$row_sub = mysqli_fetch_assoc($sub);
	
	$employee = mysqli_query($con, "SELECT  employee_id , firstname, lastname FROM  employee  where employee_type = 1 ORDER BY firstname ASC, lastname ASC"); 
	$row_employee = mysqli_fetch_assoc($employee);
	
	if(isset($_POST["teach_year"])) {
		$subject_id= getValue($_POST["subject_id"]);
		$employee_id= getValue($_POST["employee_id"]);
		$teach_year= getValue($_POST["teach_year"]);
		$remark= getValue($_POST["remark"]);
		$result = mysqli_query($con, "INSERT INTO subject_teach VALUES ($subject_id, $employee_id,'$teach_year','$remark')");
		
		if($result) {
			
			header("location:exam_list.php?add=INSERTED");
		}
		else {
			header("location:add_subject_teach.php?error=" . mysqli_error($con));
		}
	}
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-success">
	
	<div class="panel-heading">
		<h1 align = "center">Add New Teaches</h1>
	</div>
	
	<div class="panel-body">
		
		<form class="form" method="post" enctype="multipart/form-data">

		<div class="input-group">
					<span class="input-group-addon">
						Subject Name:
					</span>
					<select name="subject_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_sub["subject_id"]; ?>"><?php echo $row_sub["subject_name"]; ?></option>
						<?php } while($row_sub = mysqli_fetch_assoc($sub)); ?>
					</select>
			</div>
			
			
			
			<div class="input-group">
					<span class="input-group-addon">
						Teacher Name:
					</span>
					<select name="employee_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_employee["employee_id"]; ?>"><?php echo $row_employee["firstname"] . " " . $row_employee["lastname"]; ?></option>
						<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
					</select>
			</div>

			<div class="input-group">
				<span class="input-group-addon">
					teach_year:
				</span> 
				<input required  placeholder="YYYY-MM-DD" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="teach_year" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					Remark:
				</span> 
				<input required type="text" name="remark" class="form-control">
			</div>

			

			
			
			
			

		
			<input type="submit" value="Add" class="btn btn-info btn-block btn-lg">
			
		</form>
	
	</div>
	
</div>

<?php require_once("footer.php"); ?>