function record(){
	$.ajax({
		type:'POST',
		dataType:'TEXT',
		url: 'Time_c/record_data',
		success: function(result){
			$(".record_data").html(result);
		}
	});
}
function admin_data(){
	$.ajax({
		type:'POST',
		dataType:'TEXT',
		url: 'Admin_c/admin_data',
		success: function(result){
			$(".admin_data").html(result);
		}
	});
}
function employee_data(){
	$.ajax({
		type:'POST',
		dataType:'TEXT',
		url: 'Employee_c/employee_data',
		success: function(result){
			$(".employee_data").html(result);
		}
	});
}
function add_new_admin(){

}
function add_new_employee(){

}

$(document).ready(function() {

});