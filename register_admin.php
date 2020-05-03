<!-- Header  -->
<?php
    include_once("lib/header.php");

    if(isset($_SESSION['loggedin']) && $_SESSION['designation'] != 'Super Admin' || empty($_SESSION['loggedin'])) {
        header("location: login.php");
    }
    require_once('functions/alert.php');
    require_once('functions/redirect.php');
?>

<?php
    include_once("lib/navbar.php");
?>
<!-- Navbar -->
            <!-- LOGIN PAGE --><br/><br/><br/>
            <h3 id="welcome">Welcome: Please Register</h3>

            <div class="userform">
                <form action="process/processregister_admin.php" method="POST">
                    <p>
                        <?php
                            print_alert();
                            //unset_session();
                        ?>
                    </p>
                    <div class="row col-6">
                        <p>All Fields are required * </p>
                    </div>
                            <p>
                                <label>First Name</label>
                                <input
                                <?php
                                    if (isset($_SESSION['first_name']) && !empty($_SESSION['first_name'])) {
                                        echo "value='" . $_SESSION['first_name'] ."'";
                                        }
                                    ?>
                                type="text" name="first_name" placeholder="First Name" />
                            </p>
                            <p>
                                <label>Last Name</label>
                                <input <?php
                                    if (isset($_SESSION['last_name']) && !empty($_SESSION['last_name'])) {
                                        echo "value='" . $_SESSION['last_name'] ."'";
                                        }
                                    ?>
                                type="text" name="last_name" placeholder="Last Name" />
                            </p>
                            <p>
                                <label>Email</label>
                                <input <?php
                                    if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
                                        echo "value='" . $_SESSION['email'] ."'";
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
                                        if (isset($_SESSION['gender']) && !empty($_SESSION['gender']) && $_SESSION['gender'] == 'Female') {
                                            echo 'selected';
                                        }
                                    ?>
                                    >Female</option>
                                    <option
                                    <?php
                                        if (isset($_SESSION['gender']) && !empty($_SESSION['gender']) && $_SESSION['gender'] == 'Male') {
                                            echo 'selected';
                                        }
                                    ?>
                                    >Male</option>
                                </select>
                            </p>
                            <p>
                                <label>Designation</label>
                                    <select name="designation">
                                    <option
                                    <?php
                                        if (isset($_SESSION['designation']) && !empty($_SESSION['designation']) && $_SESSION['designation'] == 'Staff') {
                                            echo 'selected';
                                        }
                                    ?>
                                    >Staff</option>
                                    <option
                                    <?php
                                        if (isset($_SESSION['designation']) && !empty($_SESSION['designation']) && $_SESSION['designation'] == 'Student') {
                                            echo 'selected';
                                        }
                                    ?>
                                    >Student</option>
                                    </select>
                            </p>

                            <p>
                                <label>Department</label>
                                    <select name="courses" class="form-control">
                                    <option
                                    <?php
                                        if (isset($_SESSION['department']) && !empty($_SESSION['department']) && $_SESSION['department'] == 'FrontEnd') {
                                            echo 'selected';
                                        }
                                    ?>
                                    >FrontEnd</option>
                                    <option
                                    <?php
                                        if (isset($_SESSION['department']) && !empty($_SESSION['department']) && $_SESSION['department'] == 'BackEnd') {
                                            echo 'selected';
                                        }
                                    ?>
                                    >BackEnd</option>
                                    <option
                                    <?php
                                        if (isset($_SESSION['department']) && !empty($_SESSION['department']) && $_SESSION['department'] == 'Design - UI/UX') {
                                            echo 'selected';
                                        }
                                    ?>
                                    >Design - UI/UX</option>
                                    <option
                                    <?php
                                        if (isset($_SESSION['department']) && !empty($_SESSION['department']) && $_SESSION['department'] == 'General Course') {
                                            echo 'selected';
                                        }
                                    ?>
                                    >General Course</option>
                                    <option
                                    <?php
                                        if (isset($_SESSION['department']) && !empty($_SESSION['department']) && $_SESSION['department'] == 'Non Teaching Staff') {
                                            echo 'selected';
                                        }
                                    ?>
                                    >Non Teaching Staff</option>
                                    </select>
                            </p>
                            <p>
                                <input type="submit" value="CREATE ACCOUNT">
                            </p>
                    </form>
                </div>

            <!-- LOGIN PAGE  -->

    <!-- Footer -->
    <?php
    include("lib/footer.php");
    ?>
<!-- Footer -->