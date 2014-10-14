<?php include 'head.php'; 

$category = "tops";
$id = intval($_GET['id']);

?>

<div class="content">
<?php include 'subnav.php' ?>
<div class="page-title">
    <h1> Your Info: </h1>
  </div>

  <div class="client-info">
	<div class="user-info">
		<div class="card">
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