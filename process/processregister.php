<?php session_start();

$errorCount = 0;

//Initialize fields and validation
$full_name = strlen($_POST['full_name']) > 2 ? $_POST['full_name'] : $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;
$designation = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++;
$department = $_POST['department']  != "" ? $_POST['department'] : $errorCount++;
$registration_date = date('d-m-Y H:i:s');


$_SESSION['full_name'] = $full_name;
$_SESSION['gender'] = $gender;
$_SESSION['email'] = $email;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$_SESSION["nameErr"] = $_SESSION["emailErr"] ="";

if ($errorCount > 0) {

    //Error check for first name
    if (empty($_POST["full_name"])) {
        $_SESSION["nameErr"] = "Your full name is required";
    } else {
        $full_name = test_input($_POST["full_name"]);
        //check if name has less than 2 characters
        if (strlen($full_name) < 2) {
            $_SESSION["nameErr"] = "Full name is too short";
        // check if name only contains letters and whitespace
        } elseif (!preg_match("/^[a-zA-Z ]*$/",$full_name)) {
            $_SESSION["nameErr"] = "Only letters and white space allowed";
        }
    }
    
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
    header("location: ../register.php");

} else {

    //count all users
    $allUsers = scandir("../db/users/");
    $countUsers = count($allUsers);
    $newUserID = ($countUsers-2) ;

    //declare data to be submitted to database
    $userObject = [
        'id' => $newUserID,
        'full_name' => $full_name,
        'gender' => $gender,
        'email' => $email,
        'password' => password_hash($password,PASSWORD_DEFAULT),
        'designation' => $designation,
        'department' => $department,
        'registration_date' => $registration_date
    ];

    //check if the user exists
    for ($counter = 0; $counter < $countUsers; $counter++) {
        $currentUser = $allUsers[$counter];
        
        if($currentUser == $email . ".json") {
            $_SESSION["error"] = "Registration failed, User already exists";
            header("location: ../register.php");
            die();
        }
    }

    // Save user details to database
    file_put_contents("../db/users/". $email .".json", json_encode($userObject));
    $_SESSION['message'] = "Registration complete. You can login now";
    header("location: ../login.php");
    
}
?>