<?php 
require "config.php";

function get_dbconnection() {
	global $db_user, $db_pass, $db, $db_server, $db_connection;

    $db_connection = mysqli_connect( $db_server, $db_user, $db_pass, $db);
	mysqli_set_charset($db_connection,'utf8');
    mysqli_select_db($db_connection,$db) or exit('Could not select database.');
    return $db_connection;
}

error_reporting(E_ALL ^ E_NOTICE);
?>