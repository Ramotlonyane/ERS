			<div class = "modal fade" id = "add_employee" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-primary">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Add new Emploee</h4>
						</div>
						<form method = "POST" action = "save_student_query.php" enctype = "multipart/form-data">
							<div class  = "modal-body">
								<div class = "form-group">
									<label>Employee ID:</label>
									<input type = "text" name = "student_no" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Firstname:</label>
									<input type = "text" name = "firstname" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Middlename:</label>
									<input type = "text" name = "middlename" placeholder = "(Optional)" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Lastname:</label>
									<input type = "text" name = "lastname" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Course</label>
									<input type = "text" name = "course" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Yr&Section</label>
									<input type = "text" name = "section" required = "required" class = "form-control" />
								</div>
							</div>
							<div class = "modal-footer">
								<button  class = "btn btn-primary" name = "save"><span class = "glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class = "modal fade" id = "delete_employee" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content ">
						<div class = "modal-body">
							<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
							<br />
							<center><a class = "btn btn-danger remove_id" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
						</div>
					</div>
				</div>
			</div>
			<div class = "modal fade" id = "edit_student" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-warning">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Edit Employee</h4>
						</div>
						<div id = "edit_query"></div>
					</div>
				</div>
			</div>
			<div class="the-employee-message"></div>
			<div class = "well col-lg-12">
				<button class = "btn btn-success" type = "button" href = "#" id="hide_employee_account"><span class = "glyphicon glyphicon-plus"></span> Add new </button>
				<br />
				<br />
				<table id = "table_employee" class = "table table-bordered">
					<thead class = "alert-info">
						<tr>
							<th>Employee ID</th>
							<th>Persal Number</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Directorate</th>
							<th>Component</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($employeedata as $row): ?>
							<tr>
								<td><?php echo $row->id; ?></td>
								<td><?php echo $row->persal_number; ?></td>
								<td><?php echo $row->firstname; ?></td>
								<td><?php echo $row->lastname; ?></td>
								<td><?php echo $row->directorate; ?></td>
								<td><?php echo $row->component; ?></td>
								<td><a class = "btn btn-danger remployee_id" name = "<?php echo $row->id?>" href = "#" data-toggle = "modal" data-target = "#delete_employee"><span class = "glyphicon glyphicon-remove"></span></a> <a class = "btn btn-warning  e_employee_id" name = "<?php echo $row->id?>" href = "#" data-toggle = "modal" data-target = "#edit_student"><span class = "glyphicon glyphicon-edit"></span></a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<br />
			<br />	
			<br />
<script type = "text/javascript">
		$(document).ready(function(){
			$('#table_employee').DataTable();
		});
</script>
<script type="text/javascript">
	$('#hide_employee_account').on('click', function(){ 
		$('.show_new_admin').hide();
		$('.show_new_employee').show();
		$('.nav-pills a[href="#new_employee"]').tab('show');
	});

	$(document).ready(function(){
		$('.remployee_id').click(function(){
			var id = $(this).attr('name');
				$('.remove_id').click(function(){
					$.ajax({
					type:'POST',
					dataType:'TEXT',
					url: 'Employee_c/delete_employee/'+id,
					data:{id:id},
					success: function(result){

						$('#delete_employee').remove();
						$('.modal-backdrop').remove();
						$(".employee_data").html(result);

						$('.the-employee-message').append('<div class="alert alert-success">' +
                        '<span class="glyphicon glyphicon-ok"></span>' +
                        ' Employee Deleted Successfully!!!' +
                        '</div>');

                        setTimeout(function(){
                           $('.alert-success').hide();
                        }, 3000);

					}
				});
			});
		});
	});
</script>