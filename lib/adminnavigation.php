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
                        if(!isset($_SESSION['loggedIn'])){

                    ?>
                    <a href="login.php">
                        <strong>Login</strong>
                    </a>
                    <a href="forgot.php">
                        <strong>Forgot Password</strong>
                    </a>
                    <?php } else{ ?>
                    <a href="logout.php">
                        <strong>Logout</strong>
                    </a>
                    <a href="reset.php">
                        <strong>Reset Password</strong>
                    </a>
                    <?php }?>

                </span>
                <div class="clr"></div>
            </div><!--/  top bar -->