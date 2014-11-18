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


if (isset($_POST["rating_title"])) {
	$title = $_POST["rating_title"];
	$review = $_POST["rating_description"];
	$rating = $_POST["product_rating"];
	$user_email = $_SESSION["currentuser"];
	$sql3 = "INSERT INTO `product_rating`(`user_email`,`product_id`,`rating`,`review`,`title`) VALUES ('$user_email','$id','$rating','$review','$title')";
	mysqli_query(get_dbconnection(),$sql3);
	echo "your review has been added";
} 


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
	$outhtml .= "<h3>$".$row['price']."</h3>"; 
	$outhtml .= "<a href='add-to-cart.php?id=".$row['id']."&category=".$category."'  class='button-a'>Buy Now</a>";
		$sql4="SELECT * FROM product_rating WHERE product_id='$id'";
		$result4 = mysqli_query(get_dbconnection(),$sql4);
		if(mysqli_num_rows($result4)){
			$count = mysqli_num_rows($result4);
			while($row4 = mysqli_fetch_assoc($result4)) {
			$totalRating += $row4['rating'];
			}
		}
			$totalRating /= $count;
			$totalRating = round($totalRating);

			$outhtml .= "<div class='product-rating' >";
			$outhtml .= "<h3> Overall 	Product Rating </h3>";

			if ($totalRating == 1){
				$outhtml .= "<img src='img/1-star.jpg' alt='1 star'/>";
			}

			if ($totalRating == 2){
				$outhtml .= "<img src='img/2-star.jpg' alt='2 star'/>";
			}

			if ($totalRating == 3){
				$outhtml .= "<img src='img/3-star.jpg' alt='3 star'/>";
			}

			if ($totalRating == 4){
				$outhtml .= "<img src='img/4-star.jpg' alt='4 star'/>";
			}

			if ($totalRating == 5){
				$outhtml .= "<img src='img/5-star.jpg' alt='5 star'/>";
			}



		
		

	if(isset($_SESSION["currentuser"])){
		$outhtml .= "<div class='rating'>";
		$outhtml .= "<div class='form-container'>";
		$outhtml .= "<form role='form' action='products.php?id=".$id."&category=".$category."' method='POST'>";
		$outhtml .= "<div class='form-group'>";
		$outhtml .= "<label>Rating Title</label>";
		$outhtml .= "<input type='text' name='rating_title' class='form-control' id='rating_title' placeholder='Enter Rating Title'>";
		$outhtml .= "<label>Rating Description</label>";
		$outhtml .= "<textarea rows='6'  name='rating_description' class='form-control lrg-txt' id='rating_description' placeholder='Enter Rating Description'></textarea>";
		$outhtml .= "<label>Rating: </label>";
		$outhtml .= "<select name='product_rating' >";
		$outhtml .= "<option  value='1'> 1 </option>";
		$outhtml .= "<option  value='2'> 2 </option>";
		$outhtml .= "<option   value='3'> 3 </option>";
		$outhtml .= "<option  value='4'> 4 </option>";
		$outhtml .= "<option  value='5'> 5 </option>";
		$outhtml .= "</select>";
		$outhtml .= "<input type='submit' class='button'>";
		$outhtml .= "</div>";
		$outhtml .= "</div>";
	} else {
		$outhtml .= "<h3> <em>Please sign in to make a review</em> </h3>";
	}

	$sql2 = "SELECT * FROM product_rating WHERE product_id = '$id' ";
	$result2 = mysqli_query(get_dbconnection(),$sql2);


		while($row2 = mysqli_fetch_assoc($result2)) {
			$outhtml .= "<h2>".$row2['title']."</h2>";
			$outhtml .= "<p>".$row2['review']."</p>";

			$rating = round($row2['rating']);
			if($rating == 1){
				$outhtml .= "<img src='img/1-star-sm.jpg' alt='1 star'/>";
			}
			if($rating == 2){
				$outhtml .= "<img src='img/2-star-sm.jpg' alt='2 star'/>";
			}
			if($rating == 3){
				$outhtml .= "<img src='img/3-star-sm.jpg' alt='3 star'/>";
			}
			if($rating == 4){
				$outhtml .= "<img src='img/4-star-sm.jpg' alt='4 star'/>";
			}
			if($rating == 5){
				$outhtml .= "<img src='img/5-star-sm.jpg' alt='5 star'/>";
			}
			//$outhtml .= "<h4>".$row2['rating']."</h4>";
			
		}
	
	
				
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