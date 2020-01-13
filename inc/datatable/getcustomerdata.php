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
$table = 'customer_view';

// Table's primary key
$primaryKey = 'cid';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database. 
// The `dt` parameter represents the DataTables column identifier.

$columns = array(
    array( 'db' => 'cid',  'dt' => 1 ),
    array( 'db' => 'fname', 'dt' => 2 ),
    array( 'db' => 'lname', 'dt' => 3 ),
    array( 'db' => 'email', 'dt' => 4 ),
    array( 'db' => 'number', 'dt' => 5 ),
);


// Include SQL query processing class
require( 'ssp/ssp.class.php' );

// Output data as json format
echo json_encode(
      SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns )
);