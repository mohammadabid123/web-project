<?php require_once("connect.php"); ?>
<?php

			
			
	if(isset($_POST["book_name"])) { 
		$isbn = getValue($_POST["isbn"]);
		$book_name = getValue($_POST["book_name"]);
		$author	 = getValue($_POST["author"]);
		$edition = getValue($_POST["edition	"]);
		$category = getValue($_POST["category"]);
		
		$result = mysqli_query($con, "INSERT INTO lib_book VALUES (NULL,'$isbn','$book_name','$author','$edition','$category')");
		
		if($result) {
			header("location:lib_list.php?add=done");
		}
		else {
			header("location:lib_add.php?error=notadd");
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add To library the book</h1>
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
					ISBN  Number:
				</span>
				<input required type="text" name="isbn" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					book_name:
				</span>
				<input required type="text" name="book_name" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					author Name:
				</span>
				<input required type="text" name="author" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					edition:
				</span>
				<input required type="text" name="edition" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					category:
				</span>
				<input required type="text" name="category" class="form-control">
			</div>
			<input type="submit" value="Add Book" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>