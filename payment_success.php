<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}

if (isset($_GET["st"])) {

	# code...
	$trx_id = $_GET["tx"];
		$p_st = $_GET["st"];
		$amt = $_GET["amt"];
		$cc = $_GET["cc"];
		$cm_user_id = $_GET["cm"];
		$c_amt = $_COOKIE["ta"];
	if ($p_st == "Completed") {

		

		include_once("db.php");
		$sql = "SELECT p_id,qty FROM cart WHERE user_id = '$cm_user_id'";
		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
			# code...
			while ($row=mysqli_fetch_array($query)) {
			$product_id[] = $row["p_id"];
			$qty[] = $row["qty"];
			}

			for ($i=0; $i < count($product_id); $i++) { 
				$sql = "INSERT INTO orders (user_id,product_id,qty,trx_id,p_status) VALUES ('$cm_user_id','".$product_id[$i]."','".$qty[$i]."','$trx_id','$p_st')";
				mysqli_query($con,$sql);
			}

			$sql = "DELETE FROM cart WHERE user_id = '$cm_user_id'";
			if (mysqli_query($con,$sql)) {
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
							
							<style type="text/css">
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
   background: #998;
    margin: 0 auto;
    color: #fff;
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

table tr td {padding:10px;}
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
									<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
								</ul>
							</div>
						</div>
						<p><br/></p>
						<p><br/></p>
						<p><br/></p>
						<div class="container-fluid">
						
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Thankyou </h1>
											<hr/>
											<p>Hello <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Your payment process is 
											successfully completed and your Transaction id is <b><?php echo $trx_id; ?></b><br/>
											you can continue your Shopping <br/></p>
											<a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>

				<?php
			}
		}else{
			header("location:index.php");
		}
		
	}
}



?>

















































