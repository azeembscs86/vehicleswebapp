@include('include.head')
<div class="satellite-banner">
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Satellite phone hire</h1>
</div>
</div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-md-6 satellite">
<h3>Renting satellite phones in Africa is cheaper than you think..<br><span>Only US $5.00 per day</span></h3>
</div>
<div class="col-md-6">
<img src="{{ asset('assets/images/phone.jpg') }}" alt="" class="pull-right">
</div>
</div>
</div>
<div class="satellite-bg-red">
<div class="container">
<div class="row satellite-box">
<div class="col-md-6 satellite-form">
<div id="message" class="text-success"></div>	
<form name="orderForm" id="orderForm" method="post" action="">
{{csrf_field()}}	
<h3>Order Now</h3>                        
<div class="form-group col-md-6 padding-left">
<label for="name" class="cols-sm-2 control-label">Name</label>
<div class="cols-sm-10">
<div class="input-group">
<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
</div>
</div>
</div>
<div class="form-group col-md-6 padding-right">
<label for="email" class="cols-sm-2  control-label">Email</label>
<div class="cols-sm-10">
<div class="input-group">
<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
</div>
</div>
</div>
<div class="form-group">
<label for="username" class="cols-sm-2 control-label">Takeover date and time</label>
<div class="input-group date">
<input type="text" class="form-control " placeholder="Takeover date and time" id="takedate" name="takedate">
<span class="input-group-addon btn_icon" id="basic-addon2">
<i class="fa fa-calendar-o" aria-hidden="true"></i>
</span>
</div>
</div>
<div class="form-group">
<label for="password" class="cols-sm-2 control-label">Takeover location</label>
<div class="cols-sm-10">
<div class="input-group">
<input type="text" class="form-control" name="takeover_loc" id="takeover_loc"  placeholder="Takeover location"/>
<span class="input-group-addon"><i class="fa fa-map-marker fa" aria-hidden="true"></i></span>
</div>
</div>
</div>
<div class="form-group">
<label for="username" class="cols-sm-2 control-label">Return date and time</label>
<div class="cols-sm-10">
<div class="input-group">
<input type="text" class="form-control" name="return_date" id="return_date"  placeholder="Return date and time"/>
<span class="input-group-addon"><i class="fa fa-clock-o fa" aria-hidden="true"></i></span>
</div>
</div>
</div>						
<div class="form-group">
<label for="password" class="cols-sm-2 control-label">Return location</label>
<div class="cols-sm-10">
<div class="input-group">
<input type="text" class="form-control" name="return_loc" id="return_loc"  placeholder="Return location"/>
<span class="input-group-addon"><i class="fa fa-map-marker fa" aria-hidden="true"></i></span>
</div>
</div>
</div>		
<div class="form-group">
<label for="password" class="cols-sm-2 control-label">Pre-paid packages</label>
<div class="cols-sm-10">
<div class="">
<select class="form-control" name="packages" id="packages">
<option value="">Select Pre-paid packages</option>	
<option value="30 Minutes @$1.99 per minute">30 Minutes @$1.99 per minute</option>
<option value="50 Minutes @$1.95 per minute">50 Minutes @$1.95 per minute</option>
<option value="100 Minutes @$1.90 per minute">100 Minutes @$1.90 per minute</option>
<option value="200 Minutes @$1.80 per minute">200 Minutes @$1.80 per minute</option>
</select>
<!--<span class="input-group-addon"><i class="fa fa-archive fa" aria-hidden="true"></i></span>-->
</div>
</div>
</div>
<div class="button-select text-center">
<button type="submit" name="submit" id="submit" class="btn btn-default"><i class="fa fa-check" aria-hidden="true"></i>
</button>
</div>                                          
</form>
</div>			
<div class="col-md-6">
<div class="satellite-box-para">
<p>Auf Ihrer Reise nach Afrika, besonders wenn Sie planen abgeschiedene Gegenden zu bereisen, sollte aus Sicherheitsgründen ein Satellitentelefon nicht fehlen.
<br>
<br>
Das Isat Phone Pro wird Ihnen bei Ihrer Ankunft in Afrika persönlich in der Fahrzeugmietstation, am Flughafen oder in Ihrem Hotel übergeben. Ihre entsprechende Telefonnummer wird Ihnen bereits vor Ihrer Ankunft mitgeteilt, damit Sie diese Ihrer Familie und Freunden bekannt geben können und somit jederzeit Anrufe und SMS Nachrichten empfangen können - egal wo Sie sich gerade befinden. Im Notfall können Sie jederzeit Hilfe rufen und Ihre GPS Koordinaten via SMS oder an eine Email Adresse übermitteln</p>
</div>
<div class="satellite-box-para-one">
<h3>Please note</h3>
<hr>
<p>All prices are in US Dollars.</p>
<p>All prices are plus 14% VAT tax.</p>
<p>Unused minutes cannot be refunded.</p>
</div>
</div>
</div>
</div>
</div>
@include('include.footer')