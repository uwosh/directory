<?php

require_once("config.php");

// Create connection
try {
    $conn = new PDO( "mysql:host=$hostname;port=$port;dbname=$database", $user, $password );
} catch( PDOException $e ) {
    echo "Connection failed: " + $e->getMessage();
}

// Get the data from the DB
$stmt = $conn->prepare(
    "SELECT DISTINCT dept FROM directory_geninfo ORDER BY dept"
);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Parse the data
$departments = array();
foreach($results as $item){
    array_push($departments, $item["dept"]);
}

// Return the data to AJAX
echo json_encode($departments);
?>