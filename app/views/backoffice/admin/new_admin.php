<div class = "well col-lg-12">
		<div class="the-message-admin"></div>
		<form id="#add-newadmin-form" action="<?php echo base_url("index.php/Admin_c/add_admin");?>" method = "POST" enctype = "multipart/form-data">
			<div class  = "col-md-6">
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
					<label>Lastname:</label>
					<input type = "text" name = "lastname" required = "required" class = "form-control" />
				</div>
				<div class = "modal-footer">
					<button type="submit"  class = "btn btn-primary" id="insert_admin" name = "save"><span class = "glyphicon glyphicon-save"></span> Save</button>
				</div>
			</div>	
		</form>
</div>
<script type="text/javascript">
$(document).ready(function(){ 

	 	$('#add-newadmin-form').submit(function(e) {
		e.preventDefault();
		
		var addAmin = $(this);

		 $.ajax({
         url: addAdmin.attr('action'),
         type: 'post',
         data: addAdmin.serialize(),
         dataType: 'json',
         success: function(response) {
            if (response.success == true) {
               // if success we would show message
               // and also remove the error class
               $('.the-message-admin').append('<div class="alert alert-success">' +
                  '<span class="glyphicon glyphicon-ok"></span>' +
                  ' Leave Records Has Been Added Successfully' +
                  '</div>');
               $('.form-group .input-container').removeClass('has-error')
                               .removeClass('has-success');
               $('.text-danger').remove();

               // reset the form
               addAdmin[0].reset();

               // close the message after seconds
               $('.alert-success').delay(500).show(10, function() {
                  $(this).delay(3000).hide(10, function() {
                     $(this).remove();
                  });
               })

               $(".all_leave_record_container").html(response.html);
               //location.reload();
            }
            else {
              if (response.check) {
                $('.the-message-record').append('<div class="alert alert-danger">' +
                  '<span class="glyphicon glyphicon-remove"></span>' +
                  ' Record already exists!' +
                  '</div>');
                  me[0].reset();

                 // close the message after seconds
                 $('.alert-danger').delay(500).show(10, function() {
                    $(this).delay(3000).hide(10, function() {
                       $(this).remove();
                    });
                 })
              }
               $.each(response.messages, function(key, value) {
                  var element = $('#' + key);
                  
                  element.closest('div.form-group')
                  .removeClass('has-error')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success')
                  .find('.text-danger')
                  .remove();
                  
                  element.after(value);
               });
            }
         }
      });
	});

});
</script>