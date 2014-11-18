<?php
include 'admin_head.php'; 
session_start();


if (isset($_GET['productid']) && !empty($_GET['productid'])) {
	$productid = $_GET['productid'];

	if (isset($_POST['product_name'])) {
		$product_name = $_POST['product_name'];

		$sql = "UPDATE `products` SET `product_name`='$product_name' WHERE `id`= '$productid'";
  		$result = mysqli_query(get_dbconnection(),$sql);
  			
  		$_SESSION['update_msg'] = "Item number ".$productid." has been updated!";
  		header('Location: admin_inventory.php');
	}	

	if (isset($_POST['price'])) {
		$price = $_POST['price'];

		$sql = "UPDATE `products` SET `price`='$price' WHERE `id`= '$productid'";
  		$result = mysqli_query(get_dbconnection(),$sql);
  			
  		$_SESSION['update_msg'] = "Item number ".$productid." has been updated!";
  		header('Location: admin_inventory.php');
	}	
	
	if (isset($_POST['product_description'])) {
		$description = $_POST['product_description'];

		$sql = "UPDATE `products` SET `description`='$description' WHERE `id`= '$productid'";
	  	$result = mysqli_query(get_dbconnection(),$sql);
	  			
	  	$_SESSION['update_msg'] = "Item number ".$productid." has been updated!";
	  	header('Location: admin_inventory.php');
	
	}

	if (isset($_POST['cost'])) {
		$cost = $_POST['cost'];

		$sql = "UPDATE `products` SET `cost`='$cost' WHERE `id`= '$productid'";
	  	$result = mysqli_query(get_dbconnection(),$sql);
	  			
	  	$_SESSION['update_msg'] = "Item number ".$productid." has been updated!";
	  	header('Location: admin_inventory.php');
	
	}	

	if (isset($_POST['product_category'])) {
		$category = $_POST['product_category'];

		$sql = "UPDATE `products` SET `category`='$category' WHERE `id`= '$productid'";
	  	$result = mysqli_query(get_dbconnection(),$sql);
	  			
	  	$_SESSION['update_msg'] = "Item number ".$productid." has been updated!";
	  	header('Location: admin_inventory.php');
	
	}	

	if (isset($_POST['sku'])) {
		$sku = $_POST['sku'];

		$sql = "UPDATE `products` SET `sku`='$sku' WHERE `id`= '$productid'";
	  	$result = mysqli_query(get_dbconnection(),$sql);
	  			
	  	$_SESSION['update_msg'] = "Item number ".$productid." has been updated!";
	  	header('Location: admin_inventory.php');
	
	}	

	if (isset($_POST['weight'])) {
		$weight = $_POST['weight'];

		$sql = "UPDATE `products` SET `weight`='$weight' WHERE `id`= '$productid'";
	  	$result = mysqli_query(get_dbconnection(),$sql);
	  			
	  	$_SESSION['update_msg'] = "Item number ".$productid." has been updated!";
	  	header('Location: admin_inventory.php');
	
	}	

	if (isset($_POST['color'])) {
		$color = $_POST['color'];

		$sql = "UPDATE `products` SET `color`='$color' WHERE `id`= '$productid'";
	  	$result = mysqli_query(get_dbconnection(),$sql);
	  			
	  	$_SESSION['update_msg'] = "Item number ".$productid." has been updated!";
	  	header('Location: admin_inventory.php');
	
	}
}

if (isset($_GET['itemid']) && !empty($_GET['itemid'])) {
	$itemid = $_GET['itemid'];

	if (isset($_POST['product_id'])) {
		$product_id = $_POST['product_id'];

		$sql = "UPDATE `transaction` SET `product_id`='$product_id' WHERE `id`= '$itemid'";
	  	$result = mysqli_query(get_dbconnection(),$sql);
	  			
	  	$_SESSION['update_msg'] = "Item number ".$itemid." has been updated!";
	  	header('Location: admin_orders.php');
	}

	if (isset($_POST['total'])) {
		$transaction_total = $_POST['total'];

		$sql = "UPDATE `transaction` SET `transaction_total`='$transaction_total' WHERE `id`= '$itemid'";
	  	$result = mysqli_query(get_dbconnection(),$sql);
	  			
	  	$_SESSION['update_msg'] = "Item number ".$itemid." has been updated!";
	  	header('Location: admin_orders.php');
	}

	if (isset($_POST['user_email'])) {
		$user_email = $_POST['user_email'];

		$sql = "UPDATE `transaction` SET `user_email`='$user_email' WHERE `id`= '$itemid'";
	  	$result = mysqli_query(get_dbconnection(),$sql);
	  			
	  	$_SESSION['update_msg'] = "Item number ".$itemid." has been updated!";
	  	header('Location: admin_orders.php');
	}
}

if (isset($_GET['userid']) && !empty($_GET['userid'])) {
	$userid = $_GET['userid'];

	

	if (isset($_POST['fname'])) {
		$fname = $_POST['fname'];

		$sql = "UPDATE `Users` SET `fname`='$fname' WHERE `id`= '$userid'";
	  	$result = mysqli_query(get_dbconnection(),$sql);
	  			
	  	$_SESSION['update_msg'] = "User number ".$userid." has been updated!";
	  	header('Location: admin_users.php');
	}

	if (isset($_POST['lname'])) {
		$lname = $_POST['lname'];

		$sql = "UPDATE `Users` SET `lname`='$lname' WHERE `id`= '$userid'";
	  	$result = mysqli_query(get_dbconnection(),$sql);
	  			
	  	$_SESSION['update_msg'] = "User number ".$userid." has been updated!";
	  	header('Location: admin_users.php');
	}

	if (isset($_POST['email'])) {
		$email = $_POST['email'];

		$sql = "UPDATE `Users` SET `email`='$email' WHERE `id`= '$userid'";
	  	$result = mysqli_query(get_dbconnection(),$sql);
	  			
	  	$_SESSION['update_msg'] = "User number ".$userid." has been updated!";
	  	header('Location: admin_users.php');
	}

	if (isset($_POST['privilege'])) {
		$privilege = $_POST['privilege'];

		$sql = "UPDATE `Users` SET `privilege`='$privilege' WHERE `id`= '$userid'";
	  	$result = mysqli_query(get_dbconnection(),$sql);
	  			
	  	$_SESSION['update_msg'] = "User number ".$userid." has been updated!";
	  	header('Location: admin_users.php');
	}

}
?>

