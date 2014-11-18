<?php include "includes/functions.php"; 

session_start();

$actual_link = "http://$_SERVER[HTTP_HOST]";

?>

<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        
        <title><?php echo $pageTitle; ?></title>
        <meta name="description" content="<?php echo $pageDescription; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            @import url('css/style.css');
        </style>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
          ga('create', 'UA-55951107-1', 'auto');
          ga('send', 'pageview');
        
        </script>
       
    </head>
    <body>
     
   
        <div class="navigation">
            <div class="logo">
                <a href="home.php"><img src="img/logo.png" alt="parvenu-logo"></a>
            </div>
            <div class="search">
                <form action="search.php" method="post">
                     <input class="search-input" type="text" name="searchTerm" placeholder="Search..." required>
                    <button class="search-submit" type="submit" value="Search">
                        <img src="http://www.dreamtemplate.com/dreamcodes/web_icons/gray-classic-search-icon.png" alt="search">
                    </button>
                </form>
            </div>
            <div class="nav-links">
                <ul>
                    <li> <a href="products.php?category=tops">Tops</a> </li>
                    <li> <a href="products.php?category=bottoms">Bottoms</a> </li>
                    <li> <a href="products.php?category=shoes">Shoes</a> </li>
                    <li> <a href="products.php?category=accessories">Accessories</a> </li>
                    
                </ul>
            </div>
            
                <div class="bottom-nav">
                    <ul>
                          <li> <a href="about.php">About</a> </li>
                          <li> <a href="shipping.php">Shipping</a> </li>
                          <li> <a href="returns.php">Returns</a> </li>
                          <li> <a href="contact.php">Contact Us</a> </li>
                          <li> <a href="terms.php">Terms of Use</a> </li>
                          <li> <a href="privacy.php">Privacy Policy</a> </li>
                    </ul>
                </div>
            

        </div>