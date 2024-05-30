<?php

session_start();

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
	margin-top: 10px;
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
			<form class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search here..." id="search">
		        </div>
		        <button type="submit" class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
		     </form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>-->
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				
			</ul>
		</div>
	</div>
</div>	
	
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Product View</h1>
						<hr/>
						<?php
							include_once("db.php");
							$pro_id = $_SESSION["pid"];
                            
							$orders_list = "SELECT * FROM products WHERE product_id='$pro_id'";
							$query = mysqli_query($con,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
                                    
									?>
                                    
										<div class="row">
											<div class="col-md-6">
												<img style="float:right;width:160px; height:250px;" src="product_images/<?php echo $row['product_image']; ?>" class="img-responsive img-thumbnail"/>
											</div>
											<div class="col-md-6">
                                            <ul class='list-inline' data-rating='$rating' title='Average Rating - '.$rating>
											
                                            <table>
													<tr><td>Product Name</td><td><b><?php echo $row["product_title"]; ?></b> </td></tr>
													<tr><td>Product Price</td><td><b><?php echo "$ ".$row["product_price"]; ?></b></td></tr>
													
												</table>
                                                <?php
                                                    $op='';
                                                    $rating=$row["rating"];
                                                    for($count=1; $count<=5; $count++)
                                                            {
                                                            if($count <= $rating)
                                                            {
                                                            $color = 'color:#ffcc00;';
                                                            }
                                                            else
                                                            {
                                                            $color = 'color:#ccc;';
                                                            }
                                                            $op.= '<li title="'.$count.'" id="rate" data-index="'.$count.'"  data-p_id="'.$pro_id.'" data-rating="'.$rating.'" class="rating" style="cursor:pointer; '.$color.' font-size:16px;">&#9733;</li>';
                                                            }	
                                                            echo $op;
                                               if(isset($_SESSION["uid"])) {            
                                                echo'<form action="">
                                                    <div class="form-group ">
                                                    <label for="r">Rate:</label>
                                                        <select name="r" id="r" class="form-control r">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-group ">
                                                        <input type="submit" name="Rate"class="btn btn-info Rate" value="Rate" style="float:centre">
                                                    </div>
                                                    </form>';}
                                                    echo"
                                                    <br>
                                                    <button pid='$pro_id' style='float:center;' id='product' class='btn btn-info btn-xs'>AddToCart</button>
                                                    <button  style='float:center;' id='back' class='btn btn-info btn-xs'>Back</button>"?>
                                                    <table>
													<tr><td>Product Discritption:</td><td><b><?php echo $row["product_desc"]; ?></b> </td></tr>
													
													
												</table>
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
<script>
