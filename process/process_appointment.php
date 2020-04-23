<?php session_start();

include("../functions/scandir.php");

$errorCount = 0;

//Initialize fields and validation
$student_name = $_SESSION['full_name'];
$appointment_date = $_POST['appointment_date'] != "" ? $_POST['appointment_date'] : $errorCount++;
$appointment_time = $_POST['appointment_time'] != "" ? $_POST['appointment_time'] : $errorCount++;
$appointment_nature = $_POST['appointment_nature'] != "" ? $_POST['appointment_nature'] : $errorCount++;
$initial_complaint = $_POST['initial_complaint'] != "" ? $_POST['initial_complaint'] : $errorCount++;
$department_booked = $_POST['department_booked']  != "" ? $_POST['department_booked'] : $errorCount++;


$_SESSION['appointment_date'] = $appointment_date;
$_SESSION['appointment_time'] = $appointment_time;
$_SESSION['appointment_nature'] = $appointment_nature;
$_SESSION['initial_complaint'] = $initial_complaint;
$_SESSION['department_booked'] = $department_booked;

//function to remove unnecessary characters
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$_SESSION["complaintErr"] = $_SESSION["deptErr"] = "";

if ($errorCount > 0) {

    //Error check for Initial Complaint
    if (empty($_POST["initial_complaint"])) {
        $_SESSION["complaintErr"] = "Please fill in your initial complaint";
    } else {
        $initial_complaint = test_input($_POST["initial_complaint"]);
        //check if Complaint has less than 5 characters
        if (strlen($initial_complaint) < 5) {
            $_SESSION["complaintErr"] = "Please properly fill in your complaint";
        }
    }
    
    //Error check for Department booked for appointment
    if (empty($_POST["department_booked"])) {
        $_SESSION["deptErr"] = "Department to be booked should not be empty";
    } else {
        $department_booked = test_input($_POST["department_booked"]);
        //check if Department booked has less than 3 characters
        if (strlen($department_booked) < 3) {
            $_SESSION["deptErr"] = "Please enter a valid department";
        // check if Department booked only contains letters and whitespace
        } elseif (!preg_match("/^[a-zA-Z ]*$/",$department_booked)) {
            $_SESSION["deptErr"] = "Only letters and white space allowed";
        }
    }

    // Display error message
    $error_message = "You have " . $errorCount . " error";
    if ($errorCount > 1){
        $error_message .= "s";
    }
    $error_message .= " in your form submission";
    $_SESSION["error"] = $error_message;
    header("location: ../book_appointment.php");

} else {

    //count all appointments
    $allAppointments = customScandir("../db/appointments/");
    $countAppointments = count($allAppointments);
    $newAppointmentID = ($countAppointments + 1) ;

    //declare data to be submitted to database
    $appointmentObject = [
        'id' => $newAppointmentID,
        'student_name' => $student_name,
        'appointment_date' => $appointment_date,
        'appointment_time' => $appointment_time,
        'appointment_nature' => $appointment_nature,
        'initial_complaint' => $initial_complaint,
        'department_booked' => $department_booked
    ];
    
    // Save appointment details to database
    file_put_contents("../db/appointments/". $student_name . $appointment_date .".json", json_encode($appointmentObject));
    $_SESSION['message'] = "Appointment booking complete.";
    header("location: ../dashboard_students.php");
    
}
?>