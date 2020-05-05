<!-- Header  -->
<?php
  include_once("lib/header.php");

  //redirect to login page if user designation is not "Student" or user hasn't logged in
  if(isset($_SESSION['loggedin']) && $_SESSION['designation'] != 'Student' || empty($_SESSION['loggedin'])){
    //redirect to dashboard
    header("location: login.php");
}

require_once('functions/alert.php');
require_once('functions/redirect.php');
?>

<?php
    include_once("lib/navbar.php");
?>
<br/><br/><br/>
<h3 id="welcome">Welcome: Book Appointment</h3>
<div class="userform">
    <form action="process/process_appointment.php" method="POST">
        <div class="row col-6">
            <p>All Fields are required * </p>
        </div>
                    <p>
                        <?php print_alert();  ?>
                    </p>
                            <p>
                                <label>Full Name</label>
                                <input
                                    <?php
                                        if(isset($_SESSION['full_name'])){
                                            echo "value=" . $_SESSION['full_name'];
                                        }
                                    ?>
                                    type="text" name="full_name" placeholder="full Name" />
                            </p>
                            <p>
                                <label>Date of Appointment</label>
                                <input
                                    <?php
                                        if(isset($_SESSION['appointment_date'])){
                                            echo "value=" . $_SESSION['appointment_date'];
                                        }
                                    ?>
                                    type="date" name="appointment_date" placeholder="Date of Appointment" />
                            </p>
                            <p>
                                <label>Time of Appointment</label>
                                <input
                                    <?php
                                        if(isset($_SESSION['appointment_time'])){
                                            echo "value=" . $_SESSION['appointment_time'];
                                        }
                                    ?>
                                    type="time" name="appointment_time" placeholder="Time of Appointment" />
                            </p>

                            <p>
                                <label>Reason For Appointment</label>
                                <select name="appointment_nature">
                                    <option value="">-Select-</option>
                                    <?php
                            if (isset($_SESSION['appointment_nature']) && !empty($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Missing Grade') {
                                echo 'selected';
                            }
                        ?>
                        >Missing Grade</option>
                        <option
                        <?php
                            if (isset($_SESSION['appointment_nature']) && !empty($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Missed Task') {
                                echo 'selected';
                            }
                        ?>
                        >Missed Task</option>
                        <option
                        <?php
                            if (isset($_SESSION['appointment_nature']) && !empty($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Guidiance') {
                                echo 'selected';
                            }
                        ?>
                        >Guidiance</option>
                        <option
                        <?php
                            if (isset($_SESSION['appointment_nature']) && !empty($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Health Issues') {
                                echo 'selected';
                            }
                        ?>
                        >Health Issues</option>
                        <option
                        <?php
                            if (isset($_SESSION['appointment_nature']) && !empty($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Others') {
                                echo 'selected';
                            }
                        ?>
                        >Others</option>
                    </select>
                            </p>

                            <p>
                                <label>Previous Complaint</label>
                                <textarea class="form-control" name="initial_complaint" rows="3">
                                    <?php
                                        if (isset($_SESSION['initial_complaint']) && !empty($_SESSION['initial_complaint'])) {
                                            echo $_SESSION['initial_complaint'];
                                         }
                                    ?>
                                </textarea>
                            </p>

                            <p>
                                <label>Department Which You Booked Appointment For</label>
                                <select name="department_booked" class="form-control">
                        <option value="">Select One</option>
                        <option
                        <?php
                            if (isset($_SESSION['department_booked']) && !empty($_SESSION['department_booked']) && $_SESSION['department_booked'] == 'Php') {
                                echo 'selected';
                            }
                        ?>
                        >Php</option>
                        <option
                        <?php
                            if (isset($_SESSION['department_booked']) && !empty($_SESSION['department_booked']) && $_SESSION['department_booked'] == 'Design') {
                                echo 'selected';
                            }
                        ?>
                        >Design</option>
                        <option
                        <?php
                            if (isset($_SESSION['department_booked']) && !empty($_SESSION['department_booked']) && $_SESSION['department_booked'] == 'HTML/CSS/JS') {
                                echo 'selected';
                            }
                        ?>
                        >HTML/CSS/JS</option>
                        <option
                        <?php
                            if (isset($_SESSION['department_booked']) && !empty($_SESSION['department_booked']) && $_SESSION['department_booked'] == 'C#') {
                                echo 'selected';
                            }
                        ?>
                        >C#</option>
                        <option
                        <?php
                            if (isset($_SESSION['department_booked']) && !empty($_SESSION['department_booked']) && $_SESSION['department_booked'] == 'Non Teaching Staff') {
                                echo 'selected';
                            }
                        ?>
                        >Non Teaching Staff</option>
                    </select>
                            </p>

                            <p>
                                <input type="submit" value="BOOK APPOINMENT">
                            </p>
                </form>
            </div>
            <!-- LOGIN PAGE  -->

    <!-- Footer -->
    <?php
    include("lib/footer.php");
    ?>
<!-- Footer -->