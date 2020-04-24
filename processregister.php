<?php
    session_start();
    require_once("functions/user.php");
    //Collecting the data
    $errorCount =0;

    $first_name     = $_POST['first_name'] != "" ? $_POST['first_name'] :$errorCount++ ;
    $last_name      = $_POST['last_name'] != "" ? $_POST['last_name'] :$errorCount++ ;
    $email          = $_POST['email'] != "" ? $_POST['email'] : $errorCount++ ;
    $password       = $_POST['password'] != "" ? $_POST['password'] : $errorCount++ ;
    $gender         = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++ ;
    $designation    = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++ ;
    $courses        = $_POST['courses'] != "" ? $_POST['courses'] : $errorCount++ ;
    $registration_date = date('d-m-Y H:i:s');



//Verifying the data, validation
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$_SESSION["nameErr"] = $_SESSION["emailErr"] ="";


    //session to retain the user form values.
    $_SESSION['first_name']     = $first_name;
    $_SESSION['last_name']      = $last_name;
    $_SESSION['email']          = $email;
    $_SESSION['gender']         = $gender;
    $_SESSION['designation']    = $designation;
    $_SESSION['courses']        = $courses;


    //Verifying the data, validation

    if($errorCount > 0){

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

        //redirect back, and display error
        $session_error = "You have " .$errorCount. " error";
           if($errorCount > 1){
              $session_error .= "'s";
           }
           $session_error .= " in your form submission";
           $_SESSION['error'] = $session_error;
           header("location:register.php");
    }

    else {



        //save user data in a json file ()
        //count all users
        $allUsers = scandir("db/users/");
        $countUsers = count($allUsers);
        $newUserID = ($countUsers-2) ;
        //$newUserId = ($countAllUsers-1);

        $userObject = [
            'id'=>$newUserId ,
            'first_name' =>$first_name,
            'last_name' =>$last_name,
            'email' => $email,
            'password'=> password_hash($password, PASSWORD_DEFAULT), //password hashing
            'designation'=> $designation,
            'gender'=> $gender,
            'courses'=>$courses,
            'registration_date' => $registration_date
        ];

    // To check if the user already exists
        $userExists = find_user($email);

            if($userExists){
                $_SESSION['error'] = "Registration Failed:- The Email ". $email . " You entered already exist.";
                    header("Location:register.php");
                    die();

        }

 //Saving the data into the database(folder)
        //save_user($userObject);
        file_put_contents("db/users/". $email .".json", json_encode($userObject));
        $_SESSION['message'] = "Registration Successful, you can now login " ."<span style='font-size:20px;'><b>" . $first_name . "</b></span>";
        header("Location:login.php");
    }
?>