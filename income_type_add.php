<?php require_once("connect.php"); ?>
<?php
	if(isset($_POST["type_name"])) {
		$type_id	 = getValue($_POST["type_id	"]);
		$type_name = getValue($_POST["type_name"]);

		$result = mysqli_query($con, "INSERT INTO income_type VALUES (NULL, '$type_name')");
		
		if($result) {
			
			header("location:income_type_list.php?add=INSERTED");
		}
		else {
			header("location:income_type_add.php?error=" . mysqli_error($con));
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-success">
	
	<div class="panel-heading">
		<h1 align = "center">Add New Income Type</h1>
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
					Type Name:  
				</span>
				<input required type="text" name="type_name" class="form-control">
			</div>
			
			<input type="submit" value="Add Employee" class="btn btn-info btn-block btn-lg">
			
		</form>
	
	</div>
	
</div>

<?php require_once("footer.php"); ?>