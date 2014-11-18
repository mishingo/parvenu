<div class="sub-nav">

    <p class="account-status"> 
        <?php 
            session_start();
            $_SESSION['cart_items'];
            if(isset($_SESSION['currentuser'])) {
                echo "<a href='account.php'>Account</a> |  <a href='usersignout.php'>Sign Out</a>";
            } else {
                echo "<a href='login.php'>Sign In</a> ";
            }
        ?>
                    
    </p>
        <ul class="list-inline">    
            <li>
                <span class="cart">
                    <img src="img/icn-basket.png" alt="cart">
                </span>
                <?php
                    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $check_link = "http://$_SERVER[HTTP_HOST]/parvenu/transaction.php";
                    if($actual_link == $check_link){
                        echo "<a href='cart.php?id=3'> cart (0) </a>";
                    }else{
                      $cart_quantity = count($_SESSION['cart_items']);
                      echo "<a href='cart.php?id=3'> cart (".$cart_quantity.") </a>";
                    }
                ?>
            </li>
            <li class="checkout"> 
                <a href='checkout.php?id=3'>checkout</a> 
            </li>
        </ul>

</div>