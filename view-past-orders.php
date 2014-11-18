<?php include 'head.php'; ?>

<div class="content">
<?php include 'subnav.php' ?>
    <div class="page-title">
        <h5> past orders: </h5>
    </div>


<div class="table">
    <div class="table-header">
        <div class="item">
            <p> Transaction ID </p>
        </div>
        <div class="item">
            <p> Product Name </p>
        </div>
        <div class="item">
            <p>  Total </p>
        </div>
        <div class="item">
            <p> Date</p>
        </div>
        

    </div>
<?php
$email = $_SESSION['currentuser'];

    $sql = "SELECT * FROM transaction WHERE user_email='$email'";
    $result = mysqli_query(get_dbconnection(),$sql);

    


    while($row = mysqli_fetch_assoc($result)) {
        $outhtml  = "<div class='table-body'>";
        $outhtml .= "<div class='item'>";
        $outhtml .= "<p>".$row['transaction_id']."</p>";
        $outhtml .= "</div>";
        $outhtml .= "<div class='item'>";

       $product_id = $row['product_id'];
    $sql2 = "SELECT * FROM products WHERE id='$product_id'";
    $result2 = mysqli_query(get_dbconnection(),$sql2);

    $row2 = mysqli_fetch_assoc($result2);

        

        $outhtml .= "<p>".$row2['product_name']."</p>";
        $outhtml .= "</div>";
        $outhtml .= "<div class='item'>";
        $outhtml .= "<p>".$row['transaction_total']."</p>";
        $outhtml .= "</div>";
        $outhtml .= "<div class='item'>";
        $outhtml .= "<p>".$row['date']."</p>";
        $outhtml .= "</div>";
        
        $outhtml .= "</div>";

        echo $outhtml;
    }
?>
<?php include 'footer.php'; ?> 
</div>



 
</div>
