<!-- Header  -->
<?php
    //session_start();
    include_once("lib/header.php");

     //check if user user allready loggedIn using the $_SESSION['loggedIn']
     if(!isset($_SESSION['loggedIn'])){
        // redirect to dashboard
        header("Location: login.php");
        die();
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
                <h1>DASHBOARD</h1>
                <h3>LoggedIn User ID:</h3>
                <?php
                     echo $_SESSION['loggedIn'];
                ?>
            </header>
            <!-- HEADER ENDs HERE -->

<!-- Footer -->
    <?php
    include_once("lib/footer.php");
    ?>
<!-- Footer -->











