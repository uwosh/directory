<?php

require_once("config.php");

// Create connection
try {
    $conn = new PDO( "mysql:host=$hostname;port=$port;dbname=$database", $user, $password );
} catch( PDOException $e ) {
    echo "Connection failed: " + $e->getMessage();
}

$stmt = $conn->prepare(
    "SELECT DISTINCT dept FROM directory_geninfo ORDER BY dept"
);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$departments = array();
foreach($results as $item){
    array_push($departments, $item["dept"]);
}
echo json_encode($departments);
?>