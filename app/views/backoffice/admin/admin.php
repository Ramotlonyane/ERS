			<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-primary">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Add new Admin</h4>
						</div>
						<form method = "POST" action = "save_admin_query.php" enctype = "multipart/form-data">
							<div class  = "modal-body">
								<div class = "form-group">
									<label>Username:</label>
									<input type = "text" required = "required" name = "username" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Password:</label>
									<input type = "password" maxlength = "12" required = "required" name = "password" class = "form-control" />
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
							</div>
							<div class = "modal-footer">
								<button  class = "btn btn-primary" name = "save"><span class = "glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class = "modal fade" id = "delete_admin" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content ">
						<div class = "modal-body">
							<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
							<br />
							<center><a class = "btn btn-danger delete_admin" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
						</div>
					</div>
				</div>
			</div>
			<div class = "modal fade" id = "edit_admin" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-warning">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Edit Admin</h4>
						</div>
						<div id = "edit_query"></div>
					</div>
				</div>
			</div>
			<div class="the-admin-message"></div>
			<div class = "well col-lg-12">
				<button type = "button" class = "btn btn-success" id="hide_admin_account"><span class = "glyphicon glyphicon-plus"></span> Add new</button>
				<br />
				<br />
				<table id = "table_record_admin" class = "table table-bordered table_record_admin">
					<thead>
						<tr class = "alert-info">
							<th>Admin ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($admindata as $row): ?>
							<tr>
								<td><?php echo $row->id; ?></td>
								<td><?php echo $row->firstname; ?></td>
								<td><?php echo $row->lastname; ?></td>
								<td><a class = "btn btn-danger radmin_id" name = "<?php echo $row->id?>" href = "#" data-toggle = "modal" data-target = "#delete_admin"><span class = "glyphicon glyphicon-remove"></span></a> <a class = "btn btn-warning  eadmin_id" name = "<?php echo $row->id?>" href = "#" data-toggle = "modal" data-target = "#edit_admin"><span class = "glyphicon glyphicon-edit"></span></a></td>
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
		$('.table_record_admin').DataTable();
	});
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.radmin_id').click(function(){
			var id = $(this).attr('name');
				$('.delete_admin').click(function(){
					$.ajax({
					type:'POST',
					dataType:'TEXT',
					url: 'Admin_c/delete_admin/'+id,
					data:{id:id},
					success: function(result){

						$('#delete_admin').remove();
						$('.modal-backdrop').remove();
						$(".admin_data").html(result);

						$('.the-admin-message').append('<div class="alert alert-success">' +
                        '<span class="glyphicon glyphicon-ok"></span>' +
                        ' Admin Deleted Successfully!!!' +
                        '</div>');

                        setTimeout(function(){
                           $('.alert-success').hide();
                        }, 3000);

					}
				});
			});
		});

		$('.eadmin_id').click(function(){
			var id = $(this).attr('name');
			$('#edit_query').load('load_edit.php?admin_id=' + $admin_id);
		});

		$('#hide_admin_account').on('click', function(){ 
			$('.admin').show();
			$('.show_new_admin').show();
			$('.nav-pills a[href="#new_admin"]').tab('show');
		});

	});
</script>