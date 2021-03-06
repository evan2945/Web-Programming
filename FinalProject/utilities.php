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
			                     	'<img src="graphics/'.$row['Image'].'" height="170" width="130">
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
		                                      			<button class="btn_cus" type="submit">View Product</button></h4>
		                                       </form>		                                    
	                                     	</div>
	                                    </div>                                    
		                           </li>
                           </ul>
                           <div class="clearfix"></div>
	    	';
		}
	}

	function return_department($key) {
		if($key === "All"){
			$sql = "SELECT * FROM Inventory";
		} else {
			$sql = "SELECT * FROM Inventory WHERE Department='$key'";
		}
		//Testing purposes only.
		//echo $sql;
		$result = @mysql_query($sql);
	    while($row = @mysql_fetch_array($result)) {
	    	echo '
                       		<ul>
								<li>'.
			                     	'<img src="graphics/'.$row['Image'].'" height="170" width="130">
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
		                                      			<button class="btn_cus" type="submit">View Product</button></h4>
		                                       </form>		                                    
	                                     	</div>
	                                    </div>                                    
		                           </li>
                           </ul>
                           <div class="clearfix"></div>
	    	';
		}
	}

	function profile($user) {
		$sql = "SELECT * FROM Customers WHERE User_Name='$user'";
		$result = @mysql_query($sql);
		while($row = @mysql_fetch_array($result)) {
			echo '
				<div class="regResult">
					<h3>Hi, '.$row['First_Name'].'. We have the following profile information for you:</h3><br>
					<h3>Username:  '.$row['User_Name'].'</h3><br>
					<h3>First Name:  '.$row['First_Name'].'</h3><br>
					<h3>Last Name:  '.$row['Last_Name'].'</h3><br>
					<h3>Email:  '.$row['Email'].'<h3><br>
					<br>
					<h4 class="regResult">Thanks for your continued patronage!</h4><br>
				</div>
			';
		}
	}
	

	function return_product($pro) {
		$sql = "SELECT * FROM Inventory WHERE SKU = '$pro' ORDER BY Price";
		//Testing purposes only.
		//echo $sql;
		$result = @mysql_query($sql);
	    while($row = @mysql_fetch_array($result)) {
	    	if(isset($_SESSION['eid'])){
		    	echo '
	
	                            <img src="graphics/'.$row['Image'].'" alt="">
	                                  
	                                </div>
	                                <div class="slider_div_right">
	                                    <h4>Item: '.$row['Name'].'</h4>
	                                    <form method="post" action="updateCart.php" name="AddToCart">
										<input type="hidden" value='.$row['SKU'].' name="chosen_product">
										<input type="hidden" value='.$_SESSION['eid'].' name="chosen_user">
	                                    <input type ="submit" class="btn btn-success_product" 
	                                    value="Add to Cart" name="submit"/>
	                                    </form>
	                                    <h5>Price: <b>$'.$row['Price'].'</b></h5>
	                                    <p>Department: '.$row['Department'].' </p>
	                                </div>
	                                <input type="radio" name="sizes" value="0">Small
	                                <input type="radio" name="sizes" value="1">Medium
	                                <input type="radio" name="sizes" value="2">Large
	                                <input type="radio" name="sizes" value="3">X Large
	                               	<div class="clearfix"></div>
	                                <div class="product_description des_title">
	                                    <p class="heading_wibr">Description</p>
	                                    <p>'.$row['Description'].'</p>
	                                </div>';
			}
			
			else {
				echo '
	
	                            <img src="graphics/'.$row['Image'].'" alt="">
	                                  
	                                </div>
	                                <div class="slider_div_right">
	                                    <h4>Item: '.$row['Name'].'</h4>
	                                    <form method="post" action="unloggedCart.php" name="AddToCart">
										<input type="hidden" value='.$row['SKU'].' name="chosen_product">
	                                    <input type ="submit" class="btn btn-success_product" 
	                                    value="Add to Cart" name="submit"/>
	                                    </form>
	                                    <h5>Price: <b>$'.$row['Price'].'</b></h5>
	                                    <p>Department: '.$row['Department'].' </p>
	                                </div>
	                                <input type="radio" name="sizes" value="0">Small
	                                <input type="radio" name="sizes" value="1">Medium
	                                <input type="radio" name="sizes" value="2">Large
	                                <input type="radio" name="sizes" value="3">X Large
	                               	<div class="clearfix"></div>
	                                <div class="product_description des_title">
	                                    <p class="heading_wibr">Description</p>
	                                    <p>'.$row['Description'].'</p>
	                                </div>';
			}
		}
	}

	function return_cart($userName) {
		$sql = "SELECT * FROM Inventory ORDER BY SKU";
		//Testing purposes only.
		//echo $sql;
		$result = @mysql_query($sql);
		$sql1 = "SELECT * FROM Orders ORDER BY SKU";
		$result1 = @mysql_query($sql1);
		$i = @mysql_num_rows(@mysql_query("SELECT * FROM Orders"));
		//echo $i."<br>";
		$index = 0;
		$tableInfo = array();
	    while($row1 = @mysql_fetch_array($result1)) {
	    	$tableInfo[$index] = $row1;
	    	$index++;
	    }
	    /* TESTING PURPOSES ONLY!
	    for($j = 0; $j < $i; $j++){
	    	echo $tableInfo[$j]['SKU']." ";
	    	echo $tableInfo[$j]['User_Name']."<br>";
	    }
	    */
	    while($row = @mysql_fetch_array($result)) {
	    	for($j = 0; $j < $i; $j++) {
	    		if(($userName == $tableInfo[$j]['User_Name']) && ($row['SKU'] == $tableInfo[$j]['SKU'])) {
	    				echo '
                       		<ul>
								<li>'.
			                     	'<img src="graphics/'.$row['Image'].'" height="170" width="130">
			                         <div class="big_pro_right">
	                                       <h5>'.$row['Name'].'</h5>
	                                       <h4 class="price"><b>Cost: </b>$'.$row['Price'].'</h4>
	                                       <div class="clearfix"></div>
	                                       <h2><b>Description:</b></h2>
	                                       <p class="listing_description">'.$row['Description'].'</p>
	                                       <div class="left_pro_footer">
		                                       <h5>'.$row['Department'].'</h5>
		                                        <form method="post" action="updateCart.php" name="ProductDetails">
		                                        <input type="hidden"  value="'.$row['SKU'].'" name="remove_product">
		                                        <input type="hidden" value='.$_SESSION['eid'].' name="chosen_user">
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
	    }
		echo '
			<form method="post" action="creditCard.php" name="checkout">
				<h4 class="price">
					<button class="btn_cus" type="submit">Checkout!</button>
				</h4>
			</form>
		';
	}


function remove_cart($item) {
	$sql = "DELETE FROM Orders WHERE SKU = '$item'";
	$result = @mysql_query($sql);
}

function update_listings($user, $item, $price) {
	$sql = "INSERT INTO Orders (User_Name, SKU, Price) 
			VALUES ('$user', '$item', '$price')";
	$result = @mysql_query($sql);
	$sql1 = "DELETE FROM Inventory WHERE SKU = '$item'";
	$result1 = @mysql($sql1);
}

function cart_total($user) {
	$sql = "SELECT * FROM Orders";
	$result = @mysql_query($sql);
	$i = 0;
	while($row = @mysql_fetch_array($result)) {
		if($row['User_Name'] == $user){
				$i += $row['Price'];
			}
		}
		return $i;
}






?>

