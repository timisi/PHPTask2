<?php
    include_once("lib/header.php");

    /* if(isset($_SESSION['loggedin'])){
        //redirect to dashboard
        header("location: login.php");
    }
     *///session_destroy();
    require_once('functions/alert.php');
    require_once('functions/redirect.php');
?>

<?php
    include_once("lib/navbar.php");
?>
<!-- Navbar -->
            <!-- LOGIN PAGE --><br/><br/><br/>
            <h3 id="welcome">Welcome: You can pay your bill here</h3>

            <div class="userform">
            <form action="process/processbill.php" method="POST">
                    <p>
                        <?php
                            print_alert();
                            //unset_session();
                        ?>
                    </p>
                    <div class="creditCardForm">
        <div class="heading">
          <h1>Pay N1,000</h1>
        </div>
        <div class="payment">
            <div class="form-group owner">
              <label for="owner">Owner's Name</label>
              <input type="text" name="name" class="form-control" id="owner" />
            </div>
            <div class="form-group owner">
              <label for="email">Email Address</label>
              <input type="text" name="email" class="form-control" id="email" />
            </div>
            <div class="form-group owner">
              <label for="amount">Amount</label>
              <input type="text" name="amount" class="form-control" id="amount" />
            </div>
            <div class="form-group CVV">
              <label for="cvv">CVV</label>
              <input type="text" name="cvv" class="form-control" id="cvv" />
            </div>
            <div class="form-group" id="card-number-field">
              <label for="cardNumber">Card Number</label>
              <input type="text" name="cardnumber" class="form-control" id="scardNumber" />
            </div>

            <div class="form-group" id="expiration-date">
              <label>Expiration Date</label>
              <select name="expiremonth">
                <option value="01">January</option>
                <option value="02">February </option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
              <select name="expireyear">
                <option value="16"> 2016</option>
                <option value="17"> 2017</option>
                <option value="18"> 2018</option>
                <option value="19"> 2019</option>
                <option value="20"> 2020</option>
                <option value="21"> 2021</option>
              </select>
            </div>
            <div class="form-group" id="credit_cards">
              <img src="assets/images/visa.jpg" id="visa" />
              <img src="assets/images/mastercard.jpg" id="mastercard" />
              <img src="assets/images/amex.jpg" id="amex" />
            </div>
            <div class="form-group" id="pay-now">
              <button type="submit" name="pay" class="btn btn-default" id="confirm-purchase">
                PAY NOW
              </button>
            </div>

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