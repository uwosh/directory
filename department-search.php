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
        $department = $_POST["department"];
        
        // Create connection
        try {
          $conn = new PDO( "mysql:host=$hostname;port=$port;dbname=$database", $user, $password );
        } catch( PDOException $e ) {
          echo "Connection failed: " + $e->getMessage();
        }

        $stmt = $conn->prepare(
          "SELECT dept, description, phone, location FROM directory_geninfo WHERE dept LIKE ? ORDER BY description"
        );
        $stmt->execute(array($department));
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    }
 } 




