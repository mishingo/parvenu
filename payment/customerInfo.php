<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Payment Form</title>
</head>
<body>
	<form action="payment.php">
		<select name="cardType" id="cardType">
			<option value="mastercard">MasterCard</option>
			<option value="amex">American Express</option>
			<option value="visa">VISA</option>
			<option value="discover">Discover</option>
		</select>

		<input type="text" name="cardNumber" placeholder="Card Number">
		<input type="text" name="cardName" placeholder="Name On Card">

		<select name="expMonth" id="month">
			<option value="1"  <?PHP if($month==1) echo "selected";?>>January</option>
			<option value="2"  <?PHP if($month==2) echo "selected";?>>February</option>
			<option value="3"  <?PHP if($month==3) echo "selected";?>>March</option>
			<option value="4"  <?PHP if($month==4) echo "selected";?>>April</option>
			<option value="5"  <?PHP if($month==5) echo "selected";?>>May</option>
			<option value="6"  <?PHP if($month==6) echo "selected";?>>June</option>
			<option value="7"  <?PHP if($month==7) echo "selected";?>>July</option>
			<option value="8"  <?PHP if($month==8) echo "selected";?>>August</option>
			<option value="9"  <?PHP if($month==9) echo "selected";?>>September</option>
			<option value="10" <?PHP if($month==10) echo "selected";?>>October</option>
			<option value="11" <?PHP if($month==11) echo "selected";?>>November</option>
			<option value="12" <?PHP if($month==12) echo "selected";?>>December</option>
		</select>

		<select name="expYear" id="year">
		<?PHP for($i=date("Y"); $i<=date("Y")+20; $i++)
			  	if($year == $i)
					echo "<option value='$i' selected>$i</option>";
				else
					echo "<option value='$i'>$i</option>";
		?>
		</select>
		<input type="text" name="cardCode" placeholder="Security Code">
		<input type="text" name="cartTotal" placeholder="Enter Cart Total">
		<input type="submit" value="Checkout">
	</form>
	
</body>
</html>