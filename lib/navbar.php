<?php
    //session_start();
?>
 <!--  top bar -->
 <div class="codrops-top">
    <a href="index.php">
        WELCOME TO START-NG.
    </a>
    <span class="right">
        <a href="index.php">
            <strong>Home</strong>
        </a>
        <?php
     if(!isset($_SESSION['loggedIn']) && empty($_SESSION['loggedIn'])) { ?>
        <a href="login.php"><strong>Login</strong></a>
        <a href="register.php"> <strong>Register</strong></a>
        <a href="forgot.php"><strong>Forgot Password</strong></a>
<?php } else { ?>
       
            <!-- -->
		<strong><a href="dash_board.php">Dashboard</a></strong>
        <a href="reset.php"><strong>Reset Password</strong></a>
        <a href="logout.php"> <strong> Logout</strong> </a>
    <?php } ?>
    </span>
    <div class="clr"></div>
</div><!--/  top bar -->