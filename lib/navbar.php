<?php
    //session_start();
?>
 <!--  top bar -->
 <div class="codrops-top">
    <a href="index.php">
        WELCOME TO START-NG.
    </a>
    <span class="right">
        <a href="index.php">
            <strong>Home</strong>
        </a>
        <?php
     if(!isset($_SESSION['loggedIn']) && empty($_SESSION['loggedIn'])) { ?>
        <a href="login.php"><strong>Login</strong></a>
        <a href="register.php"> <strong>Register</strong></a>
        <a href="forgot.php"><strong>Forgot Password</strong></a>
<?php } //else { ?>
        <?php
            /* if(isset($_SESSION['loggedIn']) && $_SESSION["designation"] == "Staff") {
                echo  '<a href="dashboard_staff.php">';
             }
             elseif(isset($_SESSION['loggedIn']) && $_SESSION["designation"] == "Student") {
                echo  '<a href="dashboard_students.php">';
             }
             else{
                 echo  '<a href="dashboard.php">';
            }*/
		if(isset($_SESSION['loggedIn']) && $_SESSION["designation"] == "Super Admin") { ?>
             <strong><a href="register_admin.php">Register Admin</a></strong>
			 <strong><a href="dashboard.php">Dashboard</a></strong>
        <?php }
		if(isset($_SESSION['loggedIn']) && $_SESSION["designation"] == "Student") {
			echo '<a href="dashboard_students.php"><strong>Dashboard</strong></a>';
		}
		if(isset($_SESSION['loggedIn']) && $_SESSION["designation"] == "Staff") {
			echo '<a href="dashboard_staff.php"><strong>Dashboard</strong></a>';
		}
		if(isset($_SESSION['loggedIn'])) { ?>
            <a href="reset.php"><strong>Reset Password</strong></a>
            <a href="logout.php"> <strong> Logout</strong> </a>
    <?php } ?>
    </span>
    <div class="clr"></div>
</div><!--/  top bar -->