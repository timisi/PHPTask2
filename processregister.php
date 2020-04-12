<?php
    session_start();

    //Collecting the data
    $errorCount =0;

    $first_name     = $_POST['first_name'] != "" ? $_POST['first_name'] :$errorCount++ ;
    $last_name      = $_POST['last_name'] != "" ? $_POST['last_name'] :$errorCount++ ;
    $email          = $_POST['email'] != "" ? $_POST['email'] : $errorCount++ ;
    $password       = $_POST['password'] != "" ? $_POST['password'] : $errorCount++ ;
    $gender         = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++ ;
    $designation    = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++ ;
    $courses        = $_POST['courses'] != "" ? $_POST['courses'] : $errorCount++ ;

    //session to retain the user form values.
    $_SESSION['first_name']     = $first_name;
    $_SESSION['last_name']      = $last_name;
    $_SESSION['email']          = $email;
    $_SESSION['gender']         = $gender;
    $_SESSION['designation']    = $designation;
    $_SESSION['courses']        = $courses;


    //Verifying the data, validation

    if($errorCount > 0){
        //redirect back, and display error
        $session_error = "You have " .$errorCount. " error";
           if($errorCount > 1){
              $session_error .= "'s";
           }
           $session_error .= " in your form submission";
           $_SESSION["error"] = $session_error;
           header("location:register.php");
    }

    else {
        //save user data in a json file ()
        // To check if the user already exists

        //Assign ID to the user
        $allUsers = scandir("db/users/");
        $countAllUsers = count($allUsers);

        $newUserId = ($countAllUsers-1);

        $userObject = [
            'id'=>$newUserId ,
            'first_name' =>$first_name,
            'last_name' =>$last_name,
            'email' => $email,
            'password'=> password_hash($password, PASSWORD_DEFAULT), //password hashing
            'designation'=> $designation,
            'gender'=> $gender,
            'courses'=>$courses
        ];

    // To check if the user already exists
        for($counter=0; $counter<$countAllUsers; $counter++){
            $currentUser = $allUsers[$counter];

            if($currentUser == $email . ".json"){
                $_SESSION["error"] = "Registration Failed:- The Email ". $email . " You entered already exist.";
                    header("location:register.php");
                    die();
            }
        }

 //Saving the data into the database(folder)
        file_put_contents("db/users/". $email .".json",json_encode($userObject));
        $_SESSION["message"] = "Registration Successful, you can now login " ."<span style='font-size:20px;'><b>" . $first_name . "</b></span>";
        header("location:login.php");
    }




    //Return back to the page, with a statur message



?>