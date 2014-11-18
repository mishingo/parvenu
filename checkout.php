<?php include 'head.php'; 

$category = "tops";
$id = intval($_GET['id']);
?>

<div class="content">
<?php include 'subnav.php' ?>
	<div class="page-title">
    	<h1> Checkout: </h1>
  	</div>

  	<div class="check-out">


  		<?php
  		if(isset($_SESSION["currentuser"])){

  			// user check out
  			$currentuser = $_SESSION["currentuser"];
  			$sql = "SELECT * FROM Users WHERE email = '$currentuser' ";
  			$result = mysqli_query(get_dbconnection(),$sql);
  			$row = mysqli_fetch_assoc($result);
  			$user_id = $row['id'];

  			echo $user_id;
  			$sql2 = "SELECT * FROM users_payment WHERE user_id = '$user_id' ";
  			$result2 = mysqli_query(get_dbconnection(),$sql2);

  			if (mysqli_num_rows($result2) >= 1 ){
  				$has_payment = true;

  			} else {
  				$outhtml = "<p> Add a Form of Payment </p>";
  				$outhtml .= "<a href='add-payment.php' class='button-small'>Add</a>";

  				echo $outhtml;
  			}

  			$sql3 = "SELECT * FROM users_shipping WHERE user_id = '$user_id' ";
  			$result3 = mysqli_query(get_dbconnection(),$sql3);
  		
  			if (mysqli_num_rows($result3) >= 1 ){
  				//do shit
  				$has_shipping = true;
  			} else {
  				$outhtml = "<p> Add Shipping Information: </p>";
  				$outhtml .= "<a href='add-shipping.php' class='button-small'>Add</a>";

  				echo $outhtml;
  			}


  		if ($has_payment == true && $has_shipping == true){
  			echo "word up";
  			$row_payment = mysqli_fetch_assoc($result2);

  			$card_number = $row_payment['card_number'];
          $_SESSION['cardNumber'] = $card_number;

  			$first_name = $row_payment['first_name'];
          $_SESSION['FName'] = $first_name; 

  			$last_name = $row_payment['last_name'];
          $_SESSION['LName'] = $last_name;

  			$card_type = $row_payment['card_type'];
  			
        $expire_month = $row_payment['expire_month'];
          $_SESSION['expire_month'] = $expire_month;

  			$expire_year = $row_payment['expire_year'];
          $_SESSION['expire_year'] = $expire_year;

  			$cardCode = $row_payment['cvv2'];
          $_SESSION['cardCode'] = $cardCode;

  			$address_1 = $row_payment['address_1'];
          $_SESSION['addressOne'] = $address_1;

  			$address_2 = $row_payment['address_2'];
          $_SESSION['addressTwo'] = $address_2;

        $city = $row_payment['city'];
          $_SESSION['city'] = $city;

        $postal_code = $row_payment['postal_code'];
          $_SESSION['zip'] = $postal_code;

        $phone = $row_payment['phone'];
          $_SESSION['phone'] = $phone;

        $email = $row_payment['email'];
          $_SESSION['email'] = $currentuser;

  			$outhtml = "<div class=\"user-info\">";

  			$outhtml .= "<p>".$card_number."</p>";
  			$outhtml .= "<p>".$first_name."</p>";
  			$outhtml .= "<p>".$last_name."</p>";
  			$outhtml .= "<p>".$card_type."</p>";
  			
  			$outhtml .= "<p>".$expire_month."</p>";
  			$outhtml .= "<p>".$expire_year."</p>";
  			$outhtml .= "<p>".$cardCode."</p>";

  			$outhtml .= "<p>".$address_1."</p>";
  			$outhtml .= "<p>".$address_2."</p>";
  			$outhtml .= "<a href=\"payment.php\" class=\"button-a\">submit</a>";
  			$outhtml .= "</div>";
  			
  			echo $outhtml;

  		}

  	} else {
  		// guest check out
  		$outhtml .= "<div class=\"user-info\">";
  		$outhtml .=	"<h3> Enter Shipping Info: </h3>";
  		$outhtml .=	"<form action=\"payment.php\">";
  			
  				if($_SESSION["paymentMessage"]){
  					$outhtml .=	"<p>". $_SESSION["paymentMessage"] ."</p>";
  					unset($_SESSION["paymentMessage"]);
  				}
  			
  		$outhtml .=	"<div class=\"form-row\">";
  		$outhtml .=	"<div class=\"form-group c-5\">";
  		$outhtml .= "<label for=\"firstname_input\">First Name</label>";
  		$outhtml .= "<input name=\"FName\" type=\"text\" class=\"form-control md\" placeholder=\"Enter First Name\">";
  		$outhtml .=	"</div>";
  			  	
  			  	
  		$outhtml .= "<div class=\"form-group c-5\">";
  		$outhtml .= "<label for=\"lastname_input\">Last Name</label>";
  		$outhtml .= "<input name=\"LName\" type=\"text\" class=\"form-control md\"  placeholder=\"Enter Last Name\">";
  		$outhtml .= "</div>";
  		$outhtml .= "</div>";

  		$outhtml .= "<div class=\"form-row\">";
  		$outhtml .= "<div class=\"form-group\">";
  		$outhtml .= "<label for=\"address_input\">Address</label>";
  		$outhtml .= "<input type=\"text\" name=\"addressOne\" class=\"form-control md\"  placeholder=\"Enter Address \">";
  		$outhtml .= "</div>";
  		$outhtml .= "</div>";
  		$outhtml .= "<div class=\"form-row\">";

  		$outhtml .= "<div class=\"form-group\">";
  			    		
  		$outhtml .= "<input type=\"text\" name=\"addressTwo\" class=\"form-control \" placeholder=\"Enter Address \">";
  		$outhtml .= "</div>";
  		$outhtml .= "</div>";

  		$outhtml .= "<div class=\"form-row\">";
  		$outhtml .= "<div class=\"form-group c-5\">";
  		$outhtml .= "<label for=\"city_input\">City</label>";
  		$outhtml .= "<input type=\"text\" name=\"city\" class=\"form-control md\"  placeholder=\"Enter City\">";
  		$outhtml .= "</div>";
  			  	
  			  	
  		$outhtml .= "<div class=\"form-group c-5\">";
  		$outhtml .= "<label for=\"zipcode_input\">Zip Code</label>";
  		$outhtml .= "<input type=\"text\" name=\"zip\" class=\"form-control md\" placeholder=\"Enter Zip Code\">";
  		$outhtml .= "</div>";
  		$outhtml .= "</div>";

  		$outhtml .= "<div class=\"form-row\">";
  		$outhtml .= "<div class=\"form-group c-5\">";
  		$outhtml .= "<label for=\"email_input\">E-mail</label>";
  		$outhtml .= "<input name=\"email\" type=\"text\" class=\"form-control md\"  placeholder=\"Enter email\">";
  		$outhtml .= "</div>";
  			  	
  			  	
  		$outhtml .= "<div class=\"form-group c-5\">";
  		$outhtml .= "<label for=\"phone_input\">Phone Number</label>";
  		$outhtml .= "<input type=\"text\" name=\"phone\" class=\"form-control md\" placeholder=\"Enter Phone Number\">";
  		$outhtml .= "</div>";
  		$outhtml .= "</div>";

  		$outhtml .= "<h3> Enter Billing Info: </h3>";
  		$outhtml .= "<div class=\"form-row\">";
  		$outhtml .= "<div class=\"form-group\">";
  		$outhtml .= "<label for=\"firstname_input\">Credit Card Number</label>";
  		$outhtml .= "<input name=\"cardNumber\" type=\"text\" class=\"form-control\"  placeholder=\"Enter CC Number \">";
  		$outhtml .= "</div>";
  		$outhtml .= "</div>";
  		$outhtml .= "<div class=\"form-row\">";
  		$outhtml .= "<div class=\"form-group c-5\">";
  		//$outhtml .= "<label for=\"expiration_input\">Expiration Date</label>";
      $outhtml .= "<label>Expire Month </label>";
      $outhtml .= "<select name=\"expire_month\" >";
        $outhtml .= " <option value=\"01\">01</option>";
        $outhtml .= " <option value=\"02\">02</option>";
        $outhtml .= " <option value=\"03\">03</option>";
        $outhtml .= " <option value=\"04\">04</option>";
        $outhtml .= " <option value=\"05\">05</option>";
        $outhtml .= " <option value=\"06\">06</option>";
        $outhtml .= " <option value=\"07\">07</option>";
        $outhtml .= " <option value=\"08\">08</option>";
        $outhtml .= " <option value=\"09\">09</option>";
        $outhtml .= " <option value=\"10\">10</option>";
        $outhtml .= " <option value=\"11\">11</option>";
        $outhtml .= " <option value=\"12\">12</option>";
      $outhtml .= "</select>";

  		//$outhtml .= "<input name=\"expDate\" type=\"text\" class=\"form-control md\"  placeholder=\"Enter Expiration Date: (MM/YY)\">";
  		$outhtml .= "</div>";

          $outhtml .= "<div class=\"form-group c-5\">";
            $outhtml .= "<label>Expire Year </label>";
            $outhtml .= "<select name=\"expire_year\" >";
              $outhtml .= " <option value=\"2014\">2014</option>";
              $outhtml .= " <option value=\"2015\">2015</option>";
              $outhtml .= " <option value=\"2016\">2016</option>";
              $outhtml .= " <option value=\"2017\">2017</option>";
              $outhtml .= " <option value=\"2018\">2018</option>";
              $outhtml .= " <option value=\"2019\">2019</option>";
              $outhtml .= " <option value=\"2020\">2020</option>";
            $outhtml .= "</select>";
          $outhtml .= "</div>";
  			  	
  			  	
  		$outhtml .= "<div class=\"form-group c-5\">";
  		$outhtml .= "<label for=\"cv_input\">CV</label>";
  		$outhtml .= "<input name=\"cardCode\" type=\"text\" class=\"form-control md\"  placeholder=\"Enter CV\">";
  		$outhtml .= "</div>";
  		$outhtml .= "</div>";

  		$outhtml .= "<button type=\"submit\" class=\"button\" value=\"submit\">Complete Checkout</button>";
  		$outhtml .= "</form>";
  		$outhtml .= "</div>";


  		echo $outhtml;



  	}
?>
	
		
	
		<div class="product-review">
			<div class="card">
			<h3> Product Review:</h3>
				<div class='review-row border-bottom'>
				<div class='review-item'>
				<p> Item:</p>
				</div>
				<div class='review-quantity'>
				<p> Quantity:</p>
				</div>
				<div class='review-price'>
				<p> Price:</p>
				</div>
				</div>
			<?php
				if(isset( $_SESSION['cart_items'] )){
				

					//$sql = "SELECT * FROM products WHERE id = '$id' ";
					//$result = mysqli_query(get_dbconnection(),$sql);

					//$row = mysqli_fetch_assoc($result);

					$cart_items = $_SESSION['cart_items'];
					
					$cart_array = "'" . implode("','", $cart_items) . "'";

					$sql = "SELECT * FROM products where id in ({$cart_array})";
					//$sql = "SELECT * FROM products WHERE id = '$id' ";
					$result = mysqli_query(get_dbconnection(),$sql);

					while($row = mysqli_fetch_assoc($result)) {

					$outhtml2 = "<div class='review-row'>";
					$outhtml2 .= "<div class='review-item'>";
					$outhtml2 .= "<p>".$row['product_name']."</p>";
					$outhtml2 .= "</div>";
					$outhtml2 .= "<div class='review-quantity'>";
					$outhtml2 .= "<p>1</p>";
					$outhtml2 .= "</div>";
					$outhtml2 .= "<div class='review-price'>";
					$outhtml2 .= "<p>".$row['price']."</p>";
					$outhtml2 .= "</div>";
					$outhtml2 .= "</div>";

					$subtotal +=  $row['price'];

					echo $outhtml2;
				}

				$outhtml3 = "<div class='review-row'>";
				$outhtml3 .= "<div class='review-item'>";
				$outhtml3 .= "<p>Standard Shipping</p>";
				$outhtml3 .= "</div>";
				$outhtml3 .= "<div class='review-quantity'>";
				$outhtml3 .= "<p>1</p>";
				$outhtml3 .= "</div>";
				$outhtml3 .= "<div class='review-price'>";
				$outhtml3 .= "<p>$5.00</p>";
				$outhtml3 .= "</div>";
				$outhtml3 .= "</div>";
				
				$outhtml3 .= "<div class='review-row'>";
				$total = $subtotal + 5;
				$_SESSION['cartTotal'] = $total;
				$outhtml3 .= "<h3>Total Price: $".$total."</h3>";
				$outhtml3 .= "</div>";

				echo $outhtml3;
				
				} else {
					echo "<h3> Your cart is empty! </h3>";
				}
			?>
			</div>
	</div>
		</div>
<?php include 'footer.php'; ?>
	</div>
