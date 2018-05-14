<?php
include_once( "config.php" );

// getting the POST variables
$group = $_POST["group"];
$department = $_POST["department"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];

// Create connection
try {
  $conn = new PDO( "mysql:host=$hostname;port=$port;dbname=$database", $user, $password );
} catch( PDOException $e ) {
  echo "Connection failed: " + $e->getMessage();
}

if($group == "all"){
  // get both UWO staff and students
  $stmt = $conn->prepare(
    "SELECT username, lastname, firstname, mi, is_fac, is_stf, is_stu, is_oth, department, mailstop, zip, building, room, phone
      FROM directory_public
      LEFT JOIN directory_public_dept USING (username)
      WHERE lastname LIKE '%' ? '%' AND firstname LIKE '%' ? '%' AND ((department LIKE '%' ? '%') OR (department IS NULL)) AND ( is_fac = 'Y' OR is_stf = 'Y' OR is_stu = 'Y')
      ORDER BY lastname, firstname"
  );
} else if($group == "faculty-and-staff"){
  // only get staff
  $stmt = $conn->prepare(
    "SELECT username, lastname, firstname, mi, is_fac, is_stf, is_stu, is_oth, department, mailstop, zip, building, room, phone
      FROM directory_public
      LEFT JOIN directory_public_dept USING (username)
      WHERE lastname LIKE '%' ? '%' AND firstname LIKE '%' ? '%' AND department LIKE '%' ? '%' AND ( is_fac = 'Y' OR is_stf = 'Y')
      ORDER BY lastname, firstname"
  );
} else{
  //only get students
  $stmt = $conn->prepare(
    "SELECT username, lastname, firstname, mi, is_fac, is_stf, is_stu, is_oth, department, mailstop, zip, building, room, phone
      FROM directory_public
      LEFT JOIN directory_public_dept USING (username)
      WHERE lastname LIKE '%' ? '%' AND firstname LIKE '%' ? '%' AND ((department LIKE '%' ? '%') OR (department IS NULL)) AND (is_stu = 'Y')
      ORDER BY lastname, firstname"
  );
}



$stmt->execute(array($lastname, $firstname, $department));
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);