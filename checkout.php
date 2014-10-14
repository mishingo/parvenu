<?php include 'head.php'; 

$category = "tops";
$id = intval($_GET['id']);
?>

<div class="content">
<?php include 'subnav.php' ?>
	<div class="page-title">
    	<h1> Checkout: </h1>
  	</div>
	
	<div class="check-out">
		<div class="user-info">
			<h3> Enter Shipping Info: </h3>
			<form role="form">
				<div class="form-row">
			  		<div class="form-group c-5">
			    		<label for="firstname_input">First Name</label>
			    		<input type="text" class="form-control md" placeholder="Enter First Name">
			  		</div>
			  	
			  	
			  		<div class="form-group c-5">
			    	<label for="lastname_input">Last Name</label>
			    	<input type="text" class="form-control md"  placeholder="Enter Last Name">
			  		</div>
				</div>

				<div class="form-row">
					<div class="form-group">
			    		<label for="address_input">Address</label>
			    		<input type="text" class="form-control md"  placeholder="Enter Address ">
			  		</div>
				</div>
				<div class="form-row">
					<div class="form-group">
			    		
			    		<input type="text" class="form-control " placeholder="Enter Address ">
			  		</div>
				</div>

				<div class="form-row">
			  		<div class="form-group c-5">
			    		<label for="city_input">City</label>
			    		<input type="text" class="form-control md"  placeholder="Enter City">
			  		</div>
			  	
			  	
			  		<div class="form-group c-5">
			    	<label for="zipcode_input">Zip Code</label>
			    	<input type="text" class="form-control md" placeholder="Enter Zip Code">
			  		</div>
				</div>

				<div class="form-row">
			  		<div class="form-group c-5">
			    		<label for="email_input">E-mail</label>
			    		<input type="text" class="form-control md"  placeholder="Enter email">
			  		</div>
			  	
			  	
			  		<div class="form-group c-5">
			    	<label for="phone_input">Phone Number</label>
			    	<input type="text" class="form-control md" placeholder="Enter Phone Number">
			  		</div>
				</div>
			</form>

			<h3> Enter Billing Info: </h3>
			<form role="form">
				<div class="form-row">
					<div class="form-group">
			    		<label for="firstname_input">Credit Card Number</label>
			    		<input type="text" class="form-control"  placeholder="Enter CC Number ">
			  		</div>
				</div>
				<div class="form-row">
			  		<div class="form-group c-5">
			    		<label for="expiration_input">Expiration Date</label>
			    		<input type="text" class="form-control md"  placeholder="Enter Expiration Date">
			  		</div>
			  	
			  	
			  		<div class="form-group c-5">
			    	<label for="cv_input">CV</label>
			    	<input type="text" class="form-control md"  placeholder="Enter CV">
			  		</div>
				</div>

				
				
				


			  <button type="submit" class="button">Submit</button>
			</form>
		</div>
	
		<div class="product-review">
			<div class="card">
			<?php

				if(!empty($id)){

					$sql = "SELECT * FROM products WHERE id = '$id' ";
					$result = mysqli_query(get_dbconnection(),$sql);

					$row = mysqli_fetch_assoc($result);

					$outhtml = "<h3> Product Review:</h3>";
					$outhtml .= "<div class='review-row border-bottom'>";
					$outhtml .= "<div class='review-item'>";
					$outhtml .= "<p> Item:</p>";
					$outhtml .= "</div>";
					$outhtml .= "<div class='review-quantity'>";
					$outhtml .= "<p> Quantity:</p>";
					$outhtml .= "</div>";
					$outhtml .= "<div class='review-price'>";
					$outhtml .= "<p> Price:</p>";
					$outhtml .= "</div>";
					$outhtml .= "</div>";

					$outhtml .= "<div class='review-row'>";
					$outhtml .= "<div class='review-item'>";
					$outhtml .= "<p>".$row['product_name']."</p>";
					$outhtml .= "</div>";
					$outhtml .= "<div class='review-quantity'>";
					$outhtml .= "<p>1</p>";
					$outhtml .= "</div>";
					$outhtml .= "<div class='review-price'>";
					$outhtml .= "<p>".$row['price']."</p>";
					$outhtml .= "</div>";
					$outhtml .= "</div>";

					$outhtml .= "<div class='review-row'>";
					$outhtml .= "<div class='review-item'>";
					$outhtml .= "<p>Standard Shipping</p>";
					$outhtml .= "</div>";
					$outhtml .= "<div class='review-quantity'>";
					$outhtml .= "<p>1</p>";
					$outhtml .= "</div>";
					$outhtml .= "<div class='review-price'>";
					$outhtml .= "<p>$5.00</p>";
					$outhtml .= "</div>";
					$outhtml .= "</div>";
					
					$outhtml .= "<div class='review-row'>";
					$total = $row['price'] + 5;
					$outhtml .= "<h3>Total Price: $".$total."</h3>";
					$outhtml .= "</div>";

					echo $outhtml;
				
				} else {
					echo "<h3> Sorry Meng No Items </h3>";
				}
			?>
			</div>
	</div>
		</div>
<?php include 'footer.php'; ?>
	</div>

