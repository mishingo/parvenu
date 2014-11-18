<?php
include 'admin_head.php'; 
session_start();

if (isset($_GET['productid']) && !empty($_GET['productid'])) {
	$productid = $_GET['productid'];
	$sql = "DELETE FROM products WHERE id = $productid";
  			$result = mysqli_query(get_dbconnection(),$sql);
  			$row = mysqli_fetch_assoc($result);
  	$_SESSION['delete_msg'] = "Item number ".$productid." has been delete!";
  	header('Location: admin_inventory.php');
}

if (isset($_GET['itemid']) && !empty($_GET['itemid'])) {
	$itemid = $_GET['itemid'];
	$sql = "DELETE FROM transaction WHERE id = '$itemid' ";
  			$result = mysqli_query(get_dbconnection(),$sql);
  			
  	$_SESSION['delete_msg'] = "Item number ".$itemid." has been delete!";
  	echo $sql;
  	header('Location: admin_orders.php');
}

if (isset($_GET['userid']) && !empty($_GET['userid'])) {
  $userid = $_GET['userid'];
  $sql = "DELETE FROM Users WHERE id = '$userid' ";
        $result = mysqli_query(get_dbconnection(),$sql);
        
    $_SESSION['delete_msg'] = "User number ".$userid." has been delete!";
    echo $sql;
    header('Location: admin_users.php');
}
?>