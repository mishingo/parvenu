<?php include 'admin_head.php'; 
$productid = $_GET['productid'];

session_start();

if(isset($_SESSION["currentuser"])){
	$currentuser = $_SESSION["currentuser"];
	$sql = "SELECT * FROM Users WHERE email = '$currentuser' ";
	$result = mysqli_query(get_dbconnection(),$sql);

	$row = mysqli_fetch_assoc($result);

	if($row['privilege'] ==2){
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
    	<h3> Edit Product: </h3>
  	</div>

<?php 
print $productid."<br />";


	$sql = "SELECT * FROM products WHERE id = '$productid' ";
	$result = mysqli_query(get_dbconnection(),$sql);

	$row = mysqli_fetch_assoc($result);
?>
	<div class="form-container">
		
			<div class="form-group">
				<form role="form" action="update.php?productid=<?php echo $productid ?>" method="POST">
					<label>Product Name</label><br />
					<input type="text" name="product_name" class="form-control form-update" id="product_name" placeholder="Product Name" value="<?php echo $row['product_name'] ?>">
					<input type="submit" class="button-inline" value="update">
				</form>
			</div>

			<div class="form-group">
				<form role="form" action="update.php?productid=<?php echo $productid ?>" method="POST">
					<label>Price</label><br />
					<input type="text" name="price" class="form-control form-update" id="price" placeholder="Enter Price" value="<?php echo $row['price'] ?>">
					<input type="submit" class="button-inline" value="update">
				</form>
			</div>

			<div class="form-group">
				<form role="form" action="update.php?productid=<?php echo $productid ?>" method="POST">
					<label>Product Description</label><br />
					<textarea rows="9"  name="product_description" class="form-control form-update" id="product_description"><?php echo $row['description'] ?></textarea>
					<input type="submit" class="button-inline" value="update">
				</form>
			</div>
			
			<div class="form-group">
				<form role="form" action="update.php?productid=<?php echo $productid ?>" method="POST">
					<label>Cost</label><br />
					<input type="text" name="cost" class="form-control form-update" id="cost"  value="<?php echo $row['cost'] ?>">
					<input type="submit" class="button-inline" value="update">
				</form>
			</div>

			<div class="form-group">
				<form role="form" action="update.php?productid=<?php echo $productid ?>" method="POST">
					<label>Category: </label>
			    		<select name="product_category" >
							<option  value="shoes"> shoes </option>
							<option  value="tops"> tops </option>
							<option  value="bottoms"> bottoms </option>
							<option  value="accessories"> accessories </option>
			    		</select>
					<input type="submit" class="button-inline" value="update">
				</form>
			</div>
			
			<div class="form-group">
				<form role="form" action="update.php?productid=<?php echo $productid ?>" method="POST">
					<label>SKU</label><br />
					<input type="text" name="sku" class="form-control form-update" id="sku" value="<?php echo $row['sku'] ?>">
					<input type="submit" class="button-inline" value="update">
				</form>
			</div>

			<div class="form-group">
				<form role="form" action="update.php?productid=<?php echo $productid ?>" method="POST">
					<label>Weight</label><br />
					<input type="text" name="weight" class="form-control form-update" id="weight" value="<?php echo $row['weight'] ?>">
					<input type="submit" class="button-inline" value="update">
				</form>
			</div>

			<div class="form-group">
				<form role="form" action="update.php?productid=<?php echo $productid ?>" method="POST">
					<label>color</label><br />
					<input type="text" name="color" class="form-control form-update" id="weight" value="<?php echo $row['color'] ?>">
					<input type="submit" class="button-inline" value="update">
				</form>
			</div>

			<a href="delete.php?productid=<?php echo $productid ?>" class="button-delete">Delete</a>			


		
	</div>
	



 <?php include 'footer.php'; ?>

 </div>