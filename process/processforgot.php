<?php session_start();
require_once('../functions/alert.php');
require_once('../functions/email.php');
require_once('../functions/token.php');
require_once('../functions/user.php');
require_once('../functions/scandir.php');

$errorCount = 0;

//Initialize fields and validation
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;

$_SESSION['email'] = $email;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$_SESSION["emailErr"] ="";

if ($errorCount > 0) {
    //Error check for email
    if (empty($_POST["email"])) {
        $_SESSION["emailErr"] = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        //check if email has less than 5 characters
        if (strlen($email) < 5) {
            $_SESSION["emailErr"] = "Email is too short";
        // check if e-mail address is well-formed
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["emailErr"] = "Invalid email format";
        }
    }

    // Display error message
    $session_error = "You have " . $errorCount . " error";
    if($errorCount > 1) {
        $session_error .= "s";
    }
    $session_error .=   " in your form submission";
    set_alert('error',$session_error);
    redirect_to("../forgot.php");

} else {
    //count all users
    $allUsers = customScandir("../db/users/");
    $countAllUsers = count($allUsers);

    for ($counter = 0; $counter < $countAllUsers ; $counter++) {
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
            $token = generate_token();
            $subject = "Password Reset Link";
            $message = "A password reset has been initiated from your account, if you did not initiate this reset, please ignore this message, otherwise, visit: localhost:70/phptask2/reset.php?token=".$token;

            file_put_contents("../db/tokens/". $email . ".json", json_encode(['token'=>$token]));

            send_mail($subject,$message,$email);

            die();
        }

    }
    set_alert('error',"Email not registered with us ERROR: " . $email);
    redirect_to("../forgot.php");
}