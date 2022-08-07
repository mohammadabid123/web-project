$(documen t).ready(function() {

	$("#local_menu").change(function() {
		$("#local_form").submit();
	});

	$("a#print").click(function() {
		window.print();
	});

	$("#exchange").blur(function() {
		var net_salary = $("#net_salary").val();
		var exchange = $("#exchange").val();
		var currency = $("#currency").text().trim();
		
		var changed_amount;
		
		if(currency == "AFS") {
			changed_amount = net_salary / exchange;
		}
		else if(currency == "USD") {
			changed_amount = net_salary * exchange;
		}
		
		changed_amount = Math.round(changed_amount);
		
		$("#changed_amount").val(changed_amount);
		
	});

	
	$("a.delete").click(function() {
		var sure = window.confirm("Are you sure you want to delete?");
		if(!sure) {
			event.preventDefault();
		}
	});
	
	
	window.setTimeout(function() {
		$(".alert").slideUp(1000);
	},10000);
	
	/*
	$("#student_heading").click(function() {
		$("#employee_body").slideUp(500);
		$("#student_body").slideDown(1000);
	});
	
	$("#employee_heading").click(function() {
		$("#employee_body").slideDown(1000);
		$("#student_body").slideUp(500);
	});
	*/
	
});