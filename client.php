<?php include 'head.php'; ?>

<div class="content">
<?php include 'subnav.php' ?>
<div class="page-title">
    <h2> Your Info: </h2>
  </div>

  	<div class="client-info">
		<div class="user-info">
			<div class="card">
				<?php 
				session_start();

				if(isset($_SESSION["currentuser"])){
					$currentuser = $_SESSION["currentuser"];
					$sql = "SELECT * FROM Users WHERE email = '$currentuser' ";
					$result = mysqli_query(get_dbconnection(),$sql);

					$row = mysqli_fetch_assoc($result);

					if($row['privilege'] ==1){
						print "your an admin :D";
					} 
				} else {
					echo 'boo';
				}
				
				?>
				<h4> Contact Info: </h4>
				<ul>
					<li>Name: Miguel Ramos</li>
					<li>Email: Mr@mishingo.com</li>
					<li>Phone: 305-777-7777</li>
					<li>Address: 4000 Central Florida Blvd. <br />
					Orlando, fl, 32816</li>
				</ul>
			</div>

		</div>
		<div class="user-info">
			<div class="card">
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