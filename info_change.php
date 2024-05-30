<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
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
        
<style>
body{
	background: #999;
}
.h1, h1 {
    font-size: 36px;
    color: #000;
    text-align: center;
    font-weight: bold;
}
table tr td {padding:10px;}
.panel-primary>.panel-heading {
    color: #fff;
    background-color: #444;
    border-color: #999;
}
.panel-footer {
    padding: 10px 15px;
    background-color: #999;
    border-top: 1px solid #ddd;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
}
.btn-success {
    color: #fff;
    background-color: #999;
    border-color: #000;
    font-size: 15px;
    font-weight: bold;
}
.row {
   background: #fff;
    margin: 0 auto;
    color: #999;
    font-size: 15px;
    font-weight: bold;
	
}
.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
    border-color: red;
	background: cadetblue;
}
.panel-success>.panel-heading {
    color: #3c763d;
    background-color: cadetblue;
    border-color: #063003;
}
p {
	margin:0;
}
.panel-footer {
    padding: 10px 15px;
    background-color: cadetblue;
    border-top: 1px solid #ddd;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    text-align: center;
	color: #fff;
}
.panel-info>.panel-heading {
    background-color: cadetblue;
    border-color: #999;
}
.panel-info>.panel-heading {
    color: #fff;
    font-size: 20px;
    text-align: center;
}
.panel-info>.panel-body {
    background-color: #999;
}
.btn-danger {
    color: #fff;
    background-color: #000;
    border: 1px solid #444;
}
.navbar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
    margin-left: 15px;
    color: white;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
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
.navbar-inverse .navbar-nav>li>a {
    color: #fff;
    font-size: 15px;
}
.navbar-inverse .navbar-nav>li>a:hover {
	color: #000;
}
.btn-primary {
    color: #fff;
    background-color: #000;
    border-color: #444;
    border-radius: 7px;
}

.navbar-form .form-control {
    display: inline-block;
    width: 270px;
    vertical-align: middle;
}
.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
    color: #fff;
    background-color: cadetblue;
    text-align: center;
}
.nav-pills>li>a {
    border-radius: 4px;
    color: #999;
    font-size: 15px;
    font-weight: bold;
    background: #444;
}
.pagination {
    display: inline-block;
    padding-left: 250px;
    margin: 0;
    border-radius: 4px;
    text-align: center;
}
.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #000;
    border: 1px solid #ddd;
}
</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
            <a href="index.php" class="navbar-brand">Ezz Store</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
   
		<div class="row">
			
			<div class="col-md-8 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>My Profile</h1>
						<hr/>
						<?php
							include_once("db.php");
							$user_id = $_SESSION["uid"];
                            
							$orders_list = "SELECT * FROM user_info WHERE user_id='$user_id' ";
							$query = mysqli_query($con,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
                                    
									?>
										<div class="row">
											
											<div class="col-md-6 col-md-offset-3">
												<form action="">
                                                    <div class="form-group">
                                                        <input type="text" name="fname"class="form-control fname" value="<?php echo $row['first_name'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="lname"class="form-control lname" value="<?php echo $row['last_name'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" name="email"class="form-control email" value="<?php echo $row['email'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="mobile"class="form-control mobile" value="<?php echo $row['mobile'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="password"class="form-control password" value="<?php echo $row['password'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="address1"class="form-control address1" value="<?php echo $row['address1'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="address2"class="form-control address2" value="<?php echo $row['address2'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" name="uiu"class="btn btn-info uiu" value="Update" style="float:centre">
                                                    </div>
                                                </form>
											</div>
                                            
										</div>
									<?php
								}
							}
						?>
						
					</div>
					<div class="panel-footer">&copy; Ezz Store 2023</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>