<?php
	function fetch_post_var($key) {
		if(isset($_POST[$key])){
			$value = trim(mysql_escape_string($_POST[$key]));
			return $value == '' ? null : $value;
		}
	}

	function fetch_get_var($key) {
		if(isset($_GET[$key])){
			$value = trim(mysql_escape_string($_GET[$key]));
			return $value == '' ? null : $value;
		}
	}

	function return_products($key) {
		$sql = "SELECT * FROM Inventory WHERE Name LIKE '%$key%' OR Description LIKE '%$key%' OR Department LIKE '$key%'";
		//Testing purposes only.
		//echo $sql;
		$result = @mysql_query($sql);
	    while($row = @mysql_fetch_array($result)) {
	    	echo '
                       		<ul>
								<li>'.
			                     	'<img src="'.$row['Image'].'" height="170" width="130">
			                         <div class="big_pro_right">
	                                       <h5>'.$row['Name'].'</h5>
	                                       <h4 class="price"><b>Cost: </b>$'.$row['Price'].'</h4>
	                                       <div class="clearfix"></div>
	                                       <h2><b>Description:</b></h2>
	                                       <p class="listing_description">'.$row['Description'].'</p>
	                                       <div class="left_pro_footer">
		                                       <h5>'.$row['Department'].'</h5>
		                                        <form method="get" action="details.php" name="ProductDetails">
		                                        <input type="hidden"  value="'.$row['SKU'].'" name="chosen_product">
		                                       		<h4 class="price">
		                                       			<button class="btn_cus" type="submit" style="background-color: #008A00">Add to Cart</button>
		                                      			<button class="btn_cus" type="submit">View Product</button></h4>
		                                       </form>
		                                       <div class="dropdown">
												  <button class="btn btn-default dropdown-toggle sizeGroup" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												    Sizes
												    <span class="caret"></span>
												  </button>
												  <ul class="dropdown-menu sizeDrop" aria-labelledby="dropdownMenu1">
												    <li class="sizes"><a href="#">Small</a></li>
												    <li class="sizes"><a href="#">Medium</a></li>
												    <li class="sizes"><a href="#">Large</a></li>
												    <li class="sizes"><a href="#">X Large</a></li>
												  </ul>
												</div>
	                                     	</div>
	                                    </div>                                    
		                           </li>
                           </ul>
                           <div class="clearfix"></div>
	    	';
		}
	}

	function return_product($pro) {;
		$sql = "SELECT * FROM Inventory WHERE SKU = '$pro' ORDER BY Price";
		//Testing purposes only.
		//echo $sql;
		$result = @mysql_query($sql);
	    while($row = @mysql_fetch_array($result)) {
	    	echo '

                            <img src="'.$row['Image'].'" alt="">
                                
                                </div>
                                <div class="slider_div_right">
                                    <h4>Item: '.$row['Name'].'</h4>
                                    <form method="get" action="AddToCart" name="AddToCart">
									<input type="hidden"  value='.$row['SKU'].' name="chosen_product">
                                    <input type ="submit" class="btn btn-success_product" value="Add to Cart"/>
                                    </form>
                                    <h5>Price: <b>$'.$row['Price'].'</b></h5>
                                    <p>Department: '.$row['Department'].' </p>
                                </div>
                               	<div class="clearfix"></div>
                                <div class="product_description des_title">
                                    <p class="heading_wibr">Description</p>
                                    <p>'.$row['Description'].'</p>
                                </div>';
		}
	}

	function return_cart($userName) {;
		$sql = "SELECT * FROM inventory, orders WHERE Cart = '$userName' ORDER BY Price";
		//Testing purposes only.
		//echo $sql;
		$result = @mysql_query($sql);
	    while($row = @mysql_fetch_array($result)) {
	    	echo '
                       		<ul>
								<li>'.
			                     	'<img src="'.$row['Image'].'" height="170" width="130">
			                         <div class="big_pro_right">
	                                       <h5>'.$row['Name'].'</h5>
	                                       <h4 class="price"><b>Cost: </b>$'.$row['Price'].'</h4>
	                                       <div class="clearfix"></div>
	                                       <h2><b>Description:</b></h2>
	                                       <p class="listing_description">'.$row['Description'].'</p>
	                                       <div class="left_pro_footer">
		                                       <h5>'.$row['Department'].'</h5>
		                                        <form method="get" action="cart.php" name="ProductDetails">
		                                        <input type="hidden"  value="'.$row['SKU'].'" name="chosen_product">
		                                       		<h4 class="price">
		                                      			<button class="btn_cus" type="submit">Remove Product</button></h4>
		                                       </form>
	                                     	</div>
	                                    </div>                                    
		                           </li>
                           </ul>
	    	';
		}
	}

function update_cart($user, $item) {
	$sql = "UPDATE inventory SET Cart = '$user' WHERE SKU = '$item'";
	$result = @mysql_query($sql);
}

function update_listings($user, $item, $price) {
	$sql = "INSERT INTO orders (User_Name, SKU, Price) 
			VALUES ('$user', '$item', '$price')";
	$result = @mysql_query($sql);
	$sql1 = "DELETE FROM inventory WHERE SKU = '$item'";
	$result1 = @mysql($sql1);
}

function cart_total() {
	$sql = "SELECT * FROM inventory WHERE ";
}





?>

