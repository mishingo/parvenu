<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'products';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(

    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'product_name', 'dt' => 1 ),
    array( 'db' => 'category',   'dt' => 2 ),
    array( 'db' => 'sku',     'dt' => 3 ),
    array( 'db' => 'cost',     'dt' => 4 ),
    array( 'db' => 'price',     'dt' => 5 ),
    array( 'db' => 'weight',     'dt' => 6 ),
    array( 'db' => 'color',     'dt' => 7 ),
   
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'mi249120',
    'pass' => 'parvenu123',
    'db'   => 'mi249120',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);