<?php include 'head.php'; 

$category = "tops";
$id = intval($_GET['id']);
$category = $_GET['category'];

?>

<div class="content">
<?php include 'subnav.php' ?>
<div class="page-title">
    <h1> <?php print $category; ?> </h1>
  </div>
<?php 
if(!empty($id)){
	
	$sql = "SELECT * FROM products WHERE id = '$id' ";
	$result = mysqli_query(get_dbconnection(),$sql);

	$row = mysqli_fetch_assoc($result);

	$outhtml = "<div class='product' >";
	$outhtml .= "<div class='product-gallery' >";
	$outhtml .= "<img src='".$row['product_image']."' alt='item'>"; 
	$outhtml .= "</div>";
	$outhtml .= "<div class='product-content'>";
	$outhtml .= "<h1>".$row['product_name']."</h1>";
	$outhtml .= "<p>#000".$row['sku']."</p>";
	$outhtml .= "<p>".$row['description']."</p>"; 
	$outhtml .= "<a href='cart.php?id=".$row['id']."&category=".$category."'  class='button-a'>Buy Now</a>";
	$outhtml .= "<div class='product-rating' >";
	$outhtml .= "<h3> Product Rating </h3>";
	$outhtml .= "<ul class='list-inline'>";
	$outhtml .= "<li><img src='img/rating-full.png'></li>";
	$outhtml .= "<li><img src='img/rating-full.png'></li>";
	$outhtml .= "<li><img src='img/rating-full.png'></li>";
	$outhtml .= "<li><img src='img/rating-full.png'></li>";
	$outhtml .= "<li><img src='img/rating-empty.png'></li>";
	$outhtml .= "</ul>";
	$outhtml .= "</div>";
	$outhtml .= "</div>";
	
	$outhtml .= "</div>";

	echo $outhtml;
	 include 'footer.php'; 

} else {
	
	$sql = "SELECT * FROM products WHERE category = '$category' ";
	$result = mysqli_query(get_dbconnection(),$sql);

	echo "<div class='home-catalog'>";
		
	while($row = mysqli_fetch_assoc($result)) {
		 
		 $outhtml = "";

		 $outhtml .= "<div class='home-item'>";
		 $outhtml .= "<img src='". $row['product_image'] ."' alt='item'>";
		 $outhtml .= "<div class='item-description'>";
		 $outhtml .= "<h4><a href='".$_SERVER['PHP_SELF']."?id=".$row['id']."&category=".$category."'>". $row['product_name'] ."</a></h4>";
		 $outhtml .= "<p>$". $row['price'] ."</p>";
		 $outhtml .= "</div>";
		 $outhtml .= "</div>";
		 
		 echo $outhtml;

	}
	echo "</div>";
	include 'footer.php'; 
}
	
	

?>


	

</div>