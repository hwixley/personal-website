<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["Contact-Name"]);
    $email = validate_email($_POST["Contact-Email"]);
    $message = test_input($_POST["Contact-Message"]);

    if ($email != "" && $name != "") {
        $to = "hwixley1@gmail.com";
        $subject = "Website message: ";

        $message = "<b>\($message)</b>";
        $message .= "<h1>Name: \($name)</h1>";

        $header = "From:\($email) \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail($to,$subject,$message,$header);

        if( $retval == true ) {
            debug_to_console("Message sent successfully...");
        }else {
            debug_to_console("Message could not be sent...");
        }
    }
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validate_email($data) {
    $test_email = test_input($data);
    if (!filter_var($test_email, FILTER_VALIDATE_EMAIL)) {
        return = "";
    } else {
        return $test_email;
    }
}
?>