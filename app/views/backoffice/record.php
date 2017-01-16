<div class = "modal fade delete_record" id = "delete_record" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
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
<div class="the-delete-message"></div>
<div class = "well col-lg-12">
	<table id = "table_record_time" class = "table table-bordered table_record_time">
		<thead class = "alert-info">
			<tr>
				<th>Employee ID</th>
				<th>Persal Number</th>
				<th>Employee Name</th>
				<th>Time In</th>
				<th>Time Out</th>
				<th>Date In</th>
				<th>Date Out</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			 <?php foreach ($timedata as $row): ?>
				<tr>
					<td><?php echo $row->id; ?></td>
					<td><?php echo $row->persal_number; ?></td>
					<td><?php echo $row->employee_name; ?></td>
					<td><?php echo date("h:i a", strtotime($row->time_in)); ?></td>  					
					<td><?php echo date("h:i a", strtotime($row->time_out)); ?></td>
					<td><?php echo date("m-d-Y", strtotime($row->date_in)); ?></td>
					<td><?php echo date("m-d-Y", strtotime($row->date_out)); ?></td>
					<td><button name = "<?php echo $row->id?>" class = "btn btn-danger rtime_id" href = "#" data-toggle = "modal" data-target = "#delete_record"><span class = "glyphicon glyphicon-remove"></span></button></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<br />
<br />	
<br />	
</div>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.table_record_time').DataTable();
	});
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.rtime_id').click(function(){
			var id = $(this).attr('name');
			$('.remove_id').click(function(){
					$.ajax({
					type:'POST',
					dataType:'TEXT',
					url: 'Time_c/delete_record/'+id,
					data:{id:id},
					success: function(result){

						$('.delete_record').remove();
						$('.modal-backdrop').remove();
						$(".record_data").html(result);

						$('.the-delete-message').append('<div class="alert alert-success">' +
                        '<span class="glyphicon glyphicon-ok"></span>' +
                        ' Record Deleted Successfully!!!' +
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