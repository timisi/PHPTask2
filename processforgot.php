<?php

session_start();
require_once("functions/alert.php");

    //Collecting the data
    $errorCount = 0;

    $email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++ ;

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
           set_alert('error', $session_error); 
           header("location:forgot.php");
    }

    else {
        //save user data in a json file ()
        // To check if the user already exists

        //Assign ID to the user
        $allUsers = scandir("db/users/");
        $countAllUsers = count($allUsers);

        // $userObject = ['email' => $email];

    // To check if the user already exists
        for($counter=0; $counter<$countAllUsers; $counter++){
            $currentUser = $allUsers[$counter];

            if($currentUser == $email . ".json"){

                /**
                 * GENERATING TOKEN RANDOM TOKEN CODE FOR PASSWORD RESET
                 */

                $token   =   "";

                $alphabets = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','','n','o','p','q','r','s','t','u','v','w','x','y','z');

                for($i = 0; $i < 30; $i++){

                    //get random number
                    $index = mt_rand(0, count($alphabets)-1);
                    $token .= $alphabets[$index];
                }
                /**
                 * Token Geration Ends Here
                 */


                $subject =   "Password Reset Link For:- ". $email;
                $message =   "A password rest has been initiated from your account,
                              if you did not initiate this reset, please ignore this
                              message, otherwise,
                              visit: localhost/userauthentication/reset.php?token=". $token;
                $headers =   "From: no-reply@snh.org" . "\r\n" .
                             "CC: imisi@snh.org";

                //Saving the token into the database(Token folder)
                file_put_contents("db/tokens/". $email .".json",json_encode(['token'=>$token]));

                $try = mail($email,$subject,$message,$headers);

                if($try){
                    //display a success message
                    $_SESSION['message'] = "Reset password link sent to: ".  $email . ", You can check your Email now." ;
                    header("Location:login.php");
                }
                else {
                    $_SESSION['message'] = "Oooh! Something went wrong, we could not send password reset to: ".  $email;
                    header("Location:forgot.php");
                }

                die();
            }
        }

 //If users email is out not found in database, do this
        $_SESSION['error'] = "Email Address ".  $email .  " Not Found.";
        header("Location:forgot.php");
    }
    //Return back to the page, with a statur message


?>