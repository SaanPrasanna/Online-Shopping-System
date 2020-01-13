<?php
/*
    @ Getting all wifi details from wifi_users table and wifi_details table 
    @ Json Encoding the fetch data
*/

// Database connection info
$dbDetails = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db'   => 'oss'
);

// DB table to use
$table = 'order_view';

// Table's primary key
$primaryKey = 'order_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database. 
// The `dt` parameter represents the DataTables column identifier.

$columns = array(
    array( 'db' => 'order_id',  'dt' => 0 ),
    array( 'db' => 'cid', 'dt' => 1 ),
    array( 'db' => 'co_id', 'dt' => 2 ),
    array( 'db' => 'amount', 'dt' => 3 ),
    array( 'db' => 'date', 'dt' => 4 ),
    array( 'db' => 'time', 'dt' => 5 ),
    array( 'db' => 'finishing_date', 'dt' => 6 )
);


// Include SQL query processing class
require( 'ssp/ssp.class.php' );

// Output data as json format
echo json_encode(
      SSP::simple_custom( $_GET, $dbDetails, $table, $primaryKey, $columns )
);