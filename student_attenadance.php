<?php require_once("connect.php"); ?>
<?php

	if(isset($_GET["absent_year"])) { 
		$year = getValue($_GET["absent_year"]);
		$month = getValue($_GET["absent_month"]);
	}
	else {
		$year = jdate("Y", "", "", "", "en");
		$month = jdate("m", "", "", "", "en");
	}

	$attendance = mysqli_query($con, "SELECT *, CONCAT_WS('-', absent_year,
	
	absent_month,absent_day) AS absent_date, SUM(absent_hour) AS total FROM 
	
	student_attendance INNER JOIN student ON student.student_id = 
	
	student_attendance.student_id WHERE absent_year = $year AND absent_month
	
	= $month GROUP BY student_attendance.student_id ORDER BY student.student_id 
	ASC");
	$row_attendance = mysqli_fetch_assoc($attendance); 
	$totalRows_attendance = mysqli_num_rows($attendance);	
	
?>
<?php require_once("top.php"); ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<a href="student_attendance_add.php" class="pull-right btn btn-info">
				<span class="glyphicon glyphicon-plus"></span>
				Add Absent
			</a>
			<h1>Employee Attendance
				<small style="color:white;">
					(
					<?php echo $year; ?>  - 
					<?php echo $month; ?>
					)
				</small>
			</h1>
		</div>
		
		<div class="panel-body">
		 	
			<form method="get">
			
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
				<div class="input-group">
					<span class="input-group-addon">
						Year:
					</span>
					<select name="absent_year" class="form-control">
						<?php
							$end = jdate("Y", "", "", "", "en");
							$start = 1393;
							for($x=$end; $x>=$start; $x--) { ?>
								<option><?php echo $x; ?></option>
						<?php } ?>
					</select>
				</div>
				
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				
				<div class="input-group">
					<span class="input-group-addon">
						Month:
					</span>
					<select name="absent_month"  class="form-control">
						<option value="1">Hamal</option>
						<option value="2">Sawr</option>
						<option value="3">Jawza</option>
						<option value="4">Saratan</option>
						<option value="5">Sonbola</option>
						<option value="6">Asad</option>
						<option value="7">Mizan</option>
						<option value="8">Aqrab</option>
						<option value="9">Qaws</option>
						<option value="10">Jadi</option>
						<option value="11">Dalw</option>
						<option value="12">Hoot</option>
					</select>
					
					<span class="input-group-btn">
						<input type="submit" value="Show" class="btn btn-primary">
					</span>
					
				</div>
				
				</div>
				
			</form>
			
			<div class="clearfix"></div>
			
			<?php if($totalRows_attendance > 0) { ?>
			
			<table class="table table-striped">
				<tr>	
					<th>Serious Number</th>
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Photo</th>
					<th>Absent Hour</th>
					<th>Detail</th>
				</tr>
				
				<?php $x=1;  do { ?>
				<tr>
					<td><?php echo $x++; ?></td>
					<td><?php echo $row_attendance["student_id"]; ?></td>
					
					<td><?php echo $row_attendance["firstname"]; ?></td>
					<td><?php echo $row_attendance["fathername"];?></td>

					
					<td><?php echo $row_attendance["total"]; ?> hours</td>
					<td>
						<a href="student_attendance_detail.php?student_id=<?php echo $row_attendance["student_id"]; ?>&year=<?php echo $year; ?>&month=<?php echo $month; ?>">
							<span class="glyphicon glyphicon-list"></span>
						</a>
					</td>
				</tr>
				<?php } while($row_attendance = mysqli_fetch_assoc($attendance)); ?>
				
			</table>
			
			<?php } else { ?>
				
				<div class="alert alert-warning">
					<h2 class="text-center">There is no data available!</h2>
				</div>
			
			<?php } ?>
		</div>
	</div>

<?php require_once("footer.php"); ?>