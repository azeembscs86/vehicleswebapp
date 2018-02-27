@include('include.head')
<div class="payment-banner">
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Payment Options</h1>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-md-12 payment text-center">
<h3>PAYMENT OPTIONS</h3>
<p>Immediately after successful booking confirmation a down payment of 10% is required, the balance is due only 45 days<br> before departure.</p>
<p>You have the option of making the payment by bank transfer to our account at Deutsche Bank. The account details are<br> transmitted by invoice. Or you can pay by credit card. We accept MasterCard, VISA and American Express. </p>
</div>
</div>
</div>
<div class="bg-black">
<div class="container">
<div class="row">
<div class="col-md-12 ">
<div class="payment-form">
<form>
<div class="text-center payment-button">
<a href="https://sudafrika-wohnmobile-und-camper.payrexx.com/" class="" target="_blank">Pay Now</a>
</div>
<div class="text-center">
<img src="{{ asset('assets/images/american-express.png') }}">
<img src="{{ asset('assets/images/visa.png') }}">
<img src="{{ asset('assets/images/master-card.png') }}">
</div>
</form>
</div>                    
</div>
</div>
</div>
</div>
@include('include.footer')