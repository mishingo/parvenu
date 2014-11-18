<?php include "includes/functions.php"; ?>

<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
     
        <title><?php echo $pageTitle; ?></title>
        <meta name="description" content="<?php echo $pageDescription; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/style.css">
       
    </head>
    <body>
     
   
        <div class="navigation">
        	<div class="logo">
        		<a href="home.php"><img src="img/logo.png" alt="parvenu-logo"></a>
        	</div>
            <div class="search">
                <form>
                     <input class="search-input" type="text" placeholder="Search..." required>
                    <button class="search-submit" type="button" value="Search">
                        <img src="http://www.dreamtemplate.com/dreamcodes/web_icons/gray-classic-search-icon.png" alt='search'>
                    </button>
                </form>
            </div>
            <div class="nav-links">
                <ul>
                    <li> <a href="admin.php">Add Products</a> </li>
                    <li> <a href="admin_inventory.php">Inventory</a> </li>
                    <li> <a href="admin_orders.php">Orders</a> </li>
                    <?php 
                        session_start();

                        $email = $_SESSION['currentuser'];

                        $sql = "SELECT * FROM Users WHERE email = '$email' ";
                        $result = mysqli_query(get_dbconnection(),$sql);

                        $row = mysqli_fetch_assoc($result);


                        if($row['privilege'] == 0){
                            echo "<li> <a href=\"admin_users.php\">Users</a> </li>";
                        }
                    ?>
                    
                </ul>
            </div>
        </div>