<!-- Header  -->
<?php
    //session_start();
    include_once("lib/header.php");

     //check if user user allready loggedIn
    if(!isset($_SESSION['loggedIn'])){
        //redirect to dashboard
        header("Location: login.php");
        die();
    }
?>
<!-- Header -->

<!-- Navbar -->
<?php
    include_once("lib/adminnavigation.php");
?>
<!-- Navbar -->
<!-- HEADER -->
<header>
    <h1 style="text-align:left;">DASHBOARD</h1>
</header>

<!-- COPIED CODE HERE -->
<h3 id="welcome">
    Hi, <b><?php echo $_SESSION['fullname']?> . Welcome to Start-NG Academy</b>
</h3>
    <div class="userform">
        <nav class="codrops-demos">
					<a href="" class="current-demo">Delete User</a>
					<a href="adduser.php">Add User</a>
				</nav>
    </div>


<!-- Footer -->
    <?php
    include_once("lib/footer.php");
    ?>
<!-- Footer -->











