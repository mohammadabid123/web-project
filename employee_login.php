<?php
	require_once("connect.php");
	
	if(isset($_POST["username"])) {
		$username = getValue($_POST["username"]);	
		$password = getValue($_POST["password"]);
		
		$result = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password=PASSWORD('$password')");
		if(mysqli_num_rows($result) == 1) {
			$row_result = mysqli_fetch_assoc($result);
			$_SESSION["employee_id"] = $row_result["employee_id"];
						
			header("location:employee_home.php");
		}
		else {
			header("location:employee_login.php?login=failed");
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-primary">
	
	<div class="panel-heading" id="employee_heading">
		<h1 class="text-center">Employee to Login</h1>
	</div>
	
	<div class="panel-body" id="employee_body">
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">
		
			<?php if(isset($_GET["login"])) { ?>
				<div class="alert alert-danger">
					<button data-dismiss="alert" area-hidden="true" class="close">&times;</button>
					Incorrect Username or Password!
				</div>
			<?php } ?>
		
		<form method="post">
			<div class="input-group">
				<span class="input-group-addon">
					Username:
				</span>
				<input type="text" name="username" class="form-control" placeholder = "Enter Your Username:" class = "form-control input-lg" required>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Password:
				</span>
				<input type="password" name="password" class="form-control"placeholder = "Enter Your Password:" class = "form-control input-lg" required>
			</div>
			
			<input type="submit" value="Login" class = "btn btn-primary  btn-block btn-lg  btn-outline-info">
		</form>
		
		</div>
		
	</div>
	
</div>
