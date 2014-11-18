<?php 
$pageTitle = 'Parvenue - Fulfillment';
$pageDescription = 'Shopping Fulfillment';
include 'admin_head.php'; 
$category = "tops";
$id = intval($_GET['id']);
?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.3/css/jquery.dataTables.min.css">

<div class="content">
<?php include 'subnav.php' ?>
<div class="page-title">
    <h2> Inventory: </h2>
  </div>



<table id="products" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>product name</th>
                <th>description</th>
                <th>category</th>
                <th>sku</th>
                <th>cost</th>
                <th>price</th>
                <th>weight</th>
                <th>color</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>product name</th>
                <th>description</th>
                <th>category</th>
                <th>sku</th>
                <th>cost</th>
                <th>price</th>
                <th>weight</th>
                <th>color</th>
            </tr>
        </tfoot>
    </table>



<?php include 'footer.php'; ?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#products').dataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "includes/inventory_json.php"
    } );
} );
</script>
</div>

</div>