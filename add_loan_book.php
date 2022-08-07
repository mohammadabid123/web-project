<?php require_once("connect.php"); ?>
<?php
	$class  = mysqli_query($con, "SELECT student_id, firstname, lastname FROM  student ORDER BY firstname ASC, lastname ASC"); 
	$row_class = mysqli_fetch_assoc($class);
	
	$class1  = mysqli_query($con, "SELECT book_id, isbn, book_name FROM  lib_book ORDER BY isbn ASC, book_name ASC"); 
	$row_class1 = mysqli_fetch_assoc($class1);
	
	
	if(isset($_POST["student_id"])) { 
		$loan_id = getValue($_POST["loan_id"]);
		$student_id = getValue($_POST["student_id"]);
		$book_id = getValue($_POST["book_id"]);
		$loan_date = getValue($_POST["loan_date"]);
		$return_date = getValue($_POST["return_date"]);
		$surcharge = getValue($_POST["surcharge"]);
		
		$result = mysqli_query($con, "INSERT INTO lib_loan VALUES (NULL,$student_id ,$book_id,'$loan_date','$return_date',$surcharge)");
		
		if($result) {
			header("location:loan_list.php?add=done");
		}
		else {
			header("location:add_locan_book.php?error=notadd");
		}
	}

?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add New Loan </h1>
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
					Student Name:
					</span>
					<select name="student_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class["student_id"]; ?>"><?php echo $row_class["firstname"] . " " . $row_class["lastname"]; ?></option>
						<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
					</select>
			</div>
			
			
			<div class="input-group">
					<span class="input-group-addon">
					Book Name:
					</span>
					<select name="book_id" class="form-control">
						<?php do { ?>
							<option value="<?php echo $row_class1["book_id"]; ?>"><?php echo $row_class1["book_name"]; ?></option>
						<?php } while($row_class1 = mysqli_fetch_assoc($class1)); ?>
					</select>
			</div>
			
			

			
			
			<div class="input-group">
				<span class="input-group-addon">
					loan_date:
				</span> 
				<input required  placeholder="YYYY-MM-DD" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="loan_date" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					return_date:
				</span> 
				<input required  placeholder="YYYY-MM-DD" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}$" value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="return_date" class="form-control">
			</div>
			
			
		<div class="input-group">
				<span class="input-group-addon">
					Surcahrage:
				</span> 
				<input required type="number" name="surcharge" class="form-control">
		</div>
			
			

			
			
			<input type="submit" value="Add Subject" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>