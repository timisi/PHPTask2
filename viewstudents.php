<!-- Header  -->
<?php
  include_once("lib/header.php");
  require_once('functions/alert.php');
  include("processviews/studentsview.php");
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
            <h3 id="welcome">STUDENT LIST</h3>

            <div class="userform">
            <?php if($designationFromDB == 'Student') { ?>
                    <h1>Students</h1>
                    <table class="table table-inverse table-responsive students text-left">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Registration Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach ($studentList as $studentItem) { ?>
                            <?php if($studentItem->designation == 'Student') { ?>
                            <tr>
                                <td><?php echo $studentItem->full_name ;?></td>
                                <td><?php echo $studentItem->gender ;?></td>
                                <td><?php echo $studentItem->email ;?></td>
                                <td><?php echo $studentItem->department ;?></td>
                                <td><?php echo $studentItem->registration_date ;?></td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php }  else {
                    echo "<h3>NO STUDENT ON THIS LIST</h3>";
                } ?>
            </div>
            <!-- LOGIN PAGE  -->

    <!-- Footer -->
    <?php
    include_once("lib/footer.php");
    ?>
<!-- Footer -->