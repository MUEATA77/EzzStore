<?php


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
		<link rel="stylesheet" type="text/css" href="style.css"/>
		
	</head>
	<script src="jquery-3.2.1.min.js" type="text/javascript"></script>

<script>
	function star(num){
		for(var i = 0;i<5;i++){
			if(i<num){
			<span class='fa fa-star checked'></span>}
		}
		return num;
	}
</script>
<style type="text/css">

body{
	background: #999;
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
}
b, strong {
    font-weight: bold;
    color: #000;
    padding-bottom: 15px;
    display: block;
    padding-top: 10px;
    border: 0px solid #444;
	font-size: 15px;
}
.panel-primary {
	margin-bottom: 0px;
	

}
.panel-primary>.panel-heading {
    color: #fff;
    background-color: #096602;
    border-color: #0965A0;
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
</style>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand">Ezz Store</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span> Product</a></li>
			</ul>
		</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Cart Message--> 
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-11">
				<div class="panel panel-primary">
					<div class="panel-heading">Cart Checkout</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-1 col-md-1 col-sm-auto col-xs-auto" style="border: 1px "><b>Action</b></div>
							<span class="col-lg-1 col-md-1 col-sm-auto col-xs-auto" style="border: 1px  "><b>Product Image</b></span>
							<span class="col-lg-1 col-md-1 col-sm-auto col-xs-auto" style="border: 1px  "><b>Product Name</b></span>
							<span class="col-lg-1 col-md-1 col-sm-auto col-xs-auto" style="border: 1px  "><b>Quantity</b></span>
							<span class="col-lg-1 col-md-1 col-sm-auto col-xs-auto" style="border: 1px  "><b>Option 1</b></span>
							<span class="col-lg-1 col-md-1 col-sm-auto col-xs-auto" style="border: 1px  "><b>Option 2</b></span>
							<span class="col-lg-1 col-md-1 col-sm-auto col-xs-auto" style="border: 1px  "><b>Product Price </b></span>
							<span class="col-lg-1 col-md-1 col-sm-auto col-xs-auto" style="border: 1px  "><b>Price in $</b></span>
						</div>
						<div id="cart_checkout"></div>
						<!--<div class="row">
							<div class="col-md-2">
								<div class="btn-group">
									<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									<a href="" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
								</div>
							</div>
							<div class="col-md-2"><img src='product_images/imges.jpg'></div>
							<div class="col-md-2">Product Name</div>
							<div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
						</div> -->
						<!--<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b>Total $500000</b>
							</div> -->
						</div> 
					</div>
					
						<div class="panel-footer">&copy; Ezz Store 2023</div>
					
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>
</body>	
</html>

















		