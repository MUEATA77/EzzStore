
<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";


if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categories</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Brands</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
					<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_quantity = $row['product_quantity'];
			$pro_image = $row['product_image'];
			$rating = round($row['rating']);
				
			$op="";
			$op.="
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'style='height:80px;'>$pro_title</div>
								<div class='panel-body'>
								
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>$$pro_price.00
								<p class='panel-heading' style='font-size:15px;'>$pro_quantity</p>
								<ul class='list-inline' data-rating='$rating' title='Average Rating - '$rating'>";
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
								 $op.= '<li title="'.$count.'" id="'.$pro_id.'-'.$count.'" data-index="'.$count.'"  data-pro_id="'.$pro_id.'" data-rating="'.$rating.'" class="rating"  style="cursor:pointer; '.$color.' font-size:16px;">&#9733;</li>';
								}
									$op.="</u>
									<br>
									<button pid='$pro_id' style='float:center;' id='view' class='btn btn-danger btn-xs'>Veiw</button>
								
									<button pid='$pro_id' style='float:center;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>	
			";
			echo $op;
		}
	}
}
if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE product_brand = '$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_quantity = $row['product_quantity'];
			$pro_image = $row['product_image'];
			$rating = round($row['rating']);
				
			$op="";
			$op.="
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'style='height:80px;'>$pro_title</div>
								<div class='panel-body'>
								
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>$$pro_price.00
								<p class='panel-heading' style='font-size:15px;'>$pro_quantity</p>
								<ul class='list-inline' data-rating='$rating' title='Average Rating - '$rating'>";
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
								 $op.= '<li title="'.$count.'" id="'.$pro_id.'-'.$count.'" data-index="'.$count.'"  data-pro_id="'.$pro_id.'" data-rating="'.$rating.'" class="rating"  style="cursor:pointer; '.$color.' font-size:16px;">&#9733;</li>';
								}
									$op.="</u>
									<br>
									<button pid='$pro_id' style='float:center;' id='view' class='btn btn-danger btn-xs'>Veiw</button>
								
									<button pid='$pro_id' style='float:center;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
								</div>
							</div>
						</div>	
			";
			echo $op;
		}
	}
	}
	


	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		$sql = "SELECT * FROM `products` WHERE product_id= '$p_id' ";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0) {
			// the value exists in the table
			$row = mysqli_fetch_assoc($result);
			$cat = $row["product_cat"];
			// use the $myValue variable as needed
		  }
		$qual= 'null';
		if($cat>=2&&$cat<=4){
			$qual = "small";
		}
		else if($cat==5){
			$qual = "wooden";
		}
		else if($cat==1 || $cat==6 ||$cat==7){
			$qual = "white";
		}
		

		if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			";//not in video
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`,`qual`) 
			VALUES ('$p_id','$ip_add','$user_id','1','$qual')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
			}
		}
		}else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`,`qual`) 
			VALUES ('$p_id','$ip_add','-1','1','$qual')";
			if (mysqli_query($con,$sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully..!</b>
					</div>
				";
				exit();
			}
			
		}
		
		
		
		
	}
	
//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,a.product_cat,b.id,b.qty,b.qual FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,a.product_cat,b.id,b.qty ,b.qual FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$product_cat = $row["product_cat"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				$qual = $row["qual"];
				echo '
					<div class="row">
						<div class="col-md-3">'.$n.'</div>
						<div class="col-md-3"><img class="img-responsive" src="product_images/'.$product_image.'" /></div>
						<div class="col-md-3">'.$product_title.'</div>
						<div class="col-md-3">$'.$product_price.'</div>
					</div>';
				
			}
			?>
				<a style="float:right; margin-top:5px;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
			<?php
			exit();
		}
	}
	//user change

	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo "<form method='post' action='login_form.php'>";
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$product_cat = $row["product_cat"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];
					$qual = $row["qual"];

					echo 
						'<div class="row">
								<span class="col-md-1">
									<span class="btn-group">
										<a href="#" remove_id="'.$product_id.'" class="btn btn-danger col-lg-6 col-md-6 col-sm-6 col-xs-6 remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$product_id.'" class="btn btn-primary col-lg-6 col-md-6 col-sm-6 col-xs-6 update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</span>
								</span>
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<input type="hidden" name="" value="'.$cart_item_id.'"/>
								<span class="col-md-1"><img class="img-responsive" src="product_images/'.$product_image.'"></span>
								<span class="col-md-1">'.$product_title.'</span>
								<span class="col-md-1"><input type="int" class="form-control qty" value="'.$qty.'" ></span>';
								if($product_cat>=2&&$product_cat<=4){
									echo 
									'
									<span class="col-md-1"><select name="qual"  class="form-control qual">
									
									<option value="Small">Small</option>
									<option value="Medium">Medium</option>
									<option value="Large">Large</option>
								  </select></span>
									<span class="col-md-1"><select name="qual2"  class="form-control qual2">
									
									<option value="Red">Red</option>
									<option value="Blue">Blue</option>
									<option value="Yellow">Yellow</option>
									<option value="White">White</option>
									<option value="Black">Black</option>
									<option value="Green">Green</option>
								  </select></span>';
								}
								else if($product_cat==1){
									echo 
									'
									<span class="col-md-1"><select name="qual"  class="form-control qual">
									
									<option value="white">White</option>
                                    <option value="black">Black</option>
                                    <option value="metalic">Metalic</option>

								  </select></span>
									<span class="col-md-1"><select name="qual2"  class="form-control qual2">
									
									<option value="128GB">128GB</option>
                                    <option value="256GB">256GB</option>
                                    

								  </select></span>';
								}
								else if($product_cat==7||$product_cat==6){
									echo 
									'
									<span class="col-md-1"><select name="qual"  class="form-control qual">
									
									<option value="white">White</option>
                                    <option value="black">Black</option>
                                    <option value="metalic">Metalic</option>

								  </select></span>
									<span class="col-md-1"><select name="qual2"  class="form-control qual2">
									
									<option value="Mini">Mini</option>
                                    <option value="Normal">Normal</option>
                                    

								  </select></span>';
								}
								else if($product_cat==8){
									echo 
									'
									<span class="col-md-1"><select name="qual"  class="form-control qual">
									
									<option value="256Gb">256GB</option>
                                    <option value="512GB">512GB</option>
                                    

								  </select></span>
									<span class="col-md-1"><select name="qual2"  class="form-control qual2">
									
									<option value="Gen 6">Gen 6</option>
                                    <option value="Gen 7">Gen 7</option>
                                    <option value="Gen 8">Gen 8</option>

								  </select></span>';
								}
								elseif($product_cat==5){
									echo 
									'
									<span class="col-md-1"><select name="qual"  class="form-control qual">
									
									<option value="dark">Dark</option>
                                    <option value="light">Light</option>
                                    <option value="wooden">Wooden</option>

								  </select></span>
									<span class="col-md-1"><select name="qual2"  class="form-control qual2">
									
									<option value="Small">Small</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Large">Large</option>

								  </select></span>';
								}
								

								  
								echo 
								'
								<span class="col-md-1"><input type="int" class="form-control price" value="'.$product_price.'" readonly="readonly"></span>
								<span class="col-md-1"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></span>
								
							</div>';
				}
				
				echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:20px;"> </b>
					</div>';
					
					if (isset($_SESSION["uid"]) ){
						$id=$_SESSION["uid"];
							$sql = "SELECT address2 FROM `user_info` WHERE user_id= '$id' ";
							$result = mysqli_query($con,$sql);
							if(mysqli_num_rows($result) > 0) {
								// the value exists in the table
								$row = mysqli_fetch_assoc($result);
								$addr = $row["address2"];
								
								// use the $myValue variable as needed
							}
							if(strcasecmp($addr,"Malaysia")==0){
						echo 
									'<div class="row">
									<div class="col-md-8"></div>
									<div class="col-md-3">
									<div class="btn-group"style="float:right;" >
							<a href="profile.php" style="float:right; position:relative; right: 8%; margin-bottom:10px; padding:18px 96px; font-weight: bold;" id="cash"  class="btn btn-info cash btn-group col-md-">Cash On Dilivery</a>
							
						</div>
						</div>';
						}	}
				if (!isset($_SESSION["uid"])) {
					echo '<input type="submit" style="float:right; margin: 0 10px 10px 0;" name="login_user_with_product" class="btn btn-info btn-lg" value="Ready to Checkout" >
							</form>';
					
				}else if(isset($_SESSION["uid"])){
					
					  
					  
							
					//Paypal checkout form
					echo '
						</form>
						<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="shoppingcart@khanstore.com">
							<input type="hidden" name="upload" value="1">';
							  
							$x=0;
							$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty ,b.qual FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query)){
								$x++;
								echo  	
									'<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">
									 <input type="hidden" name="quality_'.$x.'" value="'.$row["qual"].'">';
								}
							  
							echo   
								'<input type="hidden" name="return" value="http://localhost/project1/payment_success.php"/>
					                <input type="hidden" name="notify_url" value="http://localhost/project1/payment_success.php">
									<input type="hidden" name="cancel_return" value="http://localhost/project1/cancel.php"/>
									<input type="hidden" name="currency_code" value="USD"/>
									<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
									<input style="float:right; margin:0 12.5% 20px 0; position:relative; right:-11px;" class="btn-group col-md-" type="image" name="submit"
										src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png" alt="PayPal Checkout"
										alt="PayPal - The safer, easier way to pay online">
								</form>';
							
								  
								
				}
				
			}
	}}
	
	


//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}
//Remove user
if (isset($_POST["removeUser"])) {
	$remove_id = $_POST["rid"];
	
		$sql = "DELETE FROM user_info WHERE user_id = '$remove_id'";
	
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>User is removed </b>
				</div>";
		exit();
	}
}

//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	$qual = $_POST["qual"];
	$qual2 = $_POST["qual2"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty',qual='$qual' ,qual2='$qual2' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty',qual='$qual',qual2='$qual2' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}

}
//Update user info
if (isset($_POST["updateuser"])) {
	$update_id = $_SESSION["uid"];
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$mobile= $_POST["mobile"];
	$password = $_POST["password"];
	$address1 = $_POST["address1"];
	$address2 = $_POST["address2"];
	
	
		$sql = "UPDATE `user_info` SET `first_name`='$fname',`last_name`='$lname',
		`email`='$email',`password`='$password',`mobile`='$mobile',`address1`='$address1',`address2`='$address2' WHERE  user_id = '$_SESSION[uid]'";
		
	
	if(mysqli_query($con,$sql)){
		
		exit();
	}

}
//process order when on chash
if(isset($_POST["addToorder"])){
		
	$user_id = $_SESSION["uid"];

	$sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
	$run_query = mysqli_query($con,$sql);
	
	while($row=mysqli_fetch_array($run_query)){
		$pro_id    = $row['p_id'];
		$pro_qty   = $row['qty'];
		$pro_qual= $row['qual'];
		$pro_qual2= $row['qual2'];
		
		$sql1 = "INSERT INTO `orders` (`user_id`, `product_id`, `qty`, `qual`, `qual2`,`trx_id`, `p_status`)
		 VALUES ( '$user_id', '$pro_id', '$pro_qty  ', '$pro_qual','$pro_qual2', 'on cash', 'in process');";
			if(mysqli_query($con,$sql1)){
				echo "
					<div class='alert alert-success'>
						
					</div>
				";
			}
	} 
	$sql = "DELETE FROM cart WHERE  user_id = '$_SESSION[uid]'";
	
	if(mysqli_query($con,$sql)){
		
		exit();
	}


}
// delete an order if on chash or add to refund if online transaction 
if (isset($_POST["removeOrder"])) {
	$remove_id = $_POST["rid"];
	$sql = "SELECT * FROM orders WHERE order_id = '$remove_id'";
	$run_query = mysqli_query($con,$sql);
	
	while($row=mysqli_fetch_array($run_query)){
		$o_trx  = $row['trx_id'];
		$o_uid   = $row['user_id'];
		$o_pid= $row['product_id'];
		$o_qty   = $row['qty'];
		$o_qual= $row['qual'];
		$o_qual2= $row['qual2'];
		if(strcasecmp($o_trx,"on cash")!=0){
			$sql2 = "INSERT INTO `refund`( `order_id`, `user_id`, `product_id`, `qty`, `qual`, `qual2`, `trx_id`, `status`) VALUES ('$remove_id ','$o_uid','$o_pid','$o_qty ','$o_qual','$o_qual2','$o_trx','pending')";
			if(mysqli_query($con,$sql2)){
				echo "
					
				";
			}
		}}
		$sql1 = "DELETE FROM `orders` WHERE order_id = '$remove_id'";
	
		if(mysqli_query($con,$sql1)){
			
			}
}	
//money is refunded ste status to refunded
if (isset($_POST["refundOrder"])) {
	$refund_id = $_POST["rid"];
	
	$sql1 = "UPDATE `refund`SET`status`='Refunded' WHERE `id` = '$refund_id'";
	
		if(mysqli_query($con,$sql1)){
			
			}
	
}
//if an order is completed
if (isset($_POST["completeOrder"])) {
	$c_id = $_POST["cid"];
	
	$sql1 = "UPDATE `orders` SET `p_status`='Completed' WHERE `order_id`='$c_id'";
	
		if(mysqli_query($con,$sql1)){
			
			}
	
}
if (isset($_POST["sentOrder"])) {
	$s_id = $_POST["sid"];
	
	$sql1 = "UPDATE `orders` SET `p_status`='shipped' WHERE `order_id`='$s_id'";
	
		if(mysqli_query($con,$sql1)){
			
			}
	
}	
if (isset($_POST["viewid"])) {
	$p_id = $_POST["pid"];
	$_SESSION["pid"] = $p_id;
	
	
}
	
//rating
if (isset($_POST["rpro"])) {
	$rate = $_POST["rate"];
	$uid= $_SESSION["uid"];
	$pid = $pid = $_SESSION["pid"];;
	$sql = "SELECT COUNT(*) as c FROM `rate` WHERE `pro_id`='$pid' AND `user_id`='$uid'";
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){	
			if($row['c']>=1){
				$sql1 = "UPDATE `rate` SET `rate`='$rate' WHERE `pro_id`='$pid'AND`user_id`='$uid'";
			}
			else{
				$sql1 = "INSERT INTO `rate`( `rate`, `pro_id`, `user_id`) VALUES ('$rate','$pid','$uid')";
			}
		}
			if(mysqli_query($con,$sql1)){
			
				}
			$sql2 = "SELECT FLOOR(AVG(rate)) as f  FROM `rate` WHERE `pro_id`='$pid'";
			$run_query = mysqli_query($con,$sql2);
			while($row=mysqli_fetch_array($run_query)){	
					$f=$row['f'];
				}
					$sql3 = "UPDATE `products` SET `rating`='$f' WHERE `product_id`='$pid'";	
					if(mysqli_query($con,$sql3)){
			
						}
}	
?>





