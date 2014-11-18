<?php include 'head.php'; ?>

		<div class="content">
	        <?php include 'subnav.php' ?>


	        <form action="usersignin.php" method="post">
				<h2>Sign In</h2>
				<?php 
					$loginMessage = $_SESSION['loginMessage'];
					if($loginMessage == 'Wrong password.'){
						?> <p class="warning"> Your username or password is incorrect.</p> <?php
					}else{
						if($loginMessage == "Username not found."){
						?> <p class="warning"> The username entered doesn't exist in our system.</p> <?php
						}
					}
					unset($_SESSION['loginMessage']);
				 ?>
				<label for="siemail">Email: </label>
				<input type="text" name="siemail"><br>
				<label for="sipassword">Password: </label> 
				<input type="password" name="sipassword"><br>
				<input type="submit" value="Sign In">
			</form>
			<p>Don't have an account yet? <a href="signup.php">Sign Up!</a></p>


	        <?php include 'footer.php'; ?>
	    </div>
	</body>
</html>