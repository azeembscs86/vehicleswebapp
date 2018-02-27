<?php
/**
 * Stripe - Payment Gateway integration example (Stripe Checkout)
 * ==============================================================================
 * 
 * @version v1.0: stripe_pay_checkout_demo.php 2016/10/05
 * @copyright Copyright (c) 2016, http://www.ilovephp.net
 * @author Sagar Deshmukh <sagarsdeshmukh91@gmail.com>
 * You are free to use, distribute, and modify this software
 * ==============================================================================
 *
 */
global $con;
$localhost = 'localhost';
$user = 'root';
$pass = '';
$db = 'fleekbizportal';
$con = mysqli_connect($localhost,$user,$pass,$db);

// Stripe library
require 'Stripe.php';
try {
  //Stripe::setApiKey("sk_test_UrSDB5YF2RFwLe0CmAXN5DvY"); //Replace with your Secret Key
  Stripe::setApiKey("sk_test_lYBYHqPt0KOKZJQhnr4KKXnf");
  $charge = Stripe_Charge::create(array(
  "amount" => $_POST['pckg_amount'],
  "currency" => "usd",
  "card" => $_POST['stripeToken'],
  "description" => $_POST['pckg_decp']
));

  //header('Location: http://matchpropertydirect.com/');
	//send the file, this line will be reached if no error was thrown above
	//echo "<h1>Your payment has been completed.</h1>";
 
 
//you can send the file to this email:
//echo $_POST['stripeEmail'].' properti Id'.$_POST['pid'];
$update = mysqli_query($con,"UPDATE `orders_payments` SET `is_paid` = '1' WHERE `id`='" . $_POST['order_id'] . "'");

if($update){
    if($_POST['login_user'])
    {
      header('Location: http://localhost/fleekbizportal/contributor/orders/thanks');
    } 
    else
    {
      header('Location: http://localhost/fleekbizportal/thanks');
    } 
}
}
//catch the errors in any way you like
 
catch(Stripe_CardError $e) {
	
}
 
 
catch (Stripe_InvalidRequestError $e) {
// Invalid parameters were supplied to Stripe's API
 
} catch (Stripe_AuthenticationError $e) {
// Authentication with Stripe's API failed
// (maybe you changed API keys recently)
 
} catch (Stripe_ApiConnectionError $e) {
// Network communication with Stripe failed
} catch (Stripe_Error $e) {
 
// Display a very generic error to the user, and maybe send
// yourself an email
} catch (Exception $e) {
 
// Something else happened, completely unrelated to Stripe
}