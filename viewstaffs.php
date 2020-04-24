<!-- Header  -->
<?php
  include_once("lib/header.php");
  include("processviews/staffview.php");
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
            <h3 id="welcome">STAFF LIST</h3>

            <div class="userform">
            <?php if($designationFromDB != 'Staff') { ?>
                    <h1>Staff</h1>
                    <table class="table table-inverse table-responsive staff text-left">
                        <thead>
                            <tr>
                                <th>Staff Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Registration Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach ($staffList as $staffItem) { ?>
                            <?php if($staffItem->designation == 'Staff') { ?>
                            <tr>
                                <td><?php echo $staffItem->full_name ;?></td>
                                <td><?php echo $staffItem->gender ;?></td>
                                <td><?php echo $staffItem->email ;?></td>
                                <td><?php echo $staffItem->department ;?></td>
                                <td><?php echo $staffItem->registration_date ;?></td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php }  else {
                    echo "<h3>NO STAFF ON THIS LIST</h3>";
                } ?>
            </div>
            <!-- LOGIN PAGE  -->

    <!-- Footer -->
    <?php
    include_once("lib/footer.php");
    ?>
<!-- Footer -->