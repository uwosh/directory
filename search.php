<?php

include_once( "config.php" );

// Checks if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Lf1iFoUAAAAACU42-6uai6R5jiP204s1HudWV-f',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['grecaptcharesponse']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        echo json_encode(''); // return nothing
    } else {
        // If CAPTCHA is successfully completed...

        // getting the POST variables
        $group = $_POST["group"];
        $department = $_POST["department"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $phone = $_POST["phone"];

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
              WHERE lastname LIKE '%' ? '%' AND firstname LIKE '%' ? '%'
              ORDER BY lastname, firstname"
          );
          $stmt->execute(array($lastname, $firstname));
        } else if($group == "faculty-and-staff"){
          // only get staff
          $stmt = $conn->prepare(
            "SELECT username, lastname, firstname, mi, is_fac, is_stf, is_stu, is_oth, department, mailstop, building, room, phone
              FROM directory_public
              LEFT JOIN directory_public_dept USING (username)
              WHERE lastname LIKE '%' ? '%' AND firstname LIKE '%' ? '%' AND department = ? AND ( is_fac = 'Y' OR is_stf = 'Y')
              ORDER BY lastname, firstname"
          );
          $stmt->execute(array($lastname, $firstname, $department));

          // get the department information as well
          $dept_stmt = $conn->prepare(
            "SELECT description, phone, location FROM directory_geninfo WHERE dept LIKE ? ORDER BY description"
          );
          $dept_stmt->execute(array($department));
        } else if ($group == "students"){
          // only get students
          $stmt = $conn->prepare(
            "SELECT username, lastname, firstname, mi, is_fac, is_stf, is_stu, is_oth, department, mailstop, building, room, phone
              FROM directory_public
              LEFT JOIN directory_public_dept USING (username)
              WHERE lastname LIKE '%' ? '%' AND firstname LIKE '%' ? '%' AND is_stu = 'Y'
              ORDER BY lastname, firstname"
          );
          $stmt->execute(array($lastname, $firstname));
        }
        else{
          //phone
          $stmt = $conn->prepare(
            "SELECT username, lastname, firstname, mi, is_fac, is_stf, is_stu, is_oth, department, mailstop, building, room, phone
              FROM directory_public_dept
              LEFT JOIN  directory_public USING (username)
              WHERE phone = ?
              ORDER BY lastname, firstname"
          );
          $stmt->execute(array($phone));
        }

        $persons_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if( isset($dept_stmt) ) {
          $dept_result = $dept_stmt->fetchAll(PDO::FETCH_ASSOC);
        } else{
          $dept_result = null;
        }
        
        $result = array("department_result"=>$dept_result, "persons_result"=>$persons_result);

        echo json_encode($result);
    }
 } 




