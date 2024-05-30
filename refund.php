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
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Customers Refunds details</h1>
						<hr/>
						<?php
							include_once("db.php");
							$user_id = $_SESSION["uid"];
                            $x=0;
							$orders_list = "SELECT o.id, o.order_id,o.user_id,o.product_id,o.qty,o.qual,o.qual2,o.trx_id,o.status,p.product_title,p.product_price,p.product_image FROM refund o,products p WHERE o.product_id=p.product_id";
							$query = mysqli_query($con,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
                                    $id=$row["order_id"];
                                    $rid=$row["id"];
                                    $status=$row["status"]
                                    
                                   
									?>
										<div class="row">
											<div class="col-md-6">
												<img style="float:right;width:160px; height:250px;" src="product_images/<?php echo $row['product_image']; ?>" class="img-responsive img-thumbnail"/>
											</div>
											<div class="col-md-6">
												<table>
													<tr><td>Product Name</td><td><b><?php echo $row["product_title"]; ?></b> </td></tr>
													<tr><td>Product Price</td><td><b><?php echo "$ ".$row["product_price"]; ?></b></td></tr>
													<tr><td>Quantity</td><td><b><?php echo $row["qty"]; ?></b></td></tr>
                                                    <tr><td>Specifics</td><td><b><?php echo $row["qual"]; ?></b></td></tr>
                                                    <tr><td>Specifics</td><td><b><?php echo $row["qual2"]; ?></b></td></tr>
													<tr><td>Transaction Id</td><td><b><?php echo $row["trx_id"]; ?></b></td></tr>
                                                    <tr><td>Status</td><td><b><?php echo $row["status"]; ?></b></td></tr>
                                                    <tr><td>	
                                            <?php 
                                                if(strcasecmp($status,"pending")==0){
                                                echo'
                                                <div class="col-md-2">
                                                    <div class="btn-group">
                                                        
                                                        <a href="#" refund_id="'.$rid.'" class="btn btn-danger refund_order"><span class="glyphicon glyphicon-ok"></span></a>
                                                    </div>
                                                </div>';
                                                ?>	</td><td>
                                            <?php 
                                                    echo'</form>
                                                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                                        <input type="hidden" name="cmd" value="_cart">
                                                        <input type="hidden" name="business" value="shoppingcart@khanstore.com">
                                                        <input type="hidden" name="upload" value="1">';
                                                          
                                                       
                                                       
                                                            $x++;
                                                            echo  	
                                                                '<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
                                                                   <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
                                                                 <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
                                                                 <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">
                                                                 <input type="hidden" name="quality_'.$x.'" value="'.$row["qual"].'">';
                                                           
                                                          
                                                        echo   
                                                            '<input type="hidden" name="return" value="http://localhost/project1/payment_success.php"/>
                                                                <input type="hidden" name="notify_url" value="http://localhost/project1/payment_success.php">
                                                                <input type="hidden" name="cancel_return" value="http://localhost/project1/cancel.php"/>
                                                                <input type="hidden" name="currency_code" value="USD"/>
                                                                <input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
                                                                <input style="float:right;margin-right:80px;" type="image" name="submit"
                                                                    src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png" alt="PayPal Checkout"
                                                                    alt="PayPal - The safer, easier way to pay online">
                                                            </form>';}
                                        ?>
                                        </td></tr>
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