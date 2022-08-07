<?php

if(!isset($_SESSION)){
	session_start();
}


?>
<!DOCTYPE html>  
<html>
<head> 
	<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">
	<link rel = "stylesheet" type = "text/css" href = "css/bootstrap-theme.min.css">
	<link rel = "stylesheet" type = "text/css" href = "css/q.css">
	
	
	<script type = "text/javascript" src = "js/jquery.min.js"></script>
	<script type = "text/javascript" src = "js/bootstrap.min.js"></script>
	<script type = "text/javascript" src = "js/script.js"></script>
	<title> Private School MIS</title>
	<meta name = "viewport" content = " width = device-width,initail-scale = 1.0">
	<meta charset = "utf8">
</head>
<body>
<div class = "container" >
	<div id = "banner">
	<a href = "employee_login.php" id = "log" class = "pull-right">
	<span class = "glyphicon glyphicon-log-in"></span>
		Login To Employee
	</a>
	<a href = "student_login.php" id = "log" class = "pull-right">
	<span class = "glyphicon glyphicon-log-in"></span>
		Login To Student
	</a>
	<div id = "logo" class = "col-lg-2 col-md-2 col-sm-2 col-xs-12" >
	<img src = "images/9.png" class = "img-responsive">
	</div>
	<h1 id = "title" class = "col-lg-7 col-md-7   col-sm-7 col-xs-12"> Rahmaty Private School MIS</h1>
	<div id = "search" class = "clearfix" class = "col-lg-3  col-md-3  col-sm-3  col-xs-12" >
		<form  id = "f" method = "get">
		<div class = "input-group">
			<span class = "input-group-addon">
				Search:
			</span>
			<input type = "text" placeholder = "Enter your Search:" class = "form-control input-md">
			<span class = "input-group-btn">
			<button   class = "btn btn-info" type = "submit">
			<span class ="glyphicon glyphicon-search"></span>
			</button>
			</span>
		</div>
		</form>
	</div>
	</div>
	
	<div id="nav" class="noprint">
		
		<nav class="navbar navbar-default" role="navigation" style="margin-bottom:0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
            	<?php if(isset($_SESSION["employee_id"])) { ?>
				<ul class="nav navbar-nav" id="nav-top">
                	<li><a href="#">Home</a></li>
					
                	<li class="dropdown"><a href="#" data-toggle="dropdown">Employee<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="employee_add.php">Add New Employee</a></li>
							<li><a href="employee_list.php">Employee List</a></li>
							<li><a href="employee_attendance.php">Add Employee Attendance</a></li>
							<li><a href="employee_overtime_add.php">Employee Overtime</a></li>
							<li><a href="emp_overtime_list.php">Employee Overtime List</a></li>
							<li><a href="employee_salary.php">Employee Salary</a></li>
							<li><a href="employee_achievement_add.php"> ADD Employee Achievement</a></li>
							<li><a href="employee_achievement_list.php">List of Employee Achievement</a></li>
							<li><a href="Add_emp_resion.php">Add Resion Employee</a></li>
							<li><a href="emp_resion_list.php">List Of Resion Employee</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Student<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="student_add.php">Add New Student</a></li>
							<li><a href="student_list.php">Student List</a></li>
							<li><a href="student_add_relative.php">Student Relative</a></li>
							<li><a href="student_attenadance.php">Student Attendance</a></li>
							<li><a href="add_score.php"> Add Score</a></li>
							<li><a href="score_list.php"> Score List</a></li>
							<li><a href = "student_achievement_add.php">Student Achievement</a></li>
							<li><a href = "student_transfer_add.php">Add Student Transfer Info</a></li>
							<li><a href = "student_transfer_list.php">Student Transfer Info List</a></li>
							<li><a href = "student_fee.php">Add Student Fees </a></li>
							<li><a href = "student_fees_list.php"> Student Fees List </a></li>
							
							<li><a href = "add_exam.php">Add Exam</a></li>
							<li><a href = "Student_Add_transport.php">Add Student Transport Info</a></li>
							<li><a href = "Student_transport_list.php">Add Student Transport Info List</a></li>
						</ul>
					</li>
					<li class = "dropdown"><a href = "#" data-toggle = "dropdown">Class<span class = "caret"></span></a>
						<ul class = "dropdown-menu">
							<li><a href = "class_add.php">Add New Class </a></li>
							
							<li><a href = "class_list.php"> Class List </a></li>
							<li><a href = "subject_add.php"> Add New Subject </a></li>
							<li><a href = "subject_list.php">Subject List</a></li>
							<li><a href = "add_subject_teach.php">Add Subject Teaches</a></li>
							<li><a href = "subject_list_teach.php"> Subject Teache List</a></li>
						</ul>

					
					
					
					
					
					
					
					<li class = "dropdown"><a href = "#" data-toggle = "dropdown">Inventory<span class = "caret"></span></a>
						<ul class = "dropdown-menu">
							<li><a href = "lib_add.php"> Add to Library </a></li>
							<li><a href = "lib_list.php"> Book List Of Library </a></li>
							<li><a href = "lib_add_member.php"> Add Student to  Library </a></li>
							<li><a href = "lib_member_list.php">  Memeber  List in Library </a></li>
							<li><a href = "add_loan_book.php">  Add  loan for Library </a></li>
							<li><a href = "loan_list.php"> loan  List for Library </a></li>
							<li><a href ="lab_add.php" > Add New Items to Laboratoary</a></li>
							<li><a href ="lab_list.php" >List of Lab Items</a></li>
						</ul>
					</li>
					<li class = "dropdown"><a href = "#" data-toggle = "dropdown">Finance<span class = "caret"></span></a>
						<ul class = "dropdown-menu">
							<li><a href = "Add_income.php">Add Income</a></li>
							<li><a href = "income_type_add.php">Add Income Type</a></li>
							<li><a href = "income_type_list.php">Income Type List</a></li>
							<li><a href = "add_expense.php">Add Expense  </a></li>
							<li><a href = "expense1_list.php">Expense  List </a></li>
							<li><a href = "add_expense_type.php">Add Expense type </a></li>
							<li><a href = "expense_list.php">Expense type List </a></li>
						</ul>
					</li>
					<li class = "dropdown"><a href  = "#" data-toggle = "dropdown">User Account<span class = "caret"></span></a>
						<ul class = "dropdown-menu">
							<li><a href = "user_add.php">Add New User</a></li>
							<li><a href = "user_list.php">User List</a></li>
						</ul>
					
					</li>
					<li class = "dropdown"><a href = "#" data-toggle = "dropdown">Report<span class = "caret"></span></a>
						<ul class = "dropdown-menu">
							<li><a href = "report_salary.php">Salary Report</a></li>
						</ul>
					</li>
				<li class = "dropdown"><a data-toggle = "dropdown" href = "#">News<span class = "caret"></span></a>
						<ul class = "dropdown-menu">
							<li><a href = "news.php">Add New News to Database </a></li>
							<li><a href = "news_list.php">News List</a></li>
						</ul>
				</li>
				</ul>
				<?php } else{ ?>
			
				<ul class="nav navbar-nav" id="nav-top">
                	<li><a href="top.php">Home</a></li>

					
			
					
					<li><a href = "contact.php">Contact</a></li>
				</ul>
				<?php } ?>
				
			</div>
		</nav>	
	</div>
	<div id = "sidebar" class = "col-lg-3  col-md-3  col-sm-3  col-xs-12"></div>
	<div id  = "content" class = "col-lg-9  col-md-9  col-sm-9 col-xs-12">
	