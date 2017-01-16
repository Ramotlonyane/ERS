$(document).ready(function(){
	$error = $('<center><h2 class = "text-danger">You are not an Employee here...<h2></center>');
	$error1 = $('<center><h2 class = "text-danger">Please fill up the field<h2></center>');
	$('#login').click(function(){
		$error.remove();
		$error1.remove();
		$employee = $('#employee').val();
		if($employee == ""){
			$error1.appendTo('#error');
		}else{	
			$.post('index.php/Front_controller/check_employee_id', {employee: $employee},
				function(show){
					if(show == 'Success'){
						$.ajax({
							type: 'POST',
							dataType: 'json',
							url: 'index.php/Front_controller/login',
							data: {
								employee: $employee
							},
							success: function(result){
								//debugger;
								if (result.timein == true) {

									$result = $('<h2 class = "text-success">You have been login:</h2>' + result.name).appendTo('#result');
									$('#employee').val('');
									setTimeout(function(){
										$result.remove();
									}, 10000);

								}else{

									$result = $('<h2 class = "text-danger">You have been logout:</h2>' + result.name).appendTo('#result');
									$('#employee').val('');
									setTimeout(function(){
										$result.remove();
									}, 10000);

								}
							}
						});
					}else{
						$('#employee').val('');
						$error.appendTo('#error');
					}
				}
			)
		}	
	});
});