<!-- Header  -->
<?php
    include_once("lib/header.php");
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
              <form action="" method="POST">
              <div class="row col-6">
                        <p>Provide the email address associated with your account</p>

                    </div>
                <p>
                    <label for="fname">Email</label>
                    <input type="text" id="fname" name="email" placeholder="Your Email...">
                </p>

                <input type="submit" value="LOGIN">

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