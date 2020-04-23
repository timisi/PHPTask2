<!-- Header  -->
<?php
    //session_start();
    include_once("lib/header.php");

     //check if user user allready loggedIn using the $_SESSION['loggedIn']
     if (isset($_SESSION['loggedin']) && $_SESSION['designation'] != 'Super Admin' || empty($_SESSION['loggedin'])) {
        header("location: login.php");
        //die();
    }
?>
<!-- Header -->

<!-- Navbar -->
<?php
    include_once("lib/navbar.php");
?>
<!-- Navbar -->
<!-- HEADER -->
<header>
    <h1 style="text-align:left;">DASHBOARD</h1>
</header>

<!-- COPIED CODE HERE -->
<h3 id="welcome">
    Welcome: <b><?php echo $_SESSION['fullname']?></b>
</h3>
    <div class="userform">
        <p style="text-align:left; font-size:20px;">Your User ID is:
            <?php echo "<span style='color:#CA5414  ; font-size:25px;'><b>" . $_SESSION['loggedIn'] . "</b></span>";?>
        </p>
        <br/>
        <hr/>

        <p style="text-align:left; font-size:20px;">You're Logged in as:
            <?php echo "<span style='color:#CA5414  ; font-size:25px;'><b>" . $_SESSION['role'] . "</b></span>";?>
        </p>
        <br/>
        <hr/>

        <p style="text-align:left; font-size:20px;">Date Of Registration:
            <?php echo "<span style='color:#CA5414  ; font-size:25px;'><b>" . $_SESSION['date'] . "</b></span>";?>
        </p>
        <br/>
        <hr/>

        <p style="text-align:left; font-size:20px;">Date & Time of Last Login:
            <?php echo "<span style='color:#CA5414  ; font-size:25px;'><b>" . $_SESSION['logindate'] . "</b></span>";?>
        </p>
        <br/>
        <hr/>

        <p style="text-align:left; font-size:20px;">Your Track / Department:
            <?php echo "<span style='color:#CA5414  ; font-size:25px;'><b>" . $_SESSION['track'] . "</b></span>";?>
        </p>




    </div>
            <!-- LOGIN PAGE  -->


<!-- COPIED CODE ENDs HERE -->





            <!-- HEADER ENDs HERE -->

<!-- Footer -->
    <?php
    include_once("lib/footer.php");
    ?>
<!-- Footer -->











