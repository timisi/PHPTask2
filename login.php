<!-- Header  -->
<?php
include_once("lib/header.php");
    //session_start();

    //check if user user allready loggedIn using the $_SESSION['loggedIn']
    if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
        // redirect to dashboard
        header("Location: dashboard.php");
        die();
    }
?>
<!-- Header -->

<!-- Navbar -->
    <?php
    include_once("lib/navbar.php");
    ?>
<!-- Navbar -->
            <!-- LOGIN PAGE --><br/><br/><br/>
            <h3 id="welcome">Welcome: Please Login</h3>

            <div class="userform">
            <p>
                <?php
                    if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
                        echo "<span style='color:green; font-size:15px;'>" . $_SESSION['message'] . "</span>";
                    }
                    session_destroy();
                ?>
            </p>
            <!-- FORM -->
              <form action="processlogin.php" method="POST">
                  <p>
                      <?php
                        if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                            }
                            //session_destroy();
                    ?>
                  </p>
                <p>
                    <label for="fname">Email</label>
                    <input type="text" id="fname" name="email" placeholder="Your Email...">
                </p>

                <p>
                    <label for="lname">Password</label>
                    <input type="password" id="lname" name="password" placeholder="Your Password..">
                </p>
                <input type="submit" value="LOGIN">

                <!-- FORGOT -->
                <p id="shortText">
                    <a href="forgot.php">Forgot Password</a><br/><br/>
                <!-- REGISTER -->
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