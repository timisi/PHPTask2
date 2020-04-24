<<<<<<< Updated upstream
<!-- Header  -->
<?php
    include_once("lib/header.php");
    require_once('functions/alert.php');

?>
<!-- Header -->

<!-- Navbar -->
    <?php
    include_once("lib/navbar.php");
    ?>
<!-- Navbar -->
            <!-- LOGIN PAGE --><br/><br/><br/>
<h3 id="welcome">Forgot Password</h3>

<div class="userform">
    <form action="processforgot.php" method="POST">
        <div class="row col-6">
            <p>Provide the email address associated with your account</p>
        </div>
        <p>
            <?php print_alert(); ?>
        </p>
        <p>
            <label>Email</label>
                <input
                <?php
                    if(isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email'];
                    }
                ?>
                type="text" name="email" placeholder="Email" />
        </p>
            <input type="submit" value="SEND RESET CODE">

        <p id="shortText">
            <a href="register.php">Don't have an account? Register</a>
        </p>
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


    //redirect to users dashboard with regard to designation
    if(isset($_SESSION['loggedin'])){
        //redirect to dashboard
        header("location: login.php");
    }
?>
<!-- Header -->

<!-- Navbar -->
    <?php
    include_once("lib/navbar.php");
    ?>
<!-- Navbar -->
            <!-- LOGIN PAGE --><br/><br/><br/>
<h3 id="welcome">Forgot Password</h3>

<div class="userform">
    <form action="processforgot.php" method="POST">
        <div class="row col-6">
            <p>Provide the email address associated with your account</p>
        </div>
        <p>
            <?php print_alert(); ?>
        </p>
        <p>
            <label>Email</label>
                <input
                <?php
                    if(isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email'];
                    }
                ?>
                type="text" name="email" placeholder="Email" />
        </p>
            <input type="submit" value="SEND RESET CODE">

        <p id="shortText">
            <a href="register.php">Don't have an account? Register</a>
        </p>
    </form>
</div>
            <!-- LOGIN PAGE  -->

<!-- Footer -->
    <?php
    include_once("lib/footer.php");
    ?>
>>>>>>> Stashed changes
<!-- Footer -->