<!DOCTYPE html>
<!--


    MAJOR ISSUE:
       Payment information (who's paying, and for what type of registration) is captured by a GET method (so it can be alterable in the URL by anyone),
       but I took the risk (which i've determined to be a bit greater than the chance of winning the lottery) since in my limited time I had to create this 
       system, I was not able to find any other way. That's why there was safety (Timestamp on each user, I could check on PayPal for transactions) in the 
       worst case scenario of someone exploiting this gaping security concern. However, it is my fault, I should have implemented something more secure, and 
       I won't be implementing something this willy nilly again in the future. 

    NOTE:
       PayPal payment button hidden input for the actual value/payment has been removed.


  -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PacificMUN 2020 Registration Payment</title>

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form-style.css">
  </head>
  <body>
    <header>
      <img src="/logo.svg" alt="">
    </header>
    <div class="bar">
      Delegate Registration Payment
    </div>
    <div class="container">
      <!-- Early Reg Hotel -->
      <?php
        if (isset($_GET['RegType'])) {
          if ($_GET['RegType']=="Hotel") {
            echo '

            <form class="ppbtn" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">

              <div class="payment-info">
                <h5>Registration For:<br>Late Reg &mdash; Hotel Delegate</h5>
                <h4>$200 CAD</h4>
              </div>

              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="custom" value="' . $_GET['Id'] . '">
              <input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" value="Pay Via PayPal">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
              <img alt="" src="compatible.png" class="pmm" />
            </form>
                
              
            ';
            /*
              <form class="ppbtn" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">

                <div class="payment-info">
                  <h5>Registration For:<br>Late Reg Discounted &mdash; Hotel Delegate</h5>
                  <h4>$185 CAD</h4>
                </div>

                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="custom" value="' . $_GET['Id'] . '">
                <input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" value="Pay Via PayPal">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                <img alt="" src="compatible.png" class="pmm" />
              
              </form>



              <form class="ppbtn" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">

              <div class="payment-info">
                <h5>Registration For:<br>Regular Reg &mdash; Hotel Delegate</h5>
                <h4>$195 CAD</h4>
              </div>

                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="custom" value="' . $_GET['Id'] . '">
                <input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" value="Pay Via PayPal">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                <img alt="" src="compatible.png" class="pmm" />
              </form>


              <form class="ppbtn" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">

              <div class="payment-info">
                <h5>Registration For:<br>Regular Reg &mdash; Hotel Delegate</h5>
                <h4>$195 CAD</h4>
              </div>

                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="custom" value="' . $_GET['Id'] . '">
                <input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" value="Pay Via PayPal">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                <img alt="" src="compatible.png" class="pmm" />
              </form>
              
              */
          } else if($_GET['RegType']=="regregi") {
            echo '
            <form class="ppbtn" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">

              <div class="payment-info">
                <h5>Registration For:<br>Regular Reg &mdash; Hotel Delegate</h5>
                <h4>$195 CAD</h4>
              </div>

                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="custom" value="' . $_GET['Id'] . '">
                <input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" value="Pay Via PayPal">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                <img alt="" src="compatible.png" class="pmm" />
              </form>';

          } else if ($_GET['RegType']=="Day") {
            echo '<form class="ppbtn" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">

              <div class="payment-info">
                <h5>Registration For:<br>Day Delegate</h5>
                <h4>$85 CAD</h4>
              </div>

                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="custom" value="' . $_GET['Id'] . '">
                <input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" value="Pay Via PayPal">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                <img alt="" src="compatible.png" class="pmm" />
              </form>';
          } else if ($_GET['RegType']=="zZnd8s00fs2idlsfis9XX") {
            echo '<form class="ppbtn" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">

              <div class="payment-info">
                <h5>Registration For:<br>Early Registration &mdash; Hotel Delegate</h5>
                <h4>$175 CAD</h4>
              </div>

              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="custom" value="' . $_GET['Id'] . '">
              <input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" value="Pay Via PayPal">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
              <img alt="" src="compatible.png" class="pmm" />
            </form>';
          } else {
            echo '<font style="color:white;">Payment has expired. Please contact it@pacificmun.org if you still have yet to pay for your registration</font>';
          }
        }
      ?>
    </div>
  </body>
</html>
