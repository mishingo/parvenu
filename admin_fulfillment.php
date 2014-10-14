<?php include 'admin_head.php'; 

$category = "tops";
$id = intval($_GET['id']);

?>

<div class="content">
<?php include 'subnav.php' ?>
<div class="page-title">
    <h2> Fulfillment: </h2>
  </div>

<div class="table">
	<div class="table-header">
		<div class="item">
			<p> Item </p>
		</div>
		<div class="item">
			<p> SKU </p>
		</div>
		<div class="item">
			<p> Weight </p>
		</div>
		<div class="item">
			<p> Rec. Name </p>
		</div>
		<div class="item">
			<p> Rec. Address </p>
		</div>
		<div class="item">
			<p> Status </p>
		</div>

	</div>
<?php
	$sql = "SELECT * FROM products";
	$result = mysqli_query(get_dbconnection(),$sql);

	while($row = mysqli_fetch_assoc($result)) {
		$outhtml  = "<div class='table-body'>";
		$outhtml .=	"<div class='item'>";
		$outhtml .= "<p>".$row['product_name']."</p>";
		$outhtml .= "</div>";
		$outhtml .= "<div class='item'>";
		$outhtml .=	"<p>028323".$row['sku']."</p>";
		$outhtml .= "</div>";
		$outhtml .= "<div class='item'>";
		$outhtml .= "<p>".$row['weight']." lbs.</p>";
		$outhtml .= "</div>";
		$outhtml .= "<div class='item'>";
		$outhtml .= "<p> Roger Rabbit </p>";
		$outhtml .= "</div>";
		$outhtml .= "<div class='item'>";
		$outhtml .= "<p> 4000 Central Fl. Blvd </p>";
		$outhtml .= "</div>";
		$outhtml .= "<div class='item'>";
		$outhtml .= "<p> Received</p>";
		$outhtml .= "</div>";
		$outhtml .= "</div>";

		echo $outhtml;
	}
?>
<?php include 'footer.php'; ?> 
</div>



 
</div>
