<?php
    session_start();

    //Collecting the data
    $errorCount =0;
    if(!$_SESSION['loggedIn']) {
        $token          = $_POST['token'] != "" ? $_POST['token'] :$errorCount++ ;
        $_SESSION['token']      = $token;
    }
    $email          = $_POST['email'] != "" ? $_POST['email'] : $errorCount++ ;
    $password       = $_POST['password'] != "" ? $_POST['password'] : $errorCount++ ;

    //session to retain the user form values.

    $_SESSION['email']      = $email;

    //Verifying the data, validation
    if($errorCount > 0){
        //redirect back, and display error
        $session_error = "You have " .$errorCount. " error";
           if($errorCount > 1){
              $session_error .= "'s";
           }
           $session_error .= " in your form submission";
           $_SESSION['error'] = $session_error;
           header("Location:reset.php");
    }
    else {
        $allUserTokens = scandir("db/tokens/");
        $countAllUserTokens = count($allUserTokens);

      // To check if the user token already exists
        for($counter=0; $counter < $countAllUserTokens; $counter++){
            $currentTokenFile = $allUserTokens[$counter];

            if($currentTokenFile == $email . ".json"){
                $tokenContent =file_get_contents("db/tokens/" . $currentTokenFile);

                $tokenObject = json_decode($tokenContent);
                $tokenFromDB = $tokenObject->token;

                if($_SESSION['loggedIn']) {
                    $checkToken = true;
                }
                else{
                    $checkToken = $tokenFromDB == $token;
                }

            //Check if $tokenFromDB and $tokenContent are equal
            if($checkToken){
                $allUsers = scandir("db/users/");
                $countAllUsers = count($allUsers);

                 // To check if the user already exists
                 for($counter=0; $counter < $countAllUsers; $counter++){

                    $currentUser = $allUsers[$counter];

                    if($currentUser == $email . ".json"){
                        //Check Users Password
                        $userString =file_get_contents("db/users/".$currentUser);
                        $userObject = json_decode($userString);
                        $userObject->password = password_hash($password, PASSWORD_DEFAULT);

                        unlink("db/users/".$currentUser);//file delete, user data delete

                        file_put_contents("db/users/". $email . ".json", json_encode($userObject));

                        $_SESSION['message'] = "Password Reset Successful, You can Now Login";

                        //Inform user of successful pasword reset.
                        $subject =   $email. " Your Password Reset was Successful";
                        $message =   "Your account on SNH has has just been updated, your password has chnaged. If you
                                      did not initiate this, please visit snh.com and reset your password immediately.";
                        $headers =   "From: no-reply@snh.org" . "\r\n" .
                                     "CC: imisi@snh.org";

                        $try = mail($email,$subject,$message,$headers);
                        /* Inform user of successful password reset ends */

                        header("Location:login.php");
                        die();
                        }

                    }
                }

            }
        }
 //Saving the data into the database(folder)
        $_SESSION['error'] = "Password Reset Failed, Token/Email Is Invalid or Expired.";
        header("Location:login.php");
    }




    //Return back to the page, with a statur message
