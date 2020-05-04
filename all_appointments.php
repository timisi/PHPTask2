<!-- Header  -->
<?php
include("lib/header.php");

//check if user user allready loggedIn using the $_SESSION['loggedIn']
if (!isset($_SESSION['loggedin']) && empty($_SESSION['loggedin']) ) {
    header("location: login.php");
}
include ("process_views/allappointmentsView.php");
?>
<?php
    include("lib/navbar.php");
?>
<header>
    <h1 style="text-align:left;">DASHBOARD</h1>
</header>

<h3 id="welcome">
    Welcome: <b><?php echo $_SESSION['first_name']." ".$_SESSION['first_name']?></b>
</h3>
    <div class="userform">
            <?php if($appointmentList != null) { ?>
                    <h1>All Appointments</h1>
                    <table>
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
    include("lib/footer.php");
    ?>
<!-- Footer -->











