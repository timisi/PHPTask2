<!-- Header  -->
<?php
include("lib/header.php");
require_once('functions/user.php');
require_once('functions/alert.php');
require_once('functions/redirect.php');
 if (!isset($_SESSION['loggedin']) && empty($_SESSION['loggedin'])) {
 	set_alert("error","You are not authorized to view that page");
    header("location: login.php");
}

?>
<?php
    include("lib/navbar.php");
?>
<br/><br/><br/>
            <h3 id="welcome">Reset Password</h3>
    <div class="userform">
        <form action="process/processreset.php" method="POST">

                    <?php  print_alert(); ?>

                <div class="row col-6">
                    <p>Reset Password Associated With:- <?php ['email'] ?></p>
                </div>
            <p>
                <?php if(!is_user_loggedIn()) { ?>
                    <input
                        <?php
                            if(is_token_set_in_session()){
                                echo "value='" . $_SESSION['token'] . "'";
                            }else{
                                echo "value='" . $_GET['token'] . "'";
                            }
                        ?>
                    type="hidden" name="token"  />
                <?php } ?>

                <label>Email</label>
                    <input <?php
                        if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
                            echo "value='" . $_SESSION['email'] ."'";
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
                <!-- <a href="register.php">Don't have an account? Register</a> -->
            </p>
        </form>
    </div>

<!-- Footer -->
    <?php
    include("lib/footer.php");
    ?>
<!-- Footer -->