<!-- Header  -->
<?php
    include("lib/header.php");
    //redirect to users dashboard with regard to designation
    if(isset($_SESSION['loggedin'])){
        //redirect to dashboard
        header("location: login.php");
    }
    require_once('functions/alert.php');
    require_once('functions/redirect.php');
?>
<?php
    include("lib/navbar.php");
?>
<br/><br/><br/>
<h3 id="welcome">Forgot Password</h3>
<div class="userform">
    <form action="process/processforgot.php" method="POST">
        <?php
            print_alert();
        ?>
        <div class="row col-6">
            <p>Provide the email address associated with your account</p>
        </div>
        <p>
            <label>Email</label>
            <input
            <?php
                if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
                    echo "value='" . $_SESSION['email'] ."'";
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

<?php
    include("lib/footer.php");
?>
<!-- Footer -->