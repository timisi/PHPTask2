<!-- Header  -->
<?php
  include_once("lib/header.php");
  require_once('functions/alert.php');
    //session_start();

    //check if user user allready loggedIn using the $_SESSION['loggedIn']
    if(isset($_SESSION['loggedIn']) && $_SESSION['designation'] != 'Super Admin' || empty($_SESSION['loggedIn'])){
        // redirect to dashboard
        header("Location: login.php");
        //die();
    }

?>
<!-- Header -->

<!-- Navbar -->
    <?php
    include_once("lib/navbar.php");
    ?>
<!-- Navbar -->
            <!-- LOGIN PAGE --><br/><br/><br/>
            <h3 id="welcome">Welcome: Please Register</h3>

            <div class="userform">
              <form action="process/processregisteradmin.php" method="POST">
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
                                                if(isset($_SESSION['designation']) && $_SESSION['designation']=='Mentor'){
                                                    echo "selected";
                                                }
                                            ?>
                                        >Mentor</option>
                                    </select>
                            </p>

                            <p>
                                <label>Department</label>
                                <select name="courses" class="form-control">
                        <option value="">Select One</option>
                        <option
                        <?php
                            if (isset($_SESSION['courses']) && !empty($_SESSION['courses']) && $_SESSION['courses'] == 'Php') {
                                echo 'selected';
                            }
                        ?>
                        >Php</option>
                        <option
                        <?php
                            if (isset($_SESSION['courses']) && !empty($_SESSION['courses']) && $_SESSION['coueses'] == 'Design') {
                                echo 'selected';
                            }
                        ?>
                        >Design</option>
                        <option
                        <?php
                            if (isset($_SESSION['courses']) && !empty($_SESSION['courses']) && $_SESSION['courses'] == 'HTML/CSS/JS') {
                                echo 'selected';
                            }
                        ?>
                        >HTML/CSS/JS</option>
                        <option
                        <?php
                            if (isset($_SESSION['courses']) && !empty($_SESSION['courses']) && $_SESSION['department'] == 'C#') {
                                echo 'selected';
                            }
                        ?>
                        >C#</option>
                        <option
                        <?php
                            if (isset($_SESSION['courses']) && !empty($_SESSION['courses']) && $_SESSION['courses'] == 'Non Teaching Staff') {
                                echo 'selected';
                            }
                        ?>
                        >Non Teaching Staff</option>
                    </select>
                            </p>

                            <p>
                                <input type="submit" value="REGISTER">
                            </p>
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