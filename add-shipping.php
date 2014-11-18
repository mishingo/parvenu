<?php include 'head.php'; ?>

<div class="content">
<?php include 'subnav.php' ?>
	<div class="page-title">
    	<h5> Update Payment: </h5>
  	</div>

  	
				<?php 
				session_start();
				echo '<pre>';
				var_dump($_SESSION);
				echo '</pre>';

				if(isset($_SESSION["currentuser"])){
					$currentuser = $_SESSION["currentuser"];
					$sql = "SELECT * FROM Users WHERE email = '$currentuser' ";
					$result = mysqli_query(get_dbconnection(),$sql);

					$row = mysqli_fetch_assoc($result);

					$user_id = $row['id'];
					echo $user_id;
					if($row['privilege'] ==1){
						print "your an admin :D";
						//header('Location: admin.php');
					} 

					if($row['privilege'] ==2){
						print "your a customer";
					} 

					
				} else {
					echo 'boo';
					//header('Location: usersignin.php');
				}
				
				?>

				<?php 

				if (isset($_POST["address_1"]) && !empty($_POST["address_1"])) {

				
				

				$first_name = $_POST["first_name"];
				$last_name = $_POST["last_name"];
				$address_1 = $_POST["address_1"];
				$address_2 = $_POST["address_2"];
				$city = $_POST["city"];
				$postal_code = $_POST["postal_code"];
				$state = $_POST["state"];
				$phone = $_POST["phone"];

				
				$sql = "INSERT INTO `users_shipping`(`user_id`,`first_name`,`last_name`, `address_1`, `address_2`, `city`, `postal_code`, `state`, `phone`) VALUES ('$user_id','$first_name','$last_name','$address_1','$address_2','$city','$postal_code','$state','$phone')";
					mysqli_query(get_dbconnection(),$sql);
					echo "Your shipping has been saved!";

				    	
				}else{  

				    echo "N0, homie";
				}
				?>
					
	<div class="form-container">
		<form  role="form" action="add-shipping.php" method="POST">
			<div class="form-group">
				<label>First Name</label>
				<input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name">
							
				<label>Last Name</label>
				<input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name">
							
				<label>Address 1</label>
				<input type="text" name="address_1" class="form-control md" id="address_1" placeholder="Enter Address 1">

				<label>Address 2</label>
				<input type="text" name="address_2" class="form-control md" id="address_2" placeholder="Enter Address 2">

				<label>City</label>
				<input type="text" name="city" class="form-control md" id="city" placeholder="Enter City">

				<label>Postal Code</label>
				<input type="text" name="postal_code" class="form-control md" id="postal_code" placeholder="Enter Postal Code">

				
				<label>State </label>
				<select name="state" >
					<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">District Of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
				</select>

				<label>Phone</label>
				<input type="text" name="phone" class="form-control md" id="phone" placeholder="Enter Phone Number">
					
				<input type="submit" class="button">
			</div>

		</form>
	</div>
					




  <?php include 'footer.php'; ?>
</div>