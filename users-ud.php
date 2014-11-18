<?php include 'admin_head.php'; 
$userid = $_GET['userid'];

session_start();

if(isset($_SESSION["currentuser"])){
	$currentuser = $_SESSION["currentuser"];
	$sql = "SELECT * FROM Users WHERE email = '$currentuser' ";
	$result = mysqli_query(get_dbconnection(),$sql);

	$row = mysqli_fetch_assoc($result);

	if($row['privilege'] ==2){
		print "your a customer";
		header('Location: account.php');
	} 

} else {
	header('Location: home.php');
}

?>


<div class="content">
	<?php include 'subnav.php' ?>
	<div class="page-title">
    	<h3> Edit User: <?php print $userid ?></h3>
  	</div>

<?php 



	$sql = "SELECT * FROM Users WHERE id = '$userid' ";
	$result = mysqli_query(get_dbconnection(),$sql);

	$row = mysqli_fetch_assoc($result);
?>
	<div class="form-container">
		
			

			<div class="form-group">
				<form role="form" action="update.php?userid=<?php echo $userid ?>" method="POST">
					<label>First Name</label><br />
					<input type="text" name="fname" class="form-control form-update" value="<?php echo $row['fname'] ?>">
					<input type="submit" class="button-inline" value="update">
				</form>
			</div>

			<div class="form-group">
				<form role="form" action="update.php?userid=<?php echo $userid ?>" method="POST">
					<label>Last Name</label><br />
					<input type="text" name="lname" class="form-control form-update" value="<?php echo $row['lname'] ?>">
					<input type="submit" class="button-inline" value="update">
				</form>
			</div>

			<div class="form-group">
				<form role="form" action="update.php?userid=<?php echo $userid ?>" method="POST">
					<label>email</label><br />
					<input type="text" name="email" class="form-control form-update" value="<?php echo $row['email'] ?>">
					<input type="submit" class="button-inline" value="update">
				</form>
			</div>

			
			
			

			<div class="form-group">
				<form role="form" action="update.php?userid=<?php echo $userid ?>" method="POST">
					<label>Privilege: </label>
			    		<select name="privilege" >
							<option  value="0">0</option>
							<option  value="1"> 1 </option>
							<option  value="2"> 2 </option>
						
			    		</select>
					<input type="submit" class="button-inline" value="update">
				</form>
			</div>
			

			

			<a href="delete.php?userid=<?php echo $userid ?>" class="button-delete">Delete</a>			


		
	</div>
	



 <?php include 'footer.php'; ?>

 </div>