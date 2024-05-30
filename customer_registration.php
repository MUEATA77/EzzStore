<?php
if (isset($_GET["register"])) {
	
	?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ezz Store</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<style type="text/css">
.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
    border-color: red;
	background: cadetblue;
}
.panel-success>.panel-heading {
    color: #3c763d;
    background-color: cadetblue;
    border-color: #063003;
}
.navbar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
    margin-left: 15px;
    color: white;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}
.panel-info>.panel-heading {
    background-color: cadetblue;
    border-color: #999;
}
.panel-primary>.panel-heading {
    color: #fff;
    background-color: cadetblue;
    border-color: #337ab7;
    font-size: 20px;
    text-align: center;
    font-weight: bold;
}
.panel-info>.panel-heading {
    color: #fff;
    font-size: 20px;
    text-align: center;
}
.nav ul li a{
	color: #444;
}
.container-fluid {
    padding-right: 0;
    padding-left: 0;
    margin-right: auto;
    margin-left: auto;
}
.btn-primary {
    color: #fff;
    background-color: #000;
    border-color: #444;
    border-radius: 7px;
}
.navbar-inverse .navbar-nav>li>a {
    color: #fff;
    font-size: 15px;
}
body{
	background: #999;
}
.navbar-inverse .navbar-nav>li>a:hover {
	color: #000;
}
.panel-footer {
    padding: 10px 15px;
    background-color: cadetblue;
    border-top: 1px solid #ddd;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    text-align: center;
	color: #fff;
	font-size: 20px;
	font-weight: bold;
}
.btn-success {
    color: #fff;
    font-size: 15px;
    font-weight: bold;
}
.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
    border-color: red;
	background: cadetblue;
}
</style>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
			<a href="index.php" class="navbar-brand">Ezz Store</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span> Product</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Customer Sign Up Form</div>
					<div class="panel-body">
					
					<form id="signup_form" onsubmit="return false">
						<div class="row">
							<div class="col-md-6">
								<label for="f_name">First Name</label>
								<input type="text" id="f_name" name="f_name" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="f_name">Last Name</label>
								<input type="text" id="l_name" name="l_name"class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="text" id="email" name="email"class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="password">password</label>
								<input type="password" id="password" name="password"class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="repassword">Re-enter Password</label>
								<input type="password" id="repassword" name="repassword"class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="mobile">Mobile</label>
								<input type="text" id="mobile" name="mobile"class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="address1">Address </label>
								<input type="text" id="address1" name="address1"class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="address2">Country</label>
								<input type="text" id="address2" name="address2"class="form-control">
							</div>
						</div>
						<p><br/></p>
						<div class="row">
							<div class="col-md-12">
								<input style="width:100%;" value="Sign Up" type="submit" name="signup_button"class="btn btn-success btn-lg">
							</div>
						</div>
						
					</div>
					</form>
					<div class="panel-footer">&copy; Ezz Store 2023</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
	<?php
}



?>






















