 <?php include 'head.php'; ?>
		<div class="content">
	        <?php include 'subnav.php' ?>

			<?php 

				//Grab Forum Data
				$useremail=$_POST['email']; 
				$userpassword=$_POST['password']; 
				$userfname=$_POST['firstname']; 
				$userlname=$_POST['lastname']; 

				// Open database connection
				get_dbconnection();

				//Strip Slashes
				$useremail = stripslashes($useremail);
				$userpassword = stripslashes($userpassword);
				$userfname = stripslashes($userfname);
				$userlname = stripslashes($userlname);

				//Real Escape String
				$useremail = mysql_real_escape_string($useremail);
				$userpassword = mysql_real_escape_string($userpassword);
				$userfname = mysql_real_escape_string($userfname);
				$userlname = mysql_real_escape_string($userlname);

				//Load Password hashing.
				require 'PasswordHash.php';

				//Assign hash guidelines
				$hash_cost_log2 = 8;
				$hash_portable = FALSE;

				//Create hash
				$hasher = new PasswordHash($hash_cost_log2, $hash_portable);
				$hash = $hasher->HashPassword($userpassword);
				if (strlen($hash) < 20)
					echo 'Failed to hash new password.';
				unset($hasher);

				//Create and run SQL query
				$sql="SELECT * FROM Users WHERE Email='$useremail'";
				$result = mysqli_query(get_dbconnection(),$sql);

				//Check if for results, if they exist (That account names is used already), if not (Insert information into table).
				if(mysqli_num_rows($result)){
					echo "You already have an account!";

				}else{
					$sql="INSERT INTO Users (fname, lname, email, password) VALUES ('$userfname', '$userlname', '$useremail','$hash')";
					$result=mysqli_query(get_dbconnection(),$sql);
					echo "Welcome, ".$userfname."!";
				}
				?>

	        <?php include 'footer.php'; ?>
	    </div>
	</body>
</html>