<?php include 'admin_head.php'; 
$category = "tops";
$id = intval($_GET['id']);
?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.3/css/jquery.dataTables.min.css">

<div class="content">
<?php include 'subnav.php' ?>
<div class="page-title">
    <h2> Orders: </h2>
  </div>

<?php 


if(isset($_SESSION['delete_msg']) && !empty($_SESSION['delete_msg'])) {
	$outhtml = "<div class=\"delete-msg\">";
	$outhtml .= "<h3>".$_SESSION['delete_msg']." </h3>";  
	$outhtml .= "</div>";

	echo $outhtml;

	unset($_SESSION['delete_msg']);
}

if(isset($_SESSION['update_msg']) && !empty($_SESSION['update_msg'])) {
	$outhtml = "<div class=\"update-msg\">";
	$outhtml .= "<h3>".$_SESSION['update_msg']." </h3>";  
	$outhtml .= "</div>";

	echo $outhtml;

	unset($_SESSION['update_msg']);
}

?>

<table id="orders" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>id</th>
                <th>user email</th>
                <th>transaction id</th>
                <th>product id</th>
                <th>transaction total</th>
                <th>date</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
            	<th>id</th>
                <th>user email</th>
                <th>transaction id</th>
                <th>product id</th>
                <th>transaction total</th>
                <th>date</th>
            </tr>
        </tfoot>
    </table>



<?php include 'footer.php'; ?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#orders').dataTable( {
    	"columnDefs": [ {
    	    "targets": 2,
    	    "data": null,
    	    "render": function ( data, type, full, meta ) {
    	      return '<a href="orders-ud.php?orderid='+data[2]+'">Edit: '+ data[2]+'</a>';
    	    }
    	  } ],
        "processing": true,
        "serverSide": true,
        "ajax": "includes/orders_json.php"
        
    } );

   
} );
</script>
</div>

</div>