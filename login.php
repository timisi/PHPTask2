<!-- Header  -->
<?php
    include('lib/header.php');
include("lib/navbar.php");
    //redirect to users dashboard with regard to designation
/*    if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin']) && $_SESSION['designation'] == 'Student'){
        header("location: dashboard_students.php");
    } elseif(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin']) && $_SESSION['designation'] == 'Staff') {
        header("location: dashboard_staff.php");
    } elseif(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin']) && $_SESSION['designation'] == 'Super Admin') {
        header("location: dashboard.php");

    }*/

    
    require_once('functions/alert.php');
    require_once('functions/redirect.php');
?>
<?php
    //include_once("lib/navbar.php");
?>
<br/><br/><br/>
<h3 id="welcome">Welcome: Please Login</h3>
    <div class="userform">
        <?php print_alert();
		if(isset($_SESSION["emailErr"])){
			echo $_SESSION["emailErr"];
		}
		session_destroy();
		?>
        <form action="process/processlogin.php" method="POST">
            <p>
                <label>Email</label>
                <input
                <?php
                    if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
                        echo "value='" . $_SESSION['email'] ."'";
                    }
                ?>
                type="text" id="fname" name="email" placeholder="Your Email...">
            </p>
            <p>
                <label for="lname">Password</label>
                <input type="password" id="lname" name="password" placeholder="Your Password..">
            </p>
                <input type="submit" value="LOGIN">
            <p id="shortText">
                <a href="forgot.php">Forgot Password</a><br/><br/>
                <a href="register.php">Don't have an account? Register</a>
            </p>
        </form>
    </div>
<!-- Footer -->
<?php
    include("lib/footer.php");
?>
<!-- Footer -->