<<<<<<< Updated upstream
<!-- Header  -->
<?php
  include_once("lib/header.php");
  require_once('functions/alert.php');
    //session_start();

    //check if user user allready loggedIn using the $_SESSION['loggedIn']
   // if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
        // redirect to dashboard
        //header("Location: dashboard.php");
        //die();
   // }

?>
<!-- Header -->

<!-- Navbar -->
    <?php
    include_once("lib/navbar.php");
    ?>
<!-- Navbar -->
            <!-- LOGIN PAGE --><br/><br/><br/>
            <h3 id="welcome">Welcome: Book Appointment</h3>

            <div class="userform">
                <form action="processregister.php" method="POST">
                <div class="row col-6">
                        <p>All Fields are required * </p>
                    </div>
                    <p>
                        <?php print_alert(); ?>
                    </p>
                            <p>
                                <label>First Name</label>
                                <input
                                    <?php
                                        if(isset($_SESSION['first_name'])){
                                            echo "value=" . $_SESSION['first_name'];
                                        }
                                    ?>
                                    type="text" name="first_name" placeholder="First Name" />
                            </p>
                            <p>
                                <label>Date of Appointment</label>
                                <input
                                    <?php
                                        if(isset($_SESSION['appointment_date'])){
                                            echo "value=" . $_SESSION['appointment_date'];
                                        }
                                    ?>
                                    type="date" name="appointment_datename" placeholder="Date of Appointment" />
                            </p>
                            <p>
                                <label>Time of Appointment (24-Hours)</label>
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
                                <select name="appointment_reason">
                                    <option value="">-Select-</option>
                                    <?php
                            if (isset($_SESSION['appointment_nature']) && !empty($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Grade Issues') {
                                echo 'selected';
                            }
                        ?>
                        >Grade Issues</option>
                        <option
                        <?php
                            if (isset($_SESSION['appointment_nature']) && !empty($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Missing Report Card') {
                                echo 'selected';
                            }
                        ?>
                        >Missing Report Card</option>
                        <option
                        <?php
                            if (isset($_SESSION['appointment_nature']) && !empty($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Counselling') {
                                echo 'selected';
                            }
                        ?>
                        >Counselling</option>
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
                                <label>Designation</label>
                                    <select name="designation">
                                        <option value="">-Select-</option>
                                        <option
                                            <?php
                                                if(isset($_SESSION['designation']) && $_SESSION['designation']=='Student'){
                                                    echo "selected";
                                                }
                                            ?>
                                        >Student</option>
                                        <option
                                            <?php
                                                if(isset($_SESSION['designation']) && $_SESSION['designation']=='Mentor'){
                                                    echo "selected";
                                                }
                                            ?>
                                        >Mentor</option>
                                    </select>
                            </p>

                            <p>
                                <label>Department</label>
                                <select name="courses" class="form-control">
                        <option value="">Select One</option>
                        <option
                        <?php
                            if (isset($_SESSION['courses']) && !empty($_SESSION['courses']) && $_SESSION['department'] == 'Php') {
                                echo 'selected';
                            }
                        ?>
                        >Php</option>
                        <option
                        <?php
                            if (isset($_SESSION['courses']) && !empty($_SESSION['courses']) && $_SESSION['department'] == 'Design') {
                                echo 'selected';
                            }
                        ?>
                        >Design</option>
                        <option
                        <?php
                            if (isset($_SESSION['courses']) && !empty($_SESSION['courses']) && $_SESSION['department'] == 'HTML/CSS/JS') {
                                echo 'selected';
                            }
                        ?>
                        >HTML/CSS/JS</option>
                        <option
                        <?php
                            if (isset($_SESSION['courses']) && !empty($_SESSION['courses']) && $_SESSION['department'] == 'C#') {
                                echo 'selected';
                            }
                        ?>
                        >C#</option>
                        <option
                        <?php
                            if (isset($_SESSION['courses']) && !empty($_SESSION['courses']) && $_SESSION['courses'] == 'Non Teaching Staff') {
                                echo 'selected';
                            }
                        ?>
                        >Non Teaching Staff</option>
                    </select>
                            </p>

                            <p>
                                <input type="submit" value="REGISTER">
                            </p>

                            <p id="shortText">
                                    <a href="login.php">Already have an account? Login</a>
                            </p>
                        </form>
                    </div>
                </div>


                </form>
            </div>
            <!-- LOGIN PAGE  -->

    <!-- Footer -->
    <?php
    include_once("lib/footer.php");
    ?>
=======
<!-- Header  -->
<?php
  include_once("lib/header.php");
  require_once('functions/alert.php');
    //session_start();

   //redirect to login page if user designation is not "Student" or user hasn't logged in
   if(isset($_SESSION['loggedin']) && $_SESSION['designation'] != 'Student' || empty($_SESSION['loggedin'])){
    //redirect to dashboard
    header("location: login.php");
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
            <h3 id="welcome">Welcome: Book Appointment</h3>

            <div class="userform">
                <form action="process/processappointment.php" method="POST">
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
                                <label>Time of Appointment (24-Hours)</label>
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
                            if (isset($_SESSION['appointment_nature']) && !empty($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Counselling') {
                                echo 'selected';
                            }
                        ?>
                        >Counselling</option>
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
                </div>


                </form>
            </div>
            <!-- LOGIN PAGE  -->

    <!-- Footer -->
    <?php
    include_once("lib/footer.php");
    ?>
>>>>>>> Stashed changes
<!-- Footer -->