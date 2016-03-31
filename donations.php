<?php

  require_once('stripe-php/init.php');
  require_once('PHPMailer/PHPMailerAutoload.php');
  if(!empty($_POST)){
    Stripe\Stripe::setApiKey("sk_test_fp7u7ZJwIAU4NqsK7dxCiR70"); //<- stripe secret key. Find out about environment variables.

// Get the credit card details submitted by the form
    $token = $_POST['stripeToken'];
    // Create the charge on Stripe's servers - this will charge the user's card
    try {
      $charge = \Stripe\Charge::create(array(
        "amount" => 1000, // write the amount in cents, here
        "currency" => "usd",
        "source" => $token,
        "description" => "Example charge"
        ));
      $mail = new PHPMailer;

      //From email address and name
      $mail->From = "adnan.mate3n@gmail.com";
      $mail->FromName = "Adnan Mateen";

      //To address and name
      $mail->addAddress("danllinas@gmail.com", "Deacon Don");

      //Send HTML or Plain Text email
      $mail->isHTML(true);

      $mail->Subject = "Subject Text";
      $mail->Body = "<i>Mail body in HTML</i>";
      $mail->AltBody = "This is the plain text version of the email content";

      if(!$mail->send())
      {
          echo "Mailer Error: " . $mail->ErrorInfo;
      }
      else
      {
          echo "Message has been sent successfully";
      }
    } catch(Exception $e) {
      // The card has been declined
      echo "<script>alert(\"Card Has been Declined\")</script>";
    }


  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


  <link rel="stylesheet" type="text/css" href="stylesheets/dismas.css">
  <link href='https://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic' rel='stylesheet' type='text/css'>

  <title>Saint Dismas - How to Help</title>
</head>
<body>

  <div class="navbar-wrapper" id="nav-partial">
    <nav class="navbar navbar-default navbar-custom">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header text-center">
          <a class="navbar-brand" href="index.php"><img src="images/logo_small.png" class="img-responsive" alt="Saint Dismas Prison Ministry Logo"></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="creed.html">Creed &amp; Vision</a></li>
            <li><a href="mandate.html">Our Mandate</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Our Work <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="inmate-aid.html">Inmate Aid</a></li>
                <li><a href="greeting-cards.html">Greeting Card Program</a></li>
                <li><a href="art-program.html">Art Program</a></li>
                <li><a href="farm-program.html">Farm Program</a></li>
                <li><a href="apiary.html">Apiary Program (Bee Keeping)</a></li>
                <li><a href="sports-equipment.html">Sports Equipment</a></li>
                <li><a href="santa.html">Santa in Prison</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="cvli-license.html">The CVLI License</a></li>
                <li><a href="literacy-program.html">Literacy Program</a></li>
                <li><a href="gavel-club.html">Gavel Club (Toastmasters)</a></li>
                <li><a href="veteran-posts.html">Veteran Posts</a></li>
                <li><a href="merit-dorm.html">MERIT Dorm</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="photos.html">Photos</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">How To Help <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="donations.php">Donations</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Saint Dismas<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="dismas.html">Dismas the Patron Saint of Prison Inmates</a></li>
                <li><a href="prayer.html">Prayer to St.Dismas</a></li>
              </ul>
            </li>
            <li><a href="board.html">Board of Directors</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-3">
        <aside class="text-center">
          <p>
            “For God so loved the world,
            <br>that he gave his only Son,
            <br>that whoever believes in him
            <br> should not perish but have eternal life.
            <br>&mdash;John 3:16
          </p>
          <img src="images/jesus-painting.jpg" alt="Painting of Jesus wearing a crown of thorns and with blood dribbling down his cheeks." />
        </aside>
      </div>
      <div class="col-xs-12 col-sm-8 col-md-9 main-text">
        <h1 class="text-center ftg">How to Help</h1>
        <p class="bring-down">
          The only hope for an inmate to change his life is to "catch a glimpse" of the loving and forgiving Christ in those who minister to them. Your prayers and donations help us to do that better.
        </p>
        <p>
          If you have questions or would like to assist us in this Corporal work of mercy, we invite you to contact us or contribute by sending a <span class="cursive">tax deductible*</span> donation to:
          <div class="text-center ftg larger">
            Saint Dismas Prison Ministry Foundation<br>
            1701 Indian Creek Parkway<br>
            Jupiter, Florida 33458<br>
            561-662-0832
          </div>
        </p>
        <p class="cursive small text-center">
          *The Saint Dismas Prison Ministry Foundation is an IRS approved 501C(3) tax exempt charity.
        </p><br>
        <p class="text-center">
          <button class="btn btn-lg" id="trigger" style="color:white;background-color:#5a0c12;font-family:'Fredericka the Great',cursive;">Donate Online</button>
        </p><br>
        <div class="container-fluid text-left">
          <div class="row">
            <div class="col-xs-8 col-xs-offset-2 text-center" id="donate">
              <form action="donations.php" method="post" class="form-horizontal" id="donation-form">
                <span class="payment-errors"></span>
                <div class="form-group">
                  <label for="amount" class="col-xs-3">Donation Amount</label>
                  <div class="col-xs-9">
                    <select class="form-control">
                      <option value="500">$5</option>
                      <option value="1000">$10</option>
                      <option value="2000">$20</option>
                      <option value="3500">$35</option>
                      <option value="5000">$50</option>
                      <option value="10000">$100</option>
                      <option value="25000">$250</option>
                      <option value="50000">$500</option>
                      <option value="100000">$1000</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstName" class="col-xs-3">First Name</label>
                  <div class="col-xs-9">
                    <input type="text" name="firstName" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="lastName" class="col-xs-3">Last Name</label>
                  <div class="col-xs-9">
                    <input type="text" name="lastName" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-xs-3">Email</label>
                  <div class="col-xs-9">
                    <input type="text" name="email" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="col-xs-3">Address</label>
                  <div class="col-xs-9">
                    <input type="text" name="Address" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address2" class="col-xs-3">Apt. or Suite</label>
                  <div class="col-xs-9">
                    <input type="text" name="address2" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="city" class="col-xs-3">City</label>
                  <div class="col-xs-9">
                    <input type="text" name="city" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="state" class="col-xs-3">State</label>
                  <div class="col-xs-9">
                    <input type="text" name="state" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="zip" class="col-xs-3">Zip</label>
                  <div class="col-xs-9">
                    <input type="text" name="zip" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="zip" class="col-xs-3">Card Number</label>
                  <div class="col-xs-9">
                    <input type="text" size="20" data-stripe="number" class="form-control"/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="zip" class="col-xs-3">CVC</label>
                  <div class="col-xs-9">
                    <input type="text" size="4" data-stripe="cvc" class="form-control"/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="zip" class="col-xs-3">Expiration (MM/YYYY)</label>
                  <div class="col-xs-9">
                    <input type="text" size="2" data-stripe="exp-month" class="form-control inline-inputs"/>
                    <span> / </span>
                    <input type="text" size="4" data-stripe="exp-year" class="form-control inline-inputs"/>
                  </div>
                </div>
                <div class="col-xs-9 col-xs-offset-3 text-center">
                  <input type="submit" class="btn btn-lg" style="color:white;background-color:#5a0c12;font-family:'Fredericka the Great',cursive;">
                </div>
              </form>
            </div>
          </div>
        </div>
        <img src="images/three-crosses.jpg" class="main-column-img center-block responsive" alt="Image of one man helping another top a mountain.">
      </div>
    </div>
  </div>
  <footer>
    <div class="container">
      <div class="row">
        <div class="hidden-xs col-sm-4 col-md-4">
          <p>
            Saint Dismas Prison Ministry Foundation
            <br> 1701 Indian Creek Parkway
            <br> Jupiter, Florida 33458
            <br> 561-662-0832
            <br>
          </p>
        </div>
        <div class="col-xs-12 visible-xs text-center">
          <p>
            Saint Dismas Prison Ministry Foundation
            <br> 1701 Indian Creek Parkway
            <br> Jupiter, Florida 33458
            <br> 561-662-0832
            <br>
          </p>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 text-center">
          <a href="index.php"><img src="images/logo_small.png" class="logo img-responsive" alt="Saint Dismas Prison Ministry Logo" /></a>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 text-center">
          <p>
            Copyright &copy; 2015
            <br>
            <br>
            <span class="tag">Website by: D&amp;D Web Development</span>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script src="javascripts/dismas.js"></script>



</body>

</html>
