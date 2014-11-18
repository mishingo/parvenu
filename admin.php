<?php 

// Define variables for SEO
$pageTitle = 'Parvenue - Administration';
$pageDescription = 'Add, edit, or delete products from the inventory';

include 'admin_head.php'; 

session_start();

if(isset($_SESSION["currentuser"])){
	$currentuser = $_SESSION["currentuser"];
	$sql = "SELECT * FROM Users WHERE email = '$currentuser' ";
	$result = mysqli_query(get_dbconnection(),$sql);

	$row = mysqli_fetch_assoc($result);

	

	if($row['privilege'] == 2  ){
		print "your a customer";
		header('Location: account.php');
	} 

} else {
	header('Location: home.php');
}

?>





<div class="content">
	<?php include 'subnav.php' ?>
	<div class="page-title">
    	<h2> Add Products: </h2>
  	</div>


<?php 

if (isset($_POST["product_name"]) && !empty($_POST["product_name"])) {

if ($_POST["product_category"] == 'bottoms'){
	$target = "img/bottoms/";
} 

if ($_POST["product_category"] == 'shoes'){
	$target = "img/shoes/";
} 

if ($_POST["product_category"] == 'accessories'){
	$target = "img/accessories/";
} 

if ($_POST["product_category"] == 'tops'){
	$target = "img/tops/";
} 

$target = $target . basename( $_FILES['product_file']['name']);

$product_file = $target;
$product_name = $_POST["product_name"];
$description = $_POST["product_description"];
$color = $_POST["product_color"];
$price = $_POST["product_price"];
$cost = $_POST["product_cost"];
$weight = $_POST["product_weight"];
$sku = $_POST["product_sku"];
$category = $_POST["product_category"];


if(move_uploaded_file($_FILES['product_file']['tmp_name'], $target)) {

	$sql = "INSERT INTO `products`(`product_name`,`description`,`category`,`sku`,`cost`,`price`,`product_image`,`weight`,`color`) VALUES ('$product_name','$description','$category','$sku','$cost','$price','$product_file','$weight','$color')";
	mysqli_query(get_dbconnection(),$sql);
	echo $product_name. "has been added!";
} else {
	echo "sorry";
	
}

    	
	}else{  
    	echo "N0, homie";
	}
?>
	
		<div class="form-container">
			
			<form enctype="multipart/form-data" role="form" action="admin.php" method="POST">
			<div class="form-group">
			    	<label>Product Name</label>
			    	<input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter Product Name">
		

		
			    		<label>Product Description</label>
			    		<textarea rows="9"  name="product_description" class="form-control lrg-txt" id="product_description" placeholder="Enter Product Description"></textarea>
			
					<label>Color</label>
			    	<input type="text" name="product_color" class="form-control md" id="color" placeholder="Enter color">
	
	
			</div>
			<div class="form-group">
				
			    		<label>Price</label>
			    		<input type="text" name="product_price" class="form-control md" id="price" placeholder="Enter Price">
	
			  	
			  	
			  		
			    		<label>Cost</label>
			    		<input type="text" name="product_cost"  class="form-control md" id="cost" placeholder="Enter Cost">
		
			
			    		<label>Weight</label>
			    		<input type="text" name="product_weight"  class="form-control md" id="weight" placeholder="Enter weight">
	
			  	
			  	
	
			    		<label>SKU</label>
			    		<input type="text" name="product_sku" class="form-control md" id="sku" placeholder="Enter SKU Number">
			
			    		<label>Category: </label>
			    		<select name="product_category" >
							<option  value="shoes"> shoes </option>
							<option  value="tops"> tops </option>
							<option  value="bottoms"> bottoms </option>
							<option  value="accessories"> accessories </option>
			    		</select>
						
						

			    		<label>File Upload: </label>
			    		<input type="file" name="product_file">
			
			
			    		
			 

			  <input type="submit" class="button">
			</div>

			</form>
		</div>
	



 <?php include 'footer.php'; ?>

 </div>