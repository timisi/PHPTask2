<?php
    session_start();

 //Collecting the data
 $errorCount =0;

 $email      = $_POST['email'] != "" ? $_POST['email'] : $errorCount++ ;
 $password   = $_POST['password'] != "" ? $_POST['password'] : $errorCount++ ;

 //session to retain the user form values.
 $_SESSION['email'] = $email;


 //Verifying the data, validation

 if($errorCount > 0){
     //redirect back, and display error
     $session_error = "You have " .$errorCount. " error";
        if($errorCount > 1){
           $session_error .= "'s";
        }
        $session_error .= " in your form submission";
        $_SESSION["error"] = $session_error;
    header("location:login.php");
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
                    header("Location: dashboard.php");
                die();
            }

        }
    }
    $_SESSION["error"] = "Invalid Email or Password.";
    header("location:login.php");
    die();
}


?>