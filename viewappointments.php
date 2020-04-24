<!-- Header  -->
<?php
  include_once("lib/header.php");
  require_once('functions/alert.php');
  include("processviews/appointmentview.php");
    //session_start();

    //check if user user allready loggedIn using the $_SESSION['loggedIn']
    if(isset($_SESSION['loggedIn']) && $_SESSION['designation'] != 'Staff' || empty($_SESSION['loggedIn'])){
        // redirect to dashboard
        header("Location: login.php");
        //die();
    }

?>
<!-- Header -->

<!-- Navbar -->
    <?php
    include_once("lib/navbar.php");
    ?>
<!-- Navbar -->
            <!-- LOGIN PAGE --><br/><br/><br/>
            <h3 id="welcome">STAFF LIST</h3>

            <div class="userform">
            <?php if($departmentFromDB == $_SESSION['department']) { ?>
                    <h1>Appointments</h1>
                    <table class="table table-inverse table-responsive staff text-left">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Date of appointment</th>
                                <th>Nature of appointment</th>
                                <th>Initial complaint</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach ($appointmentList as $appointmentItem) { ?>

                            <?php if($appointmentItem->department_booked == $_SESSION['department']) { ?>
                                <tr>
                                    <td><?php echo $appointmentItem->student_name ;?></td>
                                    <td><?php echo $appointmentItem->appointment_date ;?></td>
                                    <td><?php echo $appointmentItem->appointment_nature ;?></td>
                                    <td><?php echo $appointmentItem->initial_complaint ;?></td>
                                </tr>
                            <?php } ?>

                        <?php } ?>
                        </tbody>
                    </table>
                <?php }  else {
                    echo "<h3>NO PENDING APPOINTMENT</h3>";
                } ?>
            </div>
            <!-- LOGIN PAGE  -->

    <!-- Footer -->
    <?php
    include_once("lib/footer.php");
    ?>
<!-- Footer -->