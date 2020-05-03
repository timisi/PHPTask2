<?php session_start();
include("../functions/scandir.php");
require_once('../functions/user.php');
require_once('../functions/alert.php');
require_once('../functions/redirect.php');

$errorCount = 0;

if (!is_user_loggedIn()) {
    $token = $_POST['token'] != "" ? $_POST['token'] :  $errorCount++;
    $_SESSION['token'] = $token;
}
$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;

$_SESSION['email'] = $email;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$_SESSION["emailErr"] ="";

if($errorCount > 0){
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
    redirect_to("../reset.php?token=".$token);

} else {

    $allUserTokens = customScandir("../db/tokens/");
    $countAllUserTokens = count($allUserTokens);

    for ($counter = 0; $counter < $countAllUserTokens; $counter++) {
        $currentTokenFile = $allUserTokens[$counter];

        if($currentTokenFile == $email . ".json") {
            $tokenContent = file_get_contents("../db/tokens/".$currentTokenFile);
            $tokenObject = json_decode($tokenContent);
            $tokenFromDB = $tokenObject->token;

            if ($_SESSION['loggedin']) {
                $checkToken = true;
            } else {
                $checkToken = $tokenFromDB == $token;
            }

            if ($checkToken) {
                $allUsers = customScandir("../db/users/");
                $countUsers = count($allUsers);

                //check if the user exists
                for ($counter = 0; $counter < $countUsers; $counter++) {
                    $currentUser = $allUsers[$counter];

                    if($currentUser == $email . ".json") {
                        $userString = file_get_contents("../db/users/".$currentUser);
                        $userObject = json_decode($userString);
                        $userObject->password = password_hash($password,PASSWORD_DEFAULT);

                        unlink("../db/users/".$currentUser); //user data deleted
                        unlink("../db/tokens/".$currentUser); //user data deleted
                        file_put_contents("../db/users/". $email . ".json", json_encode($userObject));

                        //Inform user of password reset
                        $subject = "Password reset successful";
                        $message = "Your account on SNG School has just been updated, your password has changed. If you did not inititate this, please login to sngschool.com and reset your password immediately";
                        $headers = "From: no-reply@sngschool.com" . "\r\n" .
                        "CC: afolayantoluwalope@gmail.com" . "\r\n" .
                        "BCC: akandeoriowo@gmail.com";

                        $try = mail($email,$subject,$message,$headers);
                        //end inform user of password reset

                        set_alert('message',"Password Reset Successful, you can now login");
                        redirect_to("../login.php");
                        die();
                    }
                }
            }
        }
    }

    set_alert('error', "Password Reset Failed, token/email invalid or expired");
    redirect_to("../login.php");
}