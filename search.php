<?php include 'head.php'; ?>
		<div class="content">
	        <?php include 'subnav.php' ?>

			<?php 

				//Grab Forum Data
				$searchTerm=$_POST['searchTerm']; 

				// $searchTerm = preg_replace("#[^0-9a-z]#i", " " , $searchTerm);

				//Open database connection
				get_dbconnection();

				//Create and run SQL query
				$sql="SELECT * FROM products WHERE product_name LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%' OR category LIKE '%$searchTerm%' OR color LIKE '%$searchTerm%' OR price LIKE '%$searchTerm%'";
				$result = mysqli_query(get_dbconnection(),$sql);
				$count = mysqli_num_rows($result);
				
				if($count > 1){
					echo "<h1>$count results have been found for '$searchTerm'.</h1>";
				}else if($count == 1) {
					echo "<h1>$count result have been found for '$searchTerm'.</h1>";
				}else{
					echo "<h1>No results have been found for: '$searchTerm'.</h1>";
				}

				echo "<div class='home-catalog'>";
				while ($row = mysqli_fetch_assoc($result)) {

					$outhtml = "";

					$outhtml .= "<div class='home-item'>";
					$outhtml .= "<img src='". $row['product_image'] ."' alt='item'>";
					$outhtml .= "<div class='item-description'>";
					$outhtml .= "<h4><a href='products.php?id=".$row['id']."&category=".$category."'>". $row['product_name'] ."</a></h4>";
					$outhtml .= "<p>$". $row['price'] ."</p>";
					$outhtml .= "</div>";
					$outhtml .= "</div>";

					echo $outhtml;

				}
				echo "</div>";

				?>
	        <?php include 'footer.php'; ?>
	    </div>
	</body>
</html>