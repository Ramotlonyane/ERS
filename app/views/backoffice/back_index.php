<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>Employee Register System</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" type = "text/css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/style.css" type = "text/css" rel="stylesheet">
		<script type="text/javascript">
      		base_url = '<?=base_url()?>';
    	</script> 
	</head>
	<body>
	<input type="hidden" id="base_url" value="<?=base_url()?>" />
		<nav class = "navbar navbar-inverse navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<!--<img src = "images/logo.png" width = "200px" height = "50px"/>-->
					<p class = "navbar-text pull-right">Employee Register System</p>
				</div>
			</div>
		</nav>
		<div class = "container" style = "margin-top:120px;">
			<div class = "row row-centered">
				<div class = "col-lg-2 col-centered"></div>
				<div class = "col-lg-2 col-centered"></div>
				<div class = "col-lg-4 col-centered">
					<div class = "panel panel-primary">
						<div class = "panel-heading">
							<h4>Admin Login</h4>
						</div>
						<div class = "panel-body">
							<form enctype = "multipart/form-data">
								<div id = "username_warning" class = "form-group">
									<label class = "control-label">Username:</label>
									<input type = "text" id = "username" class = "form-control" />
								</div>
								<div id = "password_warning" class = "form-group">
									<label class = "control-label">Password:</label>
									<input type = "password" maxlength = "12" id = "password" class = "form-control" />
								</div>
								<div id = "result"></div>
								<br />
								<button type = "button" class = "btn btn-primary btn-block" id = "login_admin"><span class = "glyphicon glyphicon-save"></span> Login</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class = "navbar navbar-fixed-bottom alert-warning">
			<div class = "container-fluid">
				<label class = "pull-left">&copy; Employee Register System 2016</label>
				<label class = "pull-right">Developed: <a target="_blank" href = "https://www.treasury.fs.gov.za">https://www.treasury.fs.gov.za</a></label>
			</div>	
		</div>
	</body>
	<script src="<?php echo base_url(); ?>assets/back_js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/back_js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>assets/back_js/login.js"></script>
</html>