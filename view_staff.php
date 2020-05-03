<!-- Header  -->
<?php
  include("lib/header.php");

    if(isset($_SESSION['loggedIn']) && $_SESSION['designation'] != 'Super Admin' || empty($_SESSION['loggedIn'])){
        header("location: login.php");
    }
    include("lib/navbar.php");
    include("process_views/staffView.php");
?>
<?php

?>
<br/><br/><br/>
            <h3 id="welcome">STAFF LIST</h3>

            <div class="userform">
                <?php if($designationFromDB != 'Staff') { ?>
                    <h1>Staff</h1>
                    <table>
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
                    echo "<h3>No staff has registered</h3>";
                } ?>
            </div>
            <!-- LOGIN PAGE  -->

    <!-- Footer -->
    <?php
    include("lib/footer.php");
    ?>
<!-- Footer -->