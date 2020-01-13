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
$table = 'supplier_view';

// Table's primary key
$primaryKey = 'supplier_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database. 
// The `dt` parameter represents the DataTables column identifier.

$columns = array(
    array( 'db' => 'supplier_id',  'dt' => 1 ),
    array( 'db' => 'company', 'dt' => 2 ),
    array( 'db' => 'number', 'dt' => 3 ),
    array( 'db' => 'address', 'dt' => 4 ),
);


// Include SQL query processing class
require( 'ssp/ssp.class.php' );

// Output data as json format
echo json_encode(
      SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns )
);