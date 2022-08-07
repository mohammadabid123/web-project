<?php require_once("connect.php"); ?>
<?php
	$stock = mysqli_query($con, "SELECT * FROM stock");
	$row_stock = mysqli_fetch_assoc($stock);
	
	$student = mysqli_query($con, "SELECT student_id, firstname FROM student");
	$row_student = mysqli_fetch_assoc($student);
	
	if(isset($_POST["out_date"])) {
		$item_id = getValue($_POST["item_id"]);
		$student_id = getValue($_POST["student_id"]);
		$out_date = getValue($_POST["out_date"]);
		$quantity = getValue($_POST["quantity"]);
		$remark = getValue($_POST["remark"]);
		
		$result = mysqli_query($con, "INSERT INTO stock_out VALUES (NULL, $item_id, $student_id, '$out_date', $quantity, '$remark')");
		
		if($result) {
			$result = mysqli_query($con, "UPDATE stock SET quantity = quantity - $quantity WHERE item_id = $item_id");
			if($result) {
				header("location:stock_list.php?add=done");
			}
			else {
				header("location:stock_out_add.php?error=notdecrease");
			}
		}
		else {
			header("location:stock_out_add.php?error=notadd");
		}
	}
	
?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1>Stock Out</h1>
		</div>
		
		<div class="panel-body">
		
			<form method="post">
				<div class="input-group">
					<span class="input-group-addon">
						Item:
					</span>
					<select name="item_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_stock["item_id"]; ?>"><?php echo $row_stock["item_name"] ; ?></option>
						<?php } while($row_stock = mysqli_fetch_assoc($stock)); ?>
					</select>
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Student:
					</span>
					<select name="student_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_student["student_id"]; ?>"><?php echo $row_student["firstname"] ; ?></option>
						<?php } while($row_student = mysqli_fetch_assoc($student)); ?>
					</select>
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Date:
					</span>
					<input type="text" name="out_date" class="form-control">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Quantity:
					</span>
					<input type="text" name="quantity" class="form-control">
				</div>
				
				
				<div class="input-group">
					<span class="input-group-addon">
						Remark:
					</span>
					<input type="text" name="remark" class="form-control">
				</div>
				
				<input type="submit" value="Add" class="btn btn-primary">
				
				
			</form>
		
		</div>
	</div>

<?php require_once("footer.php"); ?>