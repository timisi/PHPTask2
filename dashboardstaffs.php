<!-- Header  -->
<?php
    //session_start();
    include_once("lib/header.php");

     //check if user user allready loggedIn using the $_SESSION['loggedIn']
     if (isset($_SESSION['loggedin']) && $_SESSION['designation'] != 'Student' || empty($_SESSION['loggedin'])) {
        header("location: login.php");
    }
        //die();
    }
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
    <p>You're logged in as a <strong><?php echo $_SESSION['designation'];?></strong></p>

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
    include_once("lib/footer.php");
    ?>
<!-- Footer -->











