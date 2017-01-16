		<div class = "container-fluid" style = "margin-top:70px;">
			<ul class = "nav nav-pills">
				<li class = "active"><a data-toggle="tab" href = "#home"><span class = "glyphicon glyphicon-home"></span> Home</a></li>
				<li class = "dropdown">
					<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#"><span class = "glyphicon glyphicon-cog"></span> Accounts <span class = "caret"></span></a>
					<ul class = "dropdown-menu">
						<li><a data-toggle="tab" href = "#admin" onclick="admin_data()"><span class = "glyphicon glyphicon-user"></span> Admin</a></li>
						<li><a data-toggle="tab" href = "#employee" onclick="employee_data()"><span class = "glyphicon glyphicon-user"></span> Employee</a></li>
					</ul>
				</li>
				<li><a data-toggle="tab" href = "#record" onclick="record()"><span class = "glyphicon glyphicon-book"></span> Record</a></li>
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
			</div>
		</div>