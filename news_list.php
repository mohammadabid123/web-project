<?php require_once("connect.php"); ?>
<?php

			
	$class = mysqli_query($con, "SELECT * FROM news ORDER BY news_id ASC");
	$row_class = mysqli_fetch_assoc($class);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-info">

	<div class="panel-heading">

		<h1 align = "center">News List</h1>
	</div>
	
	<div class="panel-body">
	
 	
		<table class="table table-striped">
			<tr>
				<th>news_id	</th>
				<th>news_title</th>
				<th>news_text</th>
				<th>news_date</th>
			</tr>
			
			<?php do { ?>
			<tr>
				<td><?php echo $row_class["news_id"]; ?></td>
				<td><?php echo $row_class["news_title"]; ?></td>
				<td><?php echo $row_class["news_text"]; ?></td>
				<td><?php echo $row_class["news_date"]; ?></td>
				
			</tr>
			<?php } while($row_class = mysqli_fetch_assoc($class)); ?>
			
		</table>
	
	
	</div>
	
</div>





<?php require_once("footer.php"); ?>