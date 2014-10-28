<?php include 'head.php'; ?>

		<div class="content">
	        <?php include 'subnav.php' ?>


			<form action="usersignup.php" method="post">
				<h2>Sign Up</h2>
				<label for="email">Email: </label>
				<input type="email" name="email" id="email"><br>
				<label for="password">Password: </label>
				<input type="password" name="password" id="password"><br>
				<label for="firstname">First Name: </label>
				<input type="text" name="firstname" id="firstname"><br>
				<label for="lastname">Last Name: </label>
				<input type="text" name="lastname" id="lastname"><br>
				<input type="submit" value="Sign Up">
			</form>


	        <?php include 'footer.php'; ?>
	    </div>
	</body>
</html>