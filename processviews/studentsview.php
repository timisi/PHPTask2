<?php

include("functions/scandir.php");

    $allStudents = customScandir("db/users/");
    $countStudents = count($allStudents);

    //check if department has users
    $studentList = [];
    for ($counter = 0; $counter < $countStudents; $counter++) {
        $singleStudent = $allStudents[$counter];
        $studentString = file_get_contents("db/users/".$singleStudent);
        $studentObject = json_decode($studentString);
        $designationFromDB = $studentObject->designation;
        array_push($studentList, $studentObject);
    }

?>