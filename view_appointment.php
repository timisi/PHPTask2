<!-- Header  -->
<?php
  include("lib/header.php");

    if(isset($_SESSION['loggedIn']) && $_SESSION['designation'] != 'Staff' || empty($_SESSION['loggedIn'])){
        header("location: login.php");
    }
    include("lib/navbar.php");
    include("process_views/appointmentView.php");

?>
<?php

?>
<br/><br/><br/>
            <h3 id="welcome">STAFF LIST</h3>
            <div class="userform">
            <?php if($appointmentList != null) { ?>
                    <h1>Appointments</h1>
                    <table>
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
                    echo "<h3>You have no pending appointments</h3>";
                } ?>
            </div>
            <!-- LOGIN PAGE  -->

    <!-- Footer -->
    <?php
          include("lib/footer.php");
    ?>
<!-- Footer -->