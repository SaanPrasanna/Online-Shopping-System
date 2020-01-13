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
$table = 'product_view';

// Table's primary key
$primaryKey = 'p_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database. 
// The `dt` parameter represents the DataTables column identifier.

$columns = array(
    array( 'db' => 'p_id',  'dt' => 1 ),
    array( 'db' => 'name', 'dt' => 2 ),
    array( 'db' => 'category', 'dt' => 3 ),
    array( 'db' => 'warranty', 'dt' => 4 ),
    array( 'db' => 's_price', 'dt' => 5 ),
    array( 'db' => 'u_price', 'dt' => 6 ),
    array( 'db' => 'qty', 'dt' => 7 ),
    array( 'db' => 're_order', 'dt' => 8 )
);


// Include SQL query processing class
require( 'ssp/ssp.class.php' );

// Output data as json format
echo json_encode(
      SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns )
);