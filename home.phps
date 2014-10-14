<?php include 'head.php'; ?>

        <div class="content">
            <?php include 'subnav.php' ?>
            <div class="hero">
                
<?php


$sql = "SELECT * FROM products WHERE featured = 'yes'";
$result = mysqli_query(get_dbconnection(),$sql);

$row = mysqli_fetch_assoc($result);

?>

            </div>
            <div class="home-catalog">
                <div class="home-item">
                    <img src="img/main-bottoms.png" alt="bottoms">
                    <div class="take-me">
                        <p><a href="products.php?category=bottoms">Bottoms</a> </p>
                    </div>
                </div>
                <div class="home-item">
                    <img src="img/main_accessories.png" alt="accessories">
                    <div class="take-me">
                        <p><a href="products.php?category=accessories">Accessories</a> </p>
                    </div>
                </div>
                <div class="home-item">
                    <img src="img/main-tops.png" alt="tops">
                    <div class="take-me">
                        <p> <a href="products.php?category=tops">Tops</a> </p>
                    </div>
                </div>
            </div>
            <div class="featured-item">
                <div class="featured-image">
                    <img src="<?php  printf ($row["product_image"]); ?>" alt="featured">
                  
                </div>
                <div class="featured-info">
                    <div class="featured-title">
                        <h1> Featured Item: </h1>
                     </div>
                    <div class="featured-bar">
                        <h2><?php  printf ($row["product_name"]); ?></h2>
                    </div>
                    <div class="featured-description">
                        <p><?php  printf ($row["description"]); ?> </p>
                        
                        <a   class='button-a'>Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="social-testimonial">
                <div class="testimonial-card">
                   <div class="card">
                        <img src="img/review-1.png" alt="testimonial" />
                        <p>"Lorem fistrum condemor velit nisi me cago en tus muelas ut aliquip. Eiusmod qui qué dise usteer ut al ataquerl dolore ese pedazo de no te digo trigo por no." <br />
                        <p>~ Katrina Movich </p>
                   </div>
                </div>
                <div class="testimonial-card">
                    <div class="card">
                        <img src="img/review-2.png" alt="testimonial" />
                         <p>"Lorem fistrum condemor velit nisi me cago en tus muelas ut aliquip. Eiusmod qui qué dise usteer ut al ataquerl dolore ese pedazo de no te digo trigo por no." <br />
                        <p>~ Katrina Movich </p>
                   </div>
                </div>
                <div class="testimonial-card">
                    <div class="card">
                        <img src="img/review-3.png" alt="testimonial" />
                         <p>"Lorem fistrum condemor velit nisi me cago en tus muelas ut aliquip. Eiusmod qui qué dise usteer ut al ataquerl dolore ese pedazo de no te digo trigo por no." <br />
                        <p>~ Katrina Movich </p>
                   </div>
                </div>
                <div class="testimonial-card">
                    <div class="card">
                        <img src="img/review-4.png" alt="testimonial" />
                         <p>"Lorem fistrum condemor velit nisi me cago en tus muelas ut aliquip. Eiusmod qui qué dise usteer ut al ataquerl dolore ese pedazo de no te digo trigo por no." <br />
                        <p>~ Katrina Movich </p>
                   </div>
                </div>
            </div>
            <?php include 'footer.php'; ?>
        </div> <!-- content end -->
   

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </body>
</html>