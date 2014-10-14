<?php include 'admin_head.php'; 

$category = "tops";
$id = intval($_GET['id']);

?>

<div class="content">
<?php include 'subnav.php' ?>
<div class="page-title">
    <h2> Add Products: </h2>
  </div>

	<div class="check-out">
		<div class="user-info">
			<h3> Enter Product Info: </h3>
			<form role="form">
				<div class="form-row">
			  		<div class="form-group">
			    	<label for="productname_input">Product Name</label>
			    	<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Product Name">
			  		</div>
				</div>

				<div class="form-row">
					<div class="form-group">
			    		<label for="firstname_input">Product Description</label>
			    		<textarea rows="9"  class="form-control lrg-txt" id="address_input" placeholder="Enter Address "></textarea>
			  		</div>
				</div>
				

				<div class="form-row">
			  		<div class="form-group c-5">
			    		<label for="sku_input">SKU</label>
			    		<input type="text" class="form-control md" id="city_input" placeholder="Enter City">
			  		</div>
			  	
			  	
			  		<div class="form-group c-5">
			    	<label for="zipcode_input">Cost</label>
			    	<input type="text" class="form-control md" id="zipcode_input" placeholder="Enter Zip Code">
			  		</div>
				</div>

				<div class="form-row">
			  		<div class="form-group c-5">
			    		<label for="email_input">Weight</label>
			    		<input type="text" class="form-control md" id="email_input" placeholder="Enter email">
			  		</div>
			  	
			  	
			  		<div class="form-group c-5">
			    	<label for="phone_input">Color</label>
			    	<input type="text" class="form-control md" id="phone_input" placeholder="Enter Phone Number">
			  		</div>
				</div>
				<div class="form-row">
			  		<div class="form-group c-5">
			    		<label for="email_input">Category: </label>
			    		<select>
							<option  value="shoes"> Shoes </option>
							<option  value="shoes"> Tops </option>
							<option  value="shoes"> Bottoms </option>
							<option  value="shoes"> Accessories </option>
			    		</select>
			  		</div>
			  		<div class="form-group c-5">
			    		<label for="phone_input">Quantity</label>
			    		<input type="text" class="form-control md" id="quantity_input" placeholder="Enter Quantity">
			  		</div>
			  	
			  	
			  		
				</div>
			

			  <button type="submit" class="button">Submit</button>
			</form>
		</div>


</div>

 <?php include 'footer.php'; ?>

 </div>