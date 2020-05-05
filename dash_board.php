<!-- Header  -->
<?php
//session_start();
include("lib/header.php");

if (!isset($_SESSION['loggedin']) && empty($_SESSION['loggedin']) ) {
    header("location: login.php");
}
require_once('functions/alert.php');
require_once('functions/redirect.php');
?>

<?php
    include("lib/navbar.php");
?>

<header>
    <h1 style="text-align:left;">DASHBOARD</h1>
</header>

<!-- COPIED CODE HERE -->
<h3 id="welcome">
    Welcome: <b><?php echo $_SESSION['first_name']." ".$_SESSION["last_name"]?></b>
</h3>
    <div class="userform">
            <p>
                <?php  print_alert(); ?>
            </p>
    <p>You're logged in as a <strong><?php echo $_SESSION['designation'];?></strong></p>
	<?php if($_SESSION['designation'] == "Student"){ ?>
        <a href="paybill.php" style="margin-right: 1em;"><button>Pay Bill</button></a>
        <a href="book_appointment.php"><button>Book Appointment</button></a>
	<?php } if($_SESSION['designation'] == "Staff"){ ?>
		<a href="view_appointment.php"><button>View Appointments</button></a>
	<?php } if($_SESSION['designation'] == "Super Admin"){ ?>
		<a href="view_staff.php" style="margin-right: 1em;"><button>View All Staff</button></a>
        <a href="view_students.php" style="margin-right: 1em;"><button>View All Students</button></a>
        <a href="all_appointments.php"><button>View All Appointments</button></a>
        <a href="register_admin.php"><button>Register Admin</button></a>
	<?php } ?>
        <h5>Department</h5>
        <p><?php echo $_SESSION['department'];?></p>

        <h5>Registered</h5>
        <p><?php echo $_SESSION['registration_date'];?></p>

        <h5>Last Login</h5>
        <p><?php echo $_SESSION['last_login'];?></p>

    </div>
            <!-- LOGIN PAGE  -->


<!-- Footer -->
    <?php
    include("lib/footer.php");
    ?>
<!-- Footer -->











