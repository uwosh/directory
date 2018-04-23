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
$table = 'directory_public';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'hash', 'dt' => 0 ),
    array( 'db' => 'username', 'dt' => 1 ),
    array( 'db' => 'lastname', 'dt' => 2 ),
    array( 'db' => 'firstname', 'dt' => 3 ),
    array( 'db' => 'mi', 'dt' => 4 ),
    array( 'db' => 'is_fac', 'dt' => 5 ),
    array( 'db' => 'is_stf', 'dt' => 6 ),
    array( 'db' => 'is_stu', 'dt' => 7 ),
    array( 'db' => 'is_oth', 'dt' => 8 ),
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => 'root',
    'db'   => 'directory',
    'host' => 'localhost',
    'port' => '8889'
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( '../lib/datatables/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);