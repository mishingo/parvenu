<?php include "includes/functions.php"; 

session_start();

?>

<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        
        <title>parvenu nouveau fashion - Miguel Ramos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            @import url('css/style.css');
        </style>
       
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
            <div class=" credits">
                <p> Photography on the home page is owned and created by <a href="https://www.flickr.com/photos/owlgardens/">Diana Santisteban</a>. </p>
            </div>

        </div>