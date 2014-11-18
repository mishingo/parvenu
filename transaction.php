 <?php include 'head.php'; ?>
		<div class="content">
	        <?php include 'subnav.php' ?>
	        <h3><?php echo $_SESSION['paymentMessage']; ?></h3>
	        <?php unset($_SESSION["paymentMessage"]); ?>

		<?php
	        $fname = $_SESSION['FName']; 
	        $lname = $_SESSION['LName']; 
	        $address_1 = $_SESSION['addressOne']; 
	        $address_2 = $_SESSION['addressTwo']; 
	        $city = $_SESSION['city']; 
	       	$zip = $_SESSION['zip']; 
	        $phone = $_SESSION['phone']; 
	        $email = $_SESSION['email']; 
	        $transaction_total = $_SESSION['cartTotal'];
			$cart_items = $_SESSION['cart_items'];

				$cart_length = count($cart_items);
				for ($i=0; $i < $cart_length; $i++) { 
					echo $cart_items[$i];
					$cart_array += $cart_items[$i];
				}

				if(!$_SESSION["currentuser"]){
					$useremail = 'Guest';
				}else{
					$useremail = $_SESSION["currentuser"];
				}

				  		function getGUID(){
								    if (function_exists('com_create_guid')){
								        return com_create_guid();
								    }else{
								        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
								        $charid = strtoupper(md5(uniqid(rand(), true)));
								        $hyphen = chr(45);// "-"
								        $uuid = substr($charid, 0, 8).$hyphen// "{"
								            .substr($charid, 8, 4).$hyphen
								            .substr($charid,12, 4).$hyphen
								            .substr($charid,16, 4).$hyphen
								            .substr($charid,20,12);
								        
								        return $uuid;
								    }
								}

								$GUID = getGUID();
								
				

				$transaction_id = $GUID;
				
				$outhtml = "<p>".$fname."</p>";
				$outhtml .= "<p>".$lname."</p>";
				$outhtml .= "<p>".$address_1."</p>";
				$outhtml .= "<p>".$address_2."</p>";
				$outhtml .= "<p>".$city."</p>";
				$outhtml .= "<p>".$zip."</p>";
				$outhtml .= "<p>".$phone."</p>";
				$outhtml .= "<p>".$email."</p>";
				$outhtml .= "<p>".$transaction_total."</p>";
				$outhtml .= "<p>".$transaction_id."</p>";

				echo $outhtml;

				if($useremail == 'Guest'){
					$sql="INSERT INTO guest_user (transaction_id, f_name, l_name, address_1, address_2, city, zip, phone, email) VALUES ('$transaction_id','$fname','$lname', '$address_1', '$address_2', '$city', '$zip', '$phone','$email')";
					$result=mysqli_query(get_dbconnection(),$sql);
				} 

				$cart_length = count($cart_items);
				for ($i=0; $i < $cart_length; $i++) { 
					$product_id = $cart_items[$i];
					//$cart_array += $cart_items[$i];
					$sql="INSERT INTO transaction (user_email, transaction_id, product_id, transaction_total) VALUES ('$useremail', '$transaction_id', '$product_id', '$transaction_total')";
				$result=mysqli_query(get_dbconnection(),$sql);
				}


				
			?>
			
	        <?php 
	        session_unset();

	        //unset($_SESSION['cart_items']); ?>
	        <?php //unset($_SESSION['cartTotal']); ?>
	        <?php include 'footer.php'; ?>
	    </div>
	</body>