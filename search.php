<?php
include_once( "config.php" );

// getting the POST variables
$group = $_POST["group"];
$department = $_POST["department"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];

// Create connection
// $conn = new mysqli($hostname, $user, $password, $database);
$conn = new PDO( "mysql:host=$hostname;port=$port;dbname=$database", $user, $password );
try {
  // $conn = new PDO( "mysql:host=$hostname;port=$port;dbname=$database", $user, $password );
} catch( PDOException $e ) {
  echo "Connection failed: " + $e->getMessage();
}

$all_stmt = $conn->prepare(
  "SELECT username, lastname, firstname, mi, is_fac, is_stf, is_stu, is_oth, department, mailstop, zip, building, room, phone
    FROM directory_public
    LEFT JOIN directory_public_dept USING (username)
    WHERE lastname LIKE '%' ? '%' AND firstname LIKE '%' ? '%' AND department LIKE '%' ? '%'
    ORDER BY lastname, firstname"
);

$all_stmt->execute(array($lastname, $firstname, $department));
$result = $all_stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);