<?php require_once("connect.php"); ?>
<?php
	
	if(isset($_POST["item_name"])) { 
		$item_name = getValue($_POST["item_name"]);
		$unit = getValue($_POST["unit"]);
		
		$description = getValue($_POST["description"]);
		$quantity = getValue($_POST["quantity"]);
		$remark = getValue($_POST["remark"]);
		
		$result = mysqli_query($con, "INSERT INTO lab VALUES (NULL, '$item_name','$unit','$description','$quantity','$remark')");
		
		if($result) {
			header("location:lab_list.php?add=done");
		}
		else {
			header("location:lab_add.php?error=notadd");
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add New item to  Lab</h1>
		</div>
		
		<div class="panel-body">
		
			<?php if(isset($_GET["error"])) { ?>
				<div class="alert alert-danger">
					Could not add new Subject!
				</div>
			<?php } ?>
		
			<form method="post">
		
			<div class="input-group">
				<span class="input-group-addon">
					Item_name:
				</span>
				<input required type="text" name="item_name" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					Unit:
				</span>
				<input required type="text" name="unit" class="form-control">
			</div>
				
			
			<div class="input-group">
				<span class="input-group-addon">
					Description:
				</span>

				<textarea required type="text" name="description" rows="5" cols="40" class="form-control"></textarea>

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
			
			
			
			
			

			<input type="submit" value="Add New Item" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>