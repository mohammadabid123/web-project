<?php require_once("connect.php"); ?>
<?php

	$class1  = mysqli_query($con, "SELECT employee_id, firstname FROM employee ORDER BY firstname ASC"); 
	$row_class1 = mysqli_fetch_assoc($class1);
	
	
	$class2  = mysqli_query($con, "SELECT type_id, type_name FROM   expense_type ORDER BY type_name ASC"); 
	$row_class2 = mysqli_fetch_assoc($class2);
	
	
	
	if(isset($_POST["amount"])) { 
		$employee_id = getValue($_POST["employee_id"]);
		$type_id = getValue($_POST["type_id"]);
		$expense_year = getValue($_POST["expense_year"]);
		$amount = getValue($_POST["amount"]);
		$remark = getValue($_POST["remark"]);
		
		$result = mysqli_query($con, "INSERT INTO expense VALUES (NULL,$employee_id,$type_id,'$expense_year',$amount,'$remark')");
		
		if($result) {
			header("location:expense1_list.php?add=done");
		}
		else {
			header("location:add_expense.php?error=notadd");
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add New Expense </h1>
		</div>
		
		<div class="panel-body">
		
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Could not add new Achievement!
				</div>
			<?php } ?>
		
			<form method="post">
						<div class="input-group">
					<span class="input-group-addon">
						Employee Name:
					</span>
					<select name="employee_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class1["employee_id"]; ?>"><?php echo $row_class1["firstname"];?></option>
						<?php } while($row_class1 = mysqli_fetch_assoc($class1)); ?>
					</select>
				</div>
		
			<div class="input-group">
					<span class="input-group-addon">
						Type Name:
					</span>
					<select name="type_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class2["type_id"]; ?>"><?php echo $row_class2["type_name"];?></option>
						<?php } while($row_class2 = mysqli_fetch_assoc($class2)); ?>
					</select>
			</div>
		<div class="input-group">
					<span class="input-group-addon">
								expense_year	:
					</span>
					<input value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="expense_year" class="form-control">
		</div>
			
			
		
		<div class="input-group">
				<span class="input-group-addon">
					
			amount:
				</span>
				<input required type="number" name="amount" class="form-control">
			</div>
			
			
			
		
		<div class="input-group">
				<span class="input-group-addon">
					
			remark:
				</span>
				<input required type="text" name="remark" class="form-control">
			</div>
			
			
			<input type="submit" value="Add" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>