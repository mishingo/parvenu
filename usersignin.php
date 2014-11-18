 <?php include 'head.php'; ?>
		<div class="content">
	        <?php include 'subnav.php' ?>

			<?php 

				//Grab Forum Data
				$useremail=$_POST['siemail']; 
				$userpassword=$_POST['sipassword']; 

				//Open database connection
				get_dbconnection();

				//Create and run SQL query
				$sql="SELECT password FROM Users WHERE email='$useremail'";
				$result = mysqli_query(get_dbconnection(),$sql);

				//Check for results, if yes (test password), if no (the account doesn't exist).
				if(mysqli_num_rows($result)){
					//Get hash from database
					$row = mysqli_fetch_array($result);
					$hash = $row[0];

					//Load hashing library
					require 'PasswordHash.php';

					//Assign hash guidelines
					$hash_cost_log2 = 8;
					$hash_portable = FALSE;
					$hasher = new PasswordHash($hash_cost_log2, $hash_portable);

					//Check hashed password from database against user input
					$check = $hasher->CheckPassword($userpassword, $hash);

					// If they are correct.
					if ($check == 1) {
						session_start();
						//session_unset(); 
						$_SESSION["currentuser"] = $useremail;

						echo 'Hello, '.$useremail."!";
						header('Location: home.php');

					}else{
						echo 'Wrong password.';
					}
				}else{
					echo "This username doesn't exist!";
				}
				?>

	        <?php include 'footer.php'; ?>
	    </div>
	</body>
</html>