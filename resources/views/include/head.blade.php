<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Camper</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" /><link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script><link href="{{ asset('assets/css/owl.carousel.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('assets/css/owl.theme.css') }}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.validate.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
</head>
<body>
<nav class="navbar navbar-default bg-black">
<div class="container">
<div class="container-fluid apni-margin">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand mobile" href="{{url('/')}}"><img src="{{ asset('assets/images/logo.png') }}" class="img-responsive"></a>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li><a href="{{url('/')}}">HOME</a></li>
<li><a href="{{url('/satellitephone')}}">SATELLITE PHONE</a></li>
<li><a href="{{url('/travelinsurance')}}">TRAVEL INSURANCE</a></li>
<a class="navbar-brand desktop" href="{{url('/')}}"><img src="{{ asset('assets/images/logo.png') }}" class="img-responsive extra"></a>
<li><a href="{{url('/payments')}}">PAYMENT OPTIONS</a></li>
<li><a href="{{url('/contact')}}">CONTACT US</a></li>
<li>
<ul class="languagepicker">
<a href="http://www.south-africa-motorhomes-and-campervans.com/" target="_blank"><li><img src="{{ asset('assets/images/country.png') }}"/>&nbsp;</li></a>
<a href="http://www.south-africa-motorhomes-and-campervans.com/" target="_blank"><li><img src="{{ asset('assets/images/country.png') }}"/>&nbsp;</li></a>
</ul>
</li>
<li><a href="https://www.facebook.com/SuedafrikaWohnmobileUndCamper/" target="_blank"><img src="{{ asset('assets/images/facebook.png') }}" class="img-responsive menu-img"></a></li>
</ul>
</div>
</div>
</div>
</nav>	