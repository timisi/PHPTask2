 <!-- Payment validation starts here -->
 <?php

    if(isset($_POST['pay'])){

    $name = $_POST['name'];
    $cvvnumber = $_POST['cvv'];
    $cardnumber = $_POST['cardnumber'];
    $expiremonth = $_POST['expiremonth'];
    $expireyear = $_POST['expireyear'];
    $email = $_POST['email'];
    $payment = $_POST['amount'];



$curl = curl_init();

$customer_email = $email;
$amount = $payment;
$currency = "NGN";
$txref = "rave-2993383867223963"; // ensure you generate unique references per transaction.
$PBFPubKey = "FLWPUBK_TEST-6dfbf1f5d5487aea5ae6c17d40acf14e-X"; // get your public key from the dashboard.
$redirect_url = "https://userauthentication-v3/process/sucess.php";


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'customer_email'=>$customer_email,
    'currency'=>$currency,
    'txref'=>$txref,
    'PBFPubKey'=>$PBFPubKey,
    'redirect_url'=>$redirect_url,

  ]),
  CURLOPT_HTTPHEADER => [
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the rave API
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}


// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $transaction->data->link);

    }
?>