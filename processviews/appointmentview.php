<?php

    include("functions/scandir.php");

    $allAppointments = customScandir("db/appointments/");
    $countAppointments = count($allAppointments);

    //check if department has appointments
    $appointmentList = [];
    for ($counter = 0; $counter < $countAppointments; $counter++) {
        $singleAppointment = $allAppointments[$counter];
        $appointmentString = file_get_contents("db/appointments/".$singleAppointment);
        $appointmentObject = json_decode($appointmentString);
        $departmentFromDB = $appointmentObject->department_booked;
        array_push($appointmentList, $appointmentObject);
    }

?>