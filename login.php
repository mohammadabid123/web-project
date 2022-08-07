<?php 
	if(isset($_POST["username1"])){
		$u = $_POST["username1"];
		$p= $_POST["password1"];
		$result = mysqli_query($con,"SELECT * FROM employee users username1 = '$u' AND password1 = '$p'");
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			$_SESSION["employee_id"] = $row["employee_id"];
			header("location:employee_home.php");
		}
		else{
			header("location:login.php?login=false!");}
	}
?>
<?php
require_once("top.php");?>
<div class = "panel panel-primary">
<div class = "panel-heading" id = "employee_heading" >
<h1 class = "text-center">  Employee can Login</h1>
</div>
<div class = "panel-body" id ="employee_body">
<div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-sx-offset-0">
	<?php if(isset($_GET["login"])) { ?>
			<div class = "alert alert-danger">
			<button  data-dismiss = "alert" area-hidden = "true" class = "close" > close </button>
				Incorect Username or Password!
		  </div>
	<?php } ?>
	<form method = "post" action = "login.php">
		<div class = "input-group">
		<span class = "input-group-addon">
			Username:
		</span>
		<input type = "text" name = "username1"  placeholder = "Enter Your Username:" class = "form-control input-lg" required>
		</div>
		<div class = "input-group">
		<span class = "input-group-addon">
			
		Password:
		</span>
		<input type = "password" name = "password1" class = "form-control input-lg" placeholder = "Enter Your Password:" required>
		
		</div>
		<input type = "submit" value = " Login" class = "btn btn-primary  btn-block btn-lg  btn-outline-info"" >
</form>
</div>

</div>


</div>
