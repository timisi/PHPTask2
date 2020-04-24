<!-- Header  -->
<?php
    //session_start();
    include_once("lib/header.php");

     //check if user user allready loggedIn using the $_SESSION['loggedIn']
     if (isset($_SESSION['loggedin']) && $_SESSION['designation'] != 'Super Admin' || empty($_SESSION['loggedin'])) {
        header("location: login.php");
        //die();
    }
    include ("processviews/allAppointmentsview.php");
?>
<!-- Header -->

<!-- Navbar -->
<?php
    include_once("lib/navbar.php");
?>
<!-- Navbar -->
<!-- HEADER -->
<header>
    <h1 style="text-align:left;">DASHBOARD</h1>
</header>

<!-- COPIED CODE HERE -->
<h3 id="welcome">
    Welcome: <b><?php echo $_SESSION['fullname']?></b>
</h3>
    <div class="userform">
            <?php if($appointmentList != null) { ?>
                    <h1>All Appointments</h1>
                    <table class="table table-inverse table-responsive staff text-left">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Date of appointment</th>
                                <th>Nature of appointment</th>
                                <th>Initial complaint</th>
                                <th>Department Booked</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach ($appointmentList as $appointmentItem) { ?>
                            <tr>
                                <td><?php echo $appointmentItem->student_name ;?></td>
                                <td><?php echo $appointmentItem->appointment_date ;?></td>
                                <td><?php echo $appointmentItem->appointment_nature ;?></td>
                                <td><?php echo $appointmentItem->initial_complaint ;?></td>
                                <td><?php echo $appointmentItem->department_booked ;?></td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                <?php }  else {
                    echo "<h3>There are no pending appointments</h3>";
                } ?>
    </div>
            <!-- LOGIN PAGE  -->


<!-- Footer -->
    <?php
    include_once("lib/footer.php");
    ?>
<!-- Footer -->











