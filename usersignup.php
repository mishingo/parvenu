 <?php include 'head.php'; ?>
		<div class="content">
	        <?php include 'subnav.php' ?>

			<?php 

				get_dbconnection();

				$useremail=$_POST['email']; 
				$userpassword=$_POST['password']; 
				$userfname=$_POST['firstname']; 
				$userlname=$_POST['lastname']; 

				$useremail = stripslashes($useremail);
				$userpassword = stripslashes($userpassword);
				$userfname = stripslashes($userfname);
				$userlname = stripslashes($userlname);

				$useremail = mysql_real_escape_string($useremail);
				$userpassword = mysql_real_escape_string($userpassword);
				$userfname = mysql_real_escape_string($userfname);
				$userlname = mysql_real_escape_string($userlname);

				require 'PasswordHash.php';
				$hash_cost_log2 = 8;
				$hash_portable = FALSE;

				$hasher = new PasswordHash($hash_cost_log2, $hash_portable);
				$hash = $hasher->HashPassword($userpassword);
				if (strlen($hash) < 20)
					echo 'Failed to hash new password.';
				unset($hasher);

				$sql="SELECT * FROM Users WHERE Email='$useremail'";
				$result = mysqli_query(get_dbconnection(),$sql);

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