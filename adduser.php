<!-- Header  -->
<?php
  include_once("lib/header.php");
  require_once('functions/alert.php');
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
    include_once("lib/adminnavigation.php");
    ?>
<!-- Navbar -->
            <!-- LOGIN PAGE --><br/><br/><br/>
            <h3 id="welcome">Welcome: Please Add New User</h3>

            <div class="userform">
              <form action="processregister.php" method="POST">
                    <div class="row col-6">
                        <p>All Fields are required * </p>
                    </div>
                    <p>
                        <?php print_alert(); ?>
                    </p>
                            <p>
                                <label>First Name</label>
                                <input
                                    <?php
                                        if(isset($_SESSION['first_name'])){
                                            echo "value=" . $_SESSION['first_name'];
                                        }
                                    ?>
                                    type="text" name="first_name" placeholder="First Name" />
                            </p>
                            <p>
                                <label>Last Name</label>
                                <input
                                    <?php
                                        if(isset($_SESSION['last_name'])){
                                            echo "value=" . $_SESSION['last_name'];
                                        }
                                    ?>
                                    type="text" name="last_name" placeholder="Last Name" />
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
                            <p>
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Password" />
                            </p>
                            <p>
                                <label>Gender</label>
                                <select name="gender">
                                    <option value="">-Select-</option>
                                    <option
                                        <?php
                                            if(isset($_SESSION['gender']) && $_SESSION['gender']=='Female'){
                                                echo "selected";
                                            }
                                        ?>
                                    >Female</option>
                                    <option
                                        <?php
                                            if(isset($_SESSION['gender']) && $_SESSION['gender']=='Male'){
                                                echo "selected";
                                            }
                                        ?>
                                    >Male</option>
                                </select>
                            </p>

                            <p>
                                <label>Designation</label>
                                    <select name="designation">
                                        <option value="">-Select-</option>
                                        <option
                                            <?php
                                                if(isset($_SESSION['designation']) && $_SESSION['designation']=='Student'){
                                                    echo "selected";
                                                }
                                            ?>
                                        >Student</option>
                                        <option
                                            <?php
                                                if(isset($_SESSION['designation']) && $_SESSION['designation']=='ClassRep'){
                                                    echo "selected";
                                                }
                                            ?>
                                        >ClassRep</option>
                                        <option
                                            <?php
                                                if(isset($_SESSION['designation']) && $_SESSION['designation']=='Mentor'){
                                                    echo "selected";
                                                }
                                            ?>
                                        >Mentor</option>
                                    </select>
                            </p>

                            <p>
                                <label>Courses</label>
                                <input
                                    <?php
                                        if(isset($_SESSION['courses'])){
                                            echo "value=" . $_SESSION['courses'];
                                        }
                                    ?>
                                    type="text" name="courses" placeholder="Track - Courses" />
                            </p>

                            <p>
                                <input type="submit" value="REGISTER">
                            </p>

                            <!-- <p id="shortText">
                                    <a href="login.php">Already have an account? Login</a>
                            </p> -->
                        </form>
                    </div>
                </div>
              </form>
            </div>
            <!-- LOGIN PAGE  -->

    <!-- Footer -->
    <?php
    include_once("lib/footer.php");
    ?>
<!-- Footer -->