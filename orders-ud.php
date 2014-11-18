<?php include 'admin_head.php'; 
$orderid = $_GET['orderid'];

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
    	<h3> Edit Orders: </h3>
  	</div>

<?php 
print $orderid."<br />";


	$sql = "SELECT * FROM transaction WHERE transaction_id = '$orderid' ";
	$result = mysqli_query(get_dbconnection(),$sql);

?>

<div class="form-container">
	<div class="row">
		<h3> Order Information for transaction #: </h3>
		<h5><?php echo $orderid ?></h5>
		<?php 

			while($row = mysqli_fetch_assoc($result)) {
				//print $row['transaction_id'];
				$counter = 0;

				$outhtml = "<div class=\"order-card \">";
				$outhtml .=	"<div class=\"card\">";

				$lineitemid = $row['id'];
				echo $lineitemid;

				$outhtml .=	"<form role=\"form\" action=\"update.php?itemid=".$lineitemid."\" method=\"POST\">";
				$outhtml .=	"<label>Product ID</label><br />";
				$outhtml .=	"<input type=\"text\" name=\"product_id\" class=\"form-control form-update\" id=\"product_name\" value=". $row['product_id'] .">";
				$outhtml .=	"<input type=\"submit\" class=\"button-inline\" value=\"update\">";
				$outhtml .= "</form>";

				$outhtml .=	"<form role=\"form\" action=\"update.php?itemid=".$lineitemid."\" method=\"POST\">";
				$outhtml .=	"<label>Transaction total</label><br />";
				$outhtml .=	"<input type=\"text\" name=\"total\" class=\"form-control form-update\" id=\"total\" value=". $row['transaction_total'] .">";
				$outhtml .=	"<input type=\"submit\" class=\"button-inline\" value=\"update\">";
				$outhtml .= "</form>";

				$outhtml .=	"<form role=\"form\" action=\"update.php?itemid=".$lineitemid."\" method=\"POST\">";
				$outhtml .=	"<label>User Email</label><br />";
				$outhtml .=	"<input type=\"text\" name=\"user_email\" class=\"form-control form-update\" id=\"user_email\" value=". $row['user_email'] .">";
				$outhtml .=	"<input type=\"submit\" class=\"button-inline\" value=\"update\">";
				$outhtml .= "</form>";

				

				$outhtml .= "<a href=\"delete.php?itemid=". $lineitemid."\" class=\"button-delete\">Delete</a>";
				$outhtml .= "</div>";
				$outhtml .= "</div>";

				$counter = $counter +1;
				if ($counter % 2 == 0) {
                  $outhtml .= "</div>";
                  $outhtml = "<div class=\"row \">";
                }
				
				echo $outhtml;
			}
			


		?>
		

	</div>

</div>
	



 <?php include 'footer.php'; ?>

 </div>