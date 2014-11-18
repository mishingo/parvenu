<?php include 'head.php'; ?>

<div class="content">
<?php include 'subnav.php' ?>
<div class="page-title">
    <h2> Your Info: </h2>
  </div>

  	
				<?php 
				session_start();

				if(isset($_SESSION["currentuser"])){
					$currentuser = $_SESSION["currentuser"];
					$sql = "SELECT * FROM Users WHERE email = '$currentuser' ";
					$result = mysqli_query(get_dbconnection(),$sql);

					$row = mysqli_fetch_assoc($result);

					if($row['privilege'] ==1 || $row['privilege'] == 0  ){
						print "your an admin :D";
						header('Location: admin.php');
					} 

					if($row['privilege'] ==2){
						print "your a customer";
					} 

					
				} else {
					echo 'boo';
					//header('Location: usersignin.php');
				}
				
				?>
	<div class="client-info">
		<div class="user-info">
			<div class="card card-min">
				<p> Add a Form of Payment </p>
				<a href='add-payment.php' class='button-small'>Add</a>
			</div>
			<div class="card card-min">
				<p> Add Shipping </p>
				<a href='add-shipping.php' class='button-small'>Add</a>
			</div>
			<div class="card card-min">
				<p> View Past Orders </p>
				<a href='view-past-orders.php' class='button-small'>View</a>
			</div>

		</div>
		<div class="user-info">
			<div class="card card-max">
				<h4> Billing Info: </h4>
				<ul>
					<li>Name: Miguel Ramos</li>
					<li>Visa: ***-***-1054</li>
					<li>Address: 4000 Central Florida Blvd. <br />
					Orlando, fl, 32816</li>
				</ul>
			</div>
		</div>
    </div>
  <?php include 'footer.php'; ?>
</div>