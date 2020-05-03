<?php session_start();
require_once('../functions/scandir.php');
require_once('../functions/alert.php');
require_once('../functions/redirect.php');
require_once('../functions/user.php');

$errorCount = 0;

//Initialize fields and validation
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;
$last_login = date('d-m-Y H:i:s');

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
		session_unset();
    } else {
        $email = test_input($_POST["email"]);
        //check if email has less than 5 characters
        if (strlen($email) < 5) {
            $_SESSION["emailErr"] = "Email is too short";
			session_unset();
        // check if e-mail address is well-formed
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["emailErr"] = "Invalid email format";
			session_unset();
        }
    }

    // Display error message
    $session_error = "You have " . $errorCount . " error";
    if($errorCount > 1) {
        $session_error .= "s";
    }
    $session_error .=   " in your form submission";
    set_alert('error',$session_error);
    redirect_to("../login.php");

} else {
    //check if the user exists
    $currentUser = find_user($email);

        if($currentUser) {
            //Check user password
            $userString = file_get_contents("../db/users/".$currentUser->email . ".json");
            $userObject = json_decode($userString);
            $passwordFromDB = $userObject->password;

            $passwordFromUser = password_verify($password, $passwordFromDB);

            if($passwordFromDB == $passwordFromUser) {
                $_SESSION["loggedin"] = $userObject->id;
                $_SESSION["first_name"] = $userObject->first_name;
                $_SESSION["last_name"] = $userObject->last_name;
                $_SESSION["email"] = $userObject->email;
                $_SESSION["designation"] = $userObject->designation;
                $_SESSION["department"] = $userObject->department;
                $_SESSION["registration_date"] = $userObject->registration_date;
                $_SESSION["last_login"] = $last_login;

                //redirect to dashboard according to the user designation
                if ($userObject->designation == "Staff") {
                    redirect_to("../dashboard_staff.php");
                } elseif ($userObject->designation == "Student") {
                    redirect_to("../dashboard_students.php");
                } elseif($userObject->designation == "Super Admin") {
                    redirect_to("../dashboard.php");
                }
                die();
            }
        }
    set_alert('error',"Invalid Email or Password");
    redirect_to("../login.php");
    die();
}