<?php include 'head.php'; 

$category = "tops";
$id = intval($_GET['id']);

?>

<div class="content">
<?php include 'subnav.php' ?>
	<div class="page-title">
    	<h1> Cart: </h1>
  	</div>

	<div class="cart-head">
		<div class="cart-item">
			<h3> Item </h3>
		</div>
		<div class="cart-info">
			<h3> Info </h3>
		</div>
		<div class="cart-quantity">
			<h3> Quantity </h3>
		</div>
		<div class="cart-price">
			<h3> Price </h3>
		</div>
	</div>

	<?php 

	if(!empty($id)){
		$sql = "SELECT * FROM products WHERE id = '$id' ";
		$result = mysqli_query(get_dbconnection(),$sql);

		$row = mysqli_fetch_assoc($result);
		//print_r($row);

		$outhtml = "<div class='cart-body'>";
		$outhtml .= "<div class='cart-item'>";
		$outhtml .= "<img src='".$row['product_image']."' alt='item'>"; 
		
		$outhtml .= "</div>";
		$outhtml .= "<div class='cart-info'>";
		$outhtml .= "<h1>".$row['product_name']."</h1>";
		$outhtml .= "<p>#000".$row['sku']."</p>";
		$outhtml .= "<p>Ships within 2 days</p>";
		$outhtml .= "</div>";
		$outhtml .= "<div class='cart-quantity'>";
		$outhtml .= "<h1> 1 </h1>";
		$outhtml .= "</div>";
		$outhtml .= "<div class='cart-price'>";
		$outhtml .= "<h1>$".$row['price']."</h1>";
		$outhtml .= "</div>";
		$outhtml .= "</div>";

		$outhtml .= "<div class='cart-footer'>";
		$outhtml .= "<h2>Subtotal:<span class='subtotal'> $".$row['price']."</span></h2>";
		$outhtml .= "<a href='checkout.php?id=".$row['id']."'  class='button-a'>Checkout</a>";
		$outhtml .= "</div>";
		echo $outhtml;

	} else {
		echo "shit outta luck";
	}


	?>
	

 

</div>