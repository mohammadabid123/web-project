<?php require_once("connect.php"); ?>
<?php

	$employee = mysqli_query($con, "SELECT item_id, item_name	FROM stock ORDER BY item_name ASC"); 
	$row_employee = mysqli_fetch_assoc($employee);
	if(isset($_POST["source"])) {
		$source = getValue($_POST["source"]);
		$item_id = getValue($_POST["item_id"]);
		$in_date = getValue($_POST["in_date"]);
		$quantity = getValue($_POST["quantity"]);
		$remark = getValue($_POST["remark"]);
		$result = mysqli_query($con, "INSERT INTO student VALUES (NULL, '$source', $item_id, $in_date,$quantity ,'$remark')");
		
		if($result) {
			
			header("location:stock_list.php.php?add=INSERTED");
		}
		else {
			header("location:stock_in_add.php?error=" . mysqli_error($con));
		}}
?>
<?php require_once("top.php"); ?>

<div class="panel panel-success">
	
	<div class="panel-heading">
		<h1 align = "center">Add New Items To Stack</h1>
	</div>
	<div class="panel-body">
		<form class="form" method="post" enctype="multipart/form-data">

			
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Sorry! Could not add new employee! Please try again!
					<br>
					<?php echo $_GET["error"]; ?>
				</div>
			<?php } ?>
			
			

			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<div class="input-group">
				<span class="input-group-addon">
					Source:
				</span> 
				<input required type="text" name="source" class="form-control">
			</div>


			
				<div class="input-group">
					<span class="input-group-addon">
						Item Name:
					</span>
				
					<select name="item_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_employee["item_id"]; ?>"><?php echo $row_employee["item_name"]; ?></option>
						<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
					</select>
				</div>
				
				
			<div class="input-group">
				<span class="input-group-addon">
					IN_Date:
				</span> 
				<input required  placeholder="YYYY-MM-DD" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="in_date" class="form-control">
			</div>

			
			<div class="input-group">
				<span class="input-group-addon">
					Quantity:
				</span> 
				<input required type="number" name="quantity" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Remark:
				</span> 
				<input required type="text" name="remark" class="form-control">
			</div>
			<input type="submit" value="Add New Employee" class="btn btn-info btn-block btn-lg">
			
		</form>
	
	</div>
	
</div>

<?php require_once("footer.php"); ?>