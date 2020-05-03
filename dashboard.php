<!-- Header  -->
<?php
    include("lib/header.php");

 //redirect to login page if user designation is not "Super Admin" or user hasn't logged in
 if (!isset($_SESSION['loggedin']) && empty($_SESSION['loggedin'])) {
    header("location: login.php");
}
    require_once('functions/alert.php');
    require_once('functions/redirect.php');
?>
<?php
    require_once("lib/navbar.php");
?>

<header>
    <h1 style="text-align:left;">DASHBOARD</h1>
</header>

<!-- COPIED CODE HERE -->
<h3 id="welcome">
    Welcome: <b><?php echo $_SESSION['first_name']." ".$_SESSION['last_name']?></b>
</h3>
    <div class="userform">
            <p>
                <?php  print_alert(); ?>
            </p>

        <p style="text-align:left; font-size:20px;">You're Logged in as:
            <?php echo "<span style='color:#CA5414  ; font-size:25px;'><b>" . $_SESSION['designation'] . "</b></span>";?>
        </p>
            <a href="view_staff.php" style="margin-right: 1em;"><button>View All Staff</button></a>
            <a href="view_students.php" style="margin-right: 1em;"><button>View All Students</button></a>
            <a href="all_appointments.php"><button>View All Appointments</button></a>
        <br/>
        <hr/>

        <p style="text-align:left; font-size:20px;">Date Of Registration:
            <?php echo "<span style='color:#CA5414  ; font-size:25px;'><b>" . $_SESSION['registration_date'] . "</b></span>";?>
        </p>
        <br/>
        <hr/>

        <p style="text-align:left; font-size:20px;">Date & Time of Last Login:
            <?php echo "<span style='color:#CA5414  ; font-size:25px;'><b>" . $_SESSION['last_login'] . "</b></span>";?>
        </p>
        <br/>
        <hr/>
    </div>
<!-- Footer -->
    <?php
    include("lib/footer.php");
    ?>
<!-- Footer -->











