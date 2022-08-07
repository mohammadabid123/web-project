
			
<?php require_once("connect.php"); ?>
<?php
	
	$class  = mysqli_query($con, "SELECT student_id,firstname, lastname FROM student ORDER BY firstname ASC, lastname ASC"); 
	$row_class = mysqli_fetch_assoc($class);
	
	
	$class2  = mysqli_query($con, "SELECT class_id,class_name ,section_name FROM classes"); 
	$row_class2 = mysqli_fetch_assoc($class2);
	


	
	if(isset($_POST["fee_month"])) { 
		$student_id = getValue($_POST["student_id"]);
		$fee_month = getValue($_POST["fee_month"]);
		$class_id = getValue($_POST["class_id"]);
		$fee_amount = getValue($_POST["fee_amount"]);
		$discount = getValue($_POST["discount"]);
		$paid_amount = getValue($_POST["paid_amount"]);
		$paid_year = getValue($_POST["paid_year"]);
		$paid_month = getValue($_POST["paid_month"]);
		$paid_day = getValue($_POST["paid_day"]);
		
		$result = mysqli_query($con, "INSERT INTO student_fee VALUES (NULL,
	
		$student_id,
		$fee_month,
		$class_id,
		$fee_amount
		,$discount,
		$paid_amount,
		$paid_year,
		$paid_month,
		$paid_day)");
		
		if($result) {
			header("location:student_fee_list.php?add=done");
		}
		else {
			header("location:student_fee.php?error=notadd");
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add Fees For Student</h1>
		</div>

			<form method="post">
		
		


			
			<div class="input-group">
					<span class="input-group-addon">
						Student Name:
					</span>
					<select name="student_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class["student_id"]; ?>"><?php echo $row_class["firstname"];?><?php echo $row_class["lastname"];?></option>
						<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
					</select>
				</div>
			<div class="input-group">
				<span class="input-group-addon">
					fee_month:
				</span>
				<input required type="number" name="fee_month" class="form-control">
			</div>
			
			
			
			<div class="input-group">
					<span class="input-group-addon">
						Class Name:
					</span>
					<select name="class_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class2["class_id"]; ?>"><?php echo $row_class2["class_name"];?></option>
						<?php } while($row_class = mysqli_fetch_assoc($class2)); ?>
					</select>
				</div>
				
			<div class="input-group">
				<span class="input-group-addon">
					fee_amount:
				</span>
				<input required type="number" name="fee_amount" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					discount:
				</span>
				<input required type="number" name="discount" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					paid_amount:
				</span>
				<input required type="number" name="paid_amount" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					paid_year:
				</span>
				<input required type="number" name="paid_year" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					paid_month:
				</span>
				<input required type="number" name="paid_month" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					paid_day:
				</span>
				<input required type="number" name="paid_day" class="form-control">
			</div>
			<input type="submit" value="Add" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>
<?php require_once("footer.php"); ?>