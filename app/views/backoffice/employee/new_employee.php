<div class = "well col-lg-12">
	<form method = "POST" action = "save_student_query.php" enctype = "multipart/form-data">
		<div class  = "col-md-6">
				<div class = "form-group">
					<label>Persal Number:</label>
					<input type = "text" name = "persalnumber" required = "required" class = "form-control" />
				</div>
				<div class = "form-group">
					<label>Firstname:</label>
					<input type = "text" name = "firstname" required = "required" class = "form-control" />
				</div>
				<div class = "form-group">
					<label>Lastname:</label>
					<input type = "text" name = "lastname" required = "required" class = "form-control" />
				</div>
				<div class = "form-group">
					<label>Department</label>
					<input type = "text" name = "department" required = "required" class = "form-control" />
				</div>
				<div class = "form-group">
					<label>Component</label>
					<input type = "text" name = "component" required = "required" class = "form-control" />
				</div>
				<div class = "modal-footer">
				<button  class = "btn btn-primary" name = "save"><span class = "glyphicon glyphicon-save"></span> Save</button>
				</div>
		</div>
	</form>
</div>