<?php

// include_once( "config.php" );

// // Checks if form has been submitted
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     function post_captcha($user_response) {
//         $fields_string = '';
//         $fields = array(
//             'secret' => '6Lf1iFoUAAAAACU42-6uai6R5jiP204s1HudWV-f',
//             'response' => $user_response
//         );
//         foreach($fields as $key=>$value)
//         $fields_string .= $key . '=' . $value . '&';
//         $fields_string = rtrim($fields_string, '&');

//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
//         curl_setopt($ch, CURLOPT_POST, count($fields));
//         curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

//         $result = curl_exec($ch);
//         curl_close($ch);

//         return json_decode($result, true);
//     }

//     // Call the function post_captcha
//     $res = post_captcha($_POST['grecaptcharesponse']);

//     if (!$res['success']) {
//         // What happens when the CAPTCHA wasn't checked
//         echo json_encode(''); // return nothing
//     } else {
//         // If CAPTCHA is successfully completed...

//         // getting the POST variables
//         $group = $_POST["group"];
//         $department = $_POST["department"];
//         $firstname = $_POST["firstname"];
//         $lastname = $_POST["lastname"];

//         // Create connection
//         try {
//           $conn = new PDO( "mysql:host=$hostname;port=$port;dbname=$database", $user, $password );
//         } catch( PDOException $e ) {
//           echo "Connection failed: " + $e->getMessage();
//         }

//         if($group == "all"){
//           // get both UWO staff and students
//           $stmt = $conn->prepare(
//             "SELECT username, lastname, firstname, mi, is_fac, is_stf, is_stu, is_oth, department, mailstop, zip, building, room, phone
//               FROM directory_public
//               LEFT JOIN directory_public_dept USING (username)
//               WHERE lastname LIKE '%' ? '%' AND firstname LIKE '%' ? '%' AND ((department LIKE '%' ? '%') OR (department IS NULL)) AND ( is_fac = 'Y' OR is_stf = 'Y' OR is_stu = 'Y')
//               ORDER BY lastname, firstname"
//           );
//         } else if($group == "faculty-and-staff"){
//           // only get staff
//           $stmt = $conn->prepare(
//             "SELECT username, lastname, firstname, mi, is_fac, is_stf, is_stu, is_oth, department, mailstop, zip, building, room, phone
//               FROM directory_public
//               LEFT JOIN directory_public_dept USING (username)
//               WHERE lastname LIKE '%' ? '%' AND firstname LIKE '%' ? '%' AND department LIKE '%' ? '%' AND ( is_fac = 'Y' OR is_stf = 'Y')
//               ORDER BY lastname, firstname"
//           );
//         } else{
//           //only get students
//           $stmt = $conn->prepare(
//             "SELECT username, lastname, firstname, mi, is_fac, is_stf, is_stu, is_oth, department, mailstop, zip, building, room, phone
//               FROM directory_public
//               LEFT JOIN directory_public_dept USING (username)
//               WHERE lastname LIKE '%' ? '%' AND firstname LIKE '%' ? '%' AND ((department LIKE '%' ? '%') OR (department IS NULL)) AND (is_stu = 'Y')
//               ORDER BY lastname, firstname"
//           );
//         }

//         $stmt->execute(array($lastname, $firstname, $department));
//         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//         echo json_encode($result);
//     }
//  } 




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
    "SELECT username, lastname, firstname, mi, is_fac, is_stf, is_stu, is_oth, department, mailstop, building, room, phone
      FROM directory_public
      LEFT JOIN directory_public_dept USING (username)
      WHERE lastname LIKE '%' ? '%' AND firstname LIKE '%' ? '%' AND department LIKE '%' ? '%'
      ORDER BY lastname, firstname"
  );
} else if($group == "faculty-and-staff"){
  // only get staff
  $stmt = $conn->prepare(
    "SELECT username, lastname, firstname, mi, is_fac, is_stf, is_stu, is_oth, department, mailstop, building, room, phone
      FROM directory_public
      LEFT JOIN directory_public_dept USING (username)
      WHERE lastname LIKE '%' ? '%' AND firstname LIKE '%' ? '%' AND department LIKE '%' ? '%' AND ( is_fac = 'Y' OR is_stf = 'Y')
      ORDER BY lastname, firstname"
  );
} else{
  // only get students
  $stmt = $conn->prepare(
    "SELECT username, lastname, firstname, mi, is_fac, is_stf, is_stu, is_oth, department, mailstop, building, room, phone
      FROM directory_public
      LEFT JOIN directory_public_dept USING (username)
      WHERE lastname LIKE '%' ? '%' AND firstname LIKE '%' ? '%' AND department LIKE '%' ? '%' AND is_stu = 'Y'
      ORDER BY lastname, firstname"
  );
}

$stmt->execute(array($lastname, $firstname, $department));
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
