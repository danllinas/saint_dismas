<?php
  require_once('constants.php');
   if(!empty($_POST)){
    require_once('stripe-php/init.php');
    require_once('PHPMailer/PHPMailerAutoload.php');
    

    Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY); //<- stripe secret key. Find out about environment variables.

// Get the credit card details submitted by the form
    $token = $_POST['stripeToken'];
    $name = $_POST["firstName"] . " " . $_POST["lastName"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $address2 = $_POST["address2"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $amount = $_POST["amount"];

    // Create the charge on Stripe's servers - this will charge the user's card
    try {
      $charge = \Stripe\Charge::create(array(
        "amount" => intval($amount), // write the amount in cents, here
        "currency" => "usd",
        "source" => $token,
        "description" => "Donation from saintdismas website"
        ));
      
    } catch(Exception $e) {
      // The card has been declined
      echo "<script>alert(\"Card Has been Declined\");</script>";

    }
    if(isset($charge)){
        $mail = new PHPMailer;
        // $mail->isSMTP();                                      // Set mailer to use SMTP
        // $mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
        // $mail->SMTPAuth = true;                               // Enable SMTP authentication
        // $mail->Username = SMTP_USER;                 // SMTP username
        // $mail->Password = SMTP_PASSWORD;                           // SMTP password
        // $mail->SMTPSecure = SMTP_SECURE;                            // Enable TLS encryption, `ssl` also accepted
        // $mail->Port = SMTP_PORT;         
        //From email address and name
        $mail->From = "system@saintdismas.com";
        $mail->FromName = $name;

        //To address and name
        $mail->addAddress(SMTP_USER, "Deacon Don");

        //Send HTML or Plain Text email
        $mail->isHTML(true);
        require_once('_email.php');
        $mail->Subject = "Donor Information";
        $mail->Body = $body;
        $mail->send();
    }
    echo "<script>window.location = 'donations.php';</script>";
    // require('_alt_email.php');
    // $mail->AltBody = $altBody;

    

  }
 ?>