<?php require_once("connect.php"); ?>
<?php


	$condition = "";
	if(isset($_GET["q"])) {
		$q = getValue($_GET["q"]);
		$by = getValue($_GET["by"]);
		
		if($by == "employee_type") {
			if(strtolower($q) == "staff") {
				$q = "0";
			}
			else if(strtolower($q) == "teacher") {
				$q = "1";
			}
		}
		
		$operator = " = ";
		if($by == "firstname" || $by == "position" || $by == "phone") {
			$operator = " LIKE ";
			$value = " '%$q%' ";
		}
		else {
			$value = "'" . $q . "'";
		}
		
		$condition = " WHERE $by $operator $value ";
		
	}
	
	$employee = mysqli_query($con, "SELECT * FROM employee $condition ORDER BY firstname ASC"); 
	$row_employee = mysqli_fetch_assoc($employee);
	$totalRows_employee = mysqli_num_rows($employee);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">

	<div class="panel-heading">
		<?php if(isset($_GET["q"])) { ?>
		<a href="employee_list.php" class="btn btn-info pull-right">
		
			View All Employee
		</a>
		<?php } ?>
		
		<a id="print" href="#" class="btn btn-info pull-right noprint">
			<span class="glyphicon glyphicon-print"></span>
			Print
		</a>
		
		<h1 align = "center">Employee List</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["delete"]) && $_GET["delete"] == "done") { ?>		
			<div class="alert alert-success">
				Selected employee has been successfully Deleted!
			</div>
		<?php } ?>
		
		
		<?php if(isset($_GET["edit"])) { ?>		
			<div class="alert alert-success">
				Selected employee has been successfully updated!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["delete"]) && $_GET["delete"] == "failed") { ?>		
			<div class="alert alert-danger">
				Error! Could not delete employee!
			</div>
		<?php } ?>
	
	
		<div class="panel panel-default panel-body">
		
			<form method="get" class="noprint">
			
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="input-group">
						<span class="input-group-addon">
							Keyword:
						</span>
						<input  value="<?php if(isset($_GET["q"])) echo $_GET["q"]; ?>" type="text" name="q" class="form-control">
					</div>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="input-group">
						<span class="input-group-addon">
							By:
						</span>
						<select name="by" class="form-control">
							<option <?php if(isset($_GET["by"]) && $_GET["by"] == "employee_id") echo "selected"; ?> value="employee_id">ID</option>
							<option <?php if(isset($_GET["by"]) && $_GET["by"] == "firstname") echo "selected"; ?> value="firstname">Name</option>
							<option <?php if(isset($_GET["by"]) && $_GET["by"] == "position") echo "selected"; ?> value="position">Position</option>
							<option <?php if(isset($_GET["by"]) && $_GET["by"] == "phone") echo "selected"; ?> value="phone">Phone</option>
							<option <?php if(isset($_GET["by"]) && $_GET["by"] == "employee_type") echo "selected"; ?> value="employee_type">Type</option>
						</select>
			<span class = "input-group-btn">
			<button   class = "btn btn-info" type = "submit">
			<span class ="glyphicon glyphicon-search"></span>
			</button>
			</span>
						
					</div>
				</div>
				
				<div class="clearfix"></div>
				
			</form>
		</div>
	
		<b>Total Result Found: 
			<?php echo $totalRows_employee; ?>
		</b>
	
	
		<?php if($totalRows_employee > 0) { ?>
	
		
		<div class="table-responsive">
	
		<table class="table table-striped">
			<tr>
				<th>Serious Nnumber</th>
				<th>ID</th>
				<th>Name</th>
				<th>Position</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Type</th>
				<th>Photo</th>
				<th class="noprint">Edit</th>
				<th class="noprint">Delete</th>
			</tr>
			
			<?php $x=1; do { ?>
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $row_employee["employee_id"]; ?></td>
				<td><?php echo $row_employee["firstname"]; ?> <?php echo $row_employee["lastname"]; ?></td>
				<td><?php echo $row_employee["position"]; ?></td>
				<td><?php echo $row_employee["email"]; ?></td>
				<td><?php echo $row_employee["phone"]; ?></td>
				<td><?php echo $row_employee["employee_type"]==0 ? "Staff" : "Teacher"; ?></td>
				<td><img src="<?php echo $row_employee["photo"]; ?>" width="40" class="img-circle"></td>
				<td  class="noprint">  
					<a href="employee_edit.php?employee_id=<?php echo $row_employee["employee_id"]; ?>">
						<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				<td class="noprint">
					<a class="delete" href="employee_delete.php?employee_id=<?php echo $row_employee["employee_id"]; ?>">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
			
		</table>
	
		</div>
		
		<?php } else { ?>
		
			<div class="alert alert-warning">
				<h2 class="text-center">Not Found!</h2>
			</div>
		
		<?php } ?>
	
	</div>

</div>

<?php require_once("footer.php"); ?>