<?php session_start();

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
    $error_message = "You have " . $errorCount . " error";
    if ($errorCount > 1){
        $error_message .= "s";
    }
    $error_message .= " in your form submission";
    $_SESSION["error"] = $error_message;
    header("location: ../login.php");

} else {
    //count all users
    $allUsers = scandir("../db/users/");
    $countUsers = count($allUsers);
 
     //check if the user exists
    for ($counter = 0; $counter < $countUsers; $counter++) {
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json") {
            //Check Password
            $userString = file_get_contents("../db/users/".$currentUser);
            $userObject = json_decode($userString);
            $passwordFromDB = $userObject->password;
            
            $passwordFromUser = password_verify($password, $passwordFromDB);
            if($passwordFromDB == $passwordFromUser) {
                $_SESSION["loggedin"] = $userObject->id;
                $_SESSION["full_name"] = $userObject->full_name;
                $_SESSION["designation"] = $userObject->designation;
                $_SESSION["department"] = $userObject->department;
                $_SESSION["registration_date"] = $userObject->registration_date;
                $_SESSION["last_login"] = $last_login;
                //redirect to dashboard according to the user designation
                if ($userObject->designation == "Staff") {
                    header("location: ../dashboard_staff.php");
                } elseif ($userObject->designation == "Student") {
                    header("location: ../dashboard_students.php");
                } else {
                    header("location: ../dashboard.php");
                }
                die();
            }
        }
    }
    $_SESSION["error"] = "Invalid Email or Password";
    header("location: ../login.php");
    die();
}