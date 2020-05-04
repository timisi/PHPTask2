<?php

include("functions/scandir.php");

    $allStaff = customScandir("db/users/");
    $countStaff = count($allStaff);

    //check if department has appointments
    $staffList = [];
    for ($counter = 0; $counter < $countStaff; $counter++) {
        $singleStaff = $allStaff[$counter];
        $staffString = file_get_contents("db/users/".$singleStaff);
        $staffObject = json_decode($staffString);
        $designationFromDB = $staffObject->designation;
        array_push($staffList, $staffObject);
    }

?>