<?php require_once("connect.php"); ?>
<?php

	if(isset($_POST["class_name"])) { 
		$class_name = getValue($_POST["class_name"]);
		$section_name = getValue($_POST["section_name"]);
		$fees = getValue($_POST["fees"]);
		
		$result = mysqli_query($con, "INSERT INTO classes VALUES (NULL, '$class_name', '$section_name', $fees)");
		
		if($result) {
			header("location:class_list.php?add=done");
		}
		else {
			header("location:class_add.php?error=notadd");
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add New Class</h1>
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
					Class Name:
				</span>
				<input required type="text" name="class_name" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Section Name:
				</span>
				<input required type="text" name="section_name" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Class Fees:
				</span>
				<input required type="text" name="fees" class="form-control">
			</div>
			
			<input type="submit" value="Add Class" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>