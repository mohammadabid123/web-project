<?php require_once("connect.php"); ?>
<?php
			
	$class  = mysqli_query($con, "SELECT employee_id, firstname FROM employee ORDER BY firstname ASC"); 
	$row_class = mysqli_fetch_assoc($class);
			
			
	if(isset($_POST["resign_reason"])) {
		$employee_id = getValue($_POST["employee_id"]);
		$resign_date = getValue($_POST["resign_date"]);
		$resign_reason = getValue($_POST["resign_reason"]);
		$result = mysqli_query($con, "INSERT INTO emp_resign VALUES (NULL, $employee_id, '$resign_date', '$resign_reason')");
		
		if($result) {
			
			header("location:emp_resion_list.php?add=INSERTED");
		}
		else {
			header("location:Add_emp_resion.php?error=" . mysqli_error($con));
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-success">
	
	<div class="panel-heading">
		<h1 align = "center">Add New Resion Of Employee</h1>
	</div>
	
	<div class="panel-body">
		
		<form class="form" method="post" enctype="multipart/form-data">

			
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Sorry! Could not add new Resion employee! Please try again!
					<br>
					<?php echo $_GET["error"]; ?>
				</div>
			<?php } ?>

			
			
			
				<div class="input-group">
					<span class="input-group-addon">
						Employee:
					</span>
					<select name="employee_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class["employee_id"]; ?>"><?php echo $row_class["firstname"];?></option>
						<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
					</select>
				</div>
		
			
			<div class="input-group">
				<span class="input-group-addon">
					Resign Date:
				</span> 
				<input required  placeholder="YYYY-MM-DD" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="resign_date" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Reason:
				</span>
				<input required type="text" name="resign_reason" class="form-control">
			</div>
			

		
			<input type="submit" value="Add" class="btn btn-info btn-block btn-lg">
			
		</form>
	
	</div>
	
</div>

<?php require_once("footer.php"); ?>