<!-- Header  -->
<?php

include_once("lib/header.php");
require_once('functions/alert.php');
require_once('functions/user.php');

if(!is_user_loggedIn() && !is_token_set()){
    $_SESSION['error'] = "You Are Not Authorized To View That Page";
    header("Location:login.php");
}

?>
<!-- Header -->

<!-- Navbar -->
    <?php
    include_once("lib/navbar.php");
    ?>
<!-- Navbar -->
            <!-- LOGIN PAGE --><br/><br/><br/>
            <h3 id="welcome">Reset Password</h3>

            <div class="userform">
              <form action="processreset.php" method="POST">
              <div class="row col-6">
                <p>Reset Password Associated With:- <?php ['email'] ?></p>
            </div>
            <p>
                <?php print_alert(); ?>
            </p>
            <p>
                <?php if(!is_user_loggedIn()) { ?>
                    <input
                        <?php
                            if(is_token_set_in_session()){
                                echo "value='".$_SESSION['token']."'";
                            }
                            else{
                                echo "value='".$_GET['token']."'";
                            }
                        ?>
                    type="hidden" name="token"/>
                <?php }?>
            </p>
            <p>
                <label>Email</label>
                    <input
                        <?php
                            if(isset($_SESSION['email'])){
                              echo "value=".$_SESSION['email'];
                            }
                        ?>
                    type="text" name="email" placeholder="Email" />
            </p>
            <p>
                <label>Enter New Password</label>
                    <input type="password" name="password" placeholder="Password" />
            </p>
                <input type="submit" value="RESET PASSWORD">

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
<!-- Footer -->