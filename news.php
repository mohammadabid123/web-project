<?php require_once("connect.php"); ?>
<?php
	if(isset($_POST["news_title"])) {
		$news_title = getValue($_POST["news_title"]);
		$news_text = getValue($_POST["news_text"]);
		$news_date = getValue($_POST["news_date"]);
		
		if($_FILES["photo"]["name"] != "") {
			
			$filetype = $_FILES["photo"]["type"];
			if($filetype == "image/jpeg" || $filetype == "image/png" || $filetype == "image/gif") {
				if($_FILES["photo"]["size"] <= 4 * 1024 * 1024) {
					$path = "images/employee/" . time() . $_FILES["photo"]["name"];
					move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
				}
				else {
					header("location:news.php?filesize=incorrect");
					exit();
				}
			}
			else {
				header("location:news.php?filetype=incorrect");
				exit();
			}
		}
		else {
			if($gender == 0) {
				$path = "images/employee/user_m.png";
			}
			else {
				$path = "images/employee/user_f.png";
			}
		}
		

		$result = mysqli_query($con, "INSERT INTO news VALUES (NULL, '$news_title', '$news_text', '$news_date','$path')");
		
		if($result) {
			header("location:news_list.php?add=done");
		}
		else {
			header("location:news.php?error=" . mysqli_error($con));
		}
		
	}
	
?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h1 align = "center">Add News To Database</h1>
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
					News Title:
				</span>
				<input required type="text" name="news_title" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					news_text:
				</span>
				<input required type="text" name="news_text" class="form-control">
			</div>
			
		<div class="input-group">
					<span class="input-group-addon">
								News Date	:
					</span>
					<input value="<?php echo jdate("Y-m-d", "", "", "", "en"); ?>" type="text" name="news_date" class="form-control">
		</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					photo:
				</span>
				<input required type="file" name="photo" class="form-control">
			</div>
			
			<input type="submit" value="Add Class" class="btn btn-info btn-block btn-lg">
		
			</form>
		
		</div>
		
	</div>


<?php require_once("footer.php"); ?>