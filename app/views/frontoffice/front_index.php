<!DOCTYPE html>
<html lang = "eng">
	<head>
		<meta charset = "utf-8" />
		<title>Employee Register System</title>
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" type = "text/css" rel="stylesheet">
	</head>
	<body class = "alert-info">
		<input type="hidden" id="base_url" value="<?=base_url()?>" />
		<nav class = "navbar navbar-inverse navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<!--<img src = "admin/images/logo.png" width = "200px" height = "50px"/>-->
					<p class = "navbar-text pull-right">Employee Register System</p>
				</div>
					<a target="_blank" href="<?php echo base_url('index.php/admin_c');?>" class = "navbar-text pull-right">Admin</a>
			</div>
		</nav>
		<div class = "container-fluid">
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<div class = "col-lg-3"></div>
			<div class = "col-lg-6 well">
				<h2>Register Login</h2>
				<br />
				<div id = "result"></div>
				<br />
				<br />
				<form enctype = "multipart/form-data">
					<div class = "form-group">
						<label>Employee ID:</label>
						<input type = "text" id = "employee" class = "form-control" required = "required"/>
						<br />
						<br />
						<div id = "error"></div>
						<br />
						<button type = "button" id = "login" class = "btn btn-primary btn-block"><span class = "glyphicon glyphicon-login"></span>Login</button>
					</div>
				</form>
			</div>
		</div>
	</body>
	<script src="<?php echo base_url(); ?>assets/front_js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/front_js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>assets/front_js/login.js"></script>
</html>