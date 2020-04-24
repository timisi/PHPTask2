<!-- Header  -->
<?php
include_once('lib/header.php');

require_once('functions/alert.php');

if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin']) && $_SESSION['designation'] == 'Student'){
    header("location: dashboardstudents.php");
} elseif (isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin']) && $_SESSION['designation'] == 'Staff') {
    header("location: dashboardstaffs.php");
} elseif (isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin']) && $_SESSION['designation'] == 'Super Admin') {
    header("location: dashboard.php");
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
            <h3 id="welcome">Welcome: Please Login</h3>

        <div class="userform">
            <p>
                <?php  print_alert(); //$_SESSION["emailErr"] ?>
            </p>

            <!-- FORM -->
              <form action="processlogin.php" method="POST">
                <p>
                    <label for="fname">Email</label>
                    <input type="text" id="fname" name="email" placeholder="Your Email...">
                </p>

                <p>
                    <label for="lname">Password</label>
                    <input type="password" id="lname" name="password" placeholder="Your Password..">
                </p>
                <input type="submit" value="LOGIN">

                <!-- FORGOT -->
                <p id="shortText">
                    <a href="forgot.php">Forgot Password</a><br/><br/>
                <!-- REGISTER -->
                    <a href="register.php">Don't have an account? Register</a>
                </p>
              </form>
        </div>
            <!-- LOGIN PAGE  -->

<!-- Footer -->
<?php
    include_once("lib/footer.php");
?>
<!-- Footer -->