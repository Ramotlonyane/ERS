		<nav class = "navbar navbar-inverse navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<!--<img src = "images/logo.png" width = "200px" height = "50px"/>-->
					<p class = "navbar-text pull-right">Employee Register System</p>
				</div>
				<ul class = "nav navbar-nav navbar-right">
					<li class = "dropdown">
						<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><i class = "glyphicon glyphicon-user"></i> <?=$admin_name?> <b class = "caret"></b></a>
						<ul class = "dropdown-menu">
							<li><a href = "<?php echo site_url("Admin_c/logout") ?>"><i class = "glyphicon glyphicon-off"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>