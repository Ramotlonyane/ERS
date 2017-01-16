		<div class = "container-fluid" style = "margin-top:70px;">
			<ul class = "nav nav-pills">
				<li class = "active home"><a data-toggle="tab" href = "#home"><span class = "glyphicon glyphicon-home"></span> Home</a></li>
				<li class = "dropdown">
					<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#"><span class = "glyphicon glyphicon-cog"></span> Accounts <span class = "caret"></span></a>
					<ul class = "dropdown-menu">
						<li class="admin"><a data-toggle="tab" href = "#admin" onclick="admin_data()"><span class = "glyphicon glyphicon-user"></span> Admin</a></li>
						<li class="employee"><a data-toggle="tab" href = "#employee" onclick="employee_data()"><span class = "glyphicon glyphicon-user"></span> Employee</a></li>
					</ul>
				</li>
				<li class="record"><a data-toggle="tab" href = "#record" onclick="record()"><span class = "glyphicon glyphicon-book"></span> Record</a></li>
				<li class="show_new_admin" style="display: none;"><a data-toggle="tab" href = "#new_admin" onclick="add_new_admin()"><span class = "glyphicon glyphicon-user"></span> Add New Admin</a></li>
				<li class="show_new_employee" style="display: none;"><a data-toggle="tab" href = "#new_employee" onclick="add_new_employee()"><span class = "glyphicon glyphicon-user"></span> Add New Employee</a></li>
			</ul>
			<br />
			<div class="tab-content">
				<div class="tab-pane fade in active" id="home">
					<div class = "alert alert-info">Home</div>	
					<div class="home_data"><?php $this->load->view($home); ?></div>
				</div>
				<div class="tab-pane fade" id="admin">
				<div class = "alert alert-info">Accounts / Admin</div>		
					<div class="admin_data"><?php $this->load->view($admin); ?></div>
				</div>
				<div class="tab-pane fade" id="employee">
					<div class = "alert alert-info">Accounts / Employee</div>
					<div class="employee_data"><?php $this->load->view($employee); ?></div>
				</div>
				<div class="tab-pane fade" id="record">
				<div class = "alert alert-info">Records</div>
					<div class="record_data"><?php $this->load->view($record); ?></div>
				</div>
				<div class="tab-pane fade" id="new_admin">
				<div class = "alert alert-info">New Admin</div>
					<div class="new_admin_data"><?php $this->load->view($new_admin); ?></div>
				</div>
				<div class="tab-pane fade" id="new_employee">
				<div class = "alert alert-info">New Employee</div>
					<div class="new_employee_data"><?php $this->load->view($new_employee); ?></div>
				</div>
			</div>
		</div>
<script type="text/javascript">
	$('.home').on('click', function(){
		$('.admin').show();
		$('.show_new_admin').hide();
		$('.show_new_employee').hide();
	});

	$('.admin').on('click', function(){
		$('.admin').show();
		$('.show_new_admin').hide();
		$('.show_new_employee').hide();
	});

	$('.employee').on('click', function(){
		$('.admin').show();
		$('.show_new_admin').hide();
		$('.show_new_employee').hide();
	});

	$('.record').on('click', function(){
		$('.admin').show();
		$('.show_new_admin').hide();
		$('.show_new_employee').hide();
	});
</script>