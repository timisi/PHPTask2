<?php
    session_start();

 //Collecting the data
 $errorCount =0;

 $email      = $_POST['email'] != "" ? $_POST['email'] : $errorCount++ ;
 $password   = $_POST['password'] != "" ? $_POST['password'] : $errorCount++ ;
 $last_login = date('d-m-Y H:i:s');



 //session to retain the user form values.
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


        //Verifying the data, validation
        if($errorCount > 0){
            //redirect back, and display error
            $session_error = "You have " .$errorCount. " error";
                if($errorCount > 1){
                $session_error .= "'s";
                }
                $session_error .= " in your form submission";
                $_SESSION['error'] = $session_error;
            header("Location:login.php");
        }
}

 else{
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

     // To check if the user already exists
     for($counter=0; $counter < $countAllUsers; $counter++){
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
            //Check Users Password
            $userString =file_get_contents("db/users/" . $currentUser);
            $userObject = json_decode($userString);
            $passwordFromDB = $userObject->password;

            //Collect users password and encrypt it
            $passwordFromUser = password_verify($password, $passwordFromDB);

            //Check if $passwordFromDB and $passwordFromUser are equal
            if($passwordFromDB == $passwordFromUser){
                //redirect to proper dash board
                $_SESSION['loggedIn'] = $userObject ->id;
                $_SESSION['email'] = $userObject ->email;
                $_SESSION['fullname'] = $userObject ->first_name . " " . $userObject->last_name;
                $_SESSION['role'] = $userObject ->designation;
                $_SESSION['courses'] = $userObject ->courses;
                $_SESSION["registration_date"] = $userObject->registration_date;
                $_SESSION["last_login"] = $last_login;

                //redirect to dashboard according to the user designation
                if ($userObject->designation == "Staff") {
                    header("location: dashboardstaffs.php");
                } elseif ($userObject->designation == "Student") {
                    header("location: dashboardstudents.php");
                } else {
                    header("location: dashboard.php");
                }
                die();
            }

        }
    }
    $_SESSION['error'] = "Invalid Email or Password.";
    header("Location:login.php");
    die();
}
?>