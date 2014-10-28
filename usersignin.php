 <?php include 'head.php'; ?>
		<div class="content">
	        <?php include 'subnav.php' ?>

			<?php 

				get_dbconnection();

				$useremail=$_POST['siemail']; 
				$userpassword=$_POST['sipassword']; 

				$useremail = stripslashes($useremail);
				$userpassword = stripslashes($userpassword);

				$useremail = mysql_real_escape_string($useremail);
				$userpassword = mysql_real_escape_string($userpassword);

				$sql="SELECT password FROM Users WHERE email='$useremail'";
				$result = mysqli_query(get_dbconnection(),$sql);



				if(mysqli_num_rows($result)){

					$row = mysqli_fetch_array($result);
					$hash = $row[0];

					require 'PasswordHash.php';

					$hash_cost_log2 = 8;
					$hash_portable = FALSE;
					$hasher = new PasswordHash($hash_cost_log2, $hash_portable);
					$check = $hasher->CheckPassword($userpassword, $hash);
					if ($check) $ok++;

					if ($check == 1) {
						session_start();
						session_unset(); 
						$_SESSION["currentuser"] = $useremail;

						echo 'Hello, '.$useremail."!";

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