@include('include.head')
<div class="banner">
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Beginnen Sie Ihr Afrika</h1>
<p>Abenteuer hier....</p>
</div>
</div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<p><br/>Falls Sie Rückfragen haben oder weitere Informationen benötigen, so zögern Sie bitte nicht uns zu kontaktieren. Unser Team steht Ihnen gerne jederzeit zur Verfügung.<br/>Sie erreichen uns per Email:<br/><a href="mailto:info@sudafrika-wohnmobile-und-camper.de">info@sudafrika-wohnmobile-und-camper.de</a> <br/>Oder nutzen Sie unseren Rückrufservice
</p>
</div>
<div class="col-md-3"></div>
<div class="col-md-6 contact-form">
<div id="message" class="text-success"></div>
<form name="orderForm" id="orderForm" method="post" action="">
{{csrf_field()}}
<h3>Request a callback</h3>                        
<div class="form-group">
<label for="name" class="cols-sm-2 control-label">Name</label>
<div class="cols-sm-10">
<div class="input-group">
<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
</div>
</div>
</div>
<div class="form-group">
<label for="phone" class="cols-sm-2  control-label">Phone</label>
<div class="cols-sm-10">
<div class="input-group">
<input type="tel" class="form-control" name="phone" id="phone"  placeholder="Enter your Phone"/>
<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
</div>
</div>
</div>
<div class="form-group">
<label for="username" class="cols-sm-2 control-label">Best time to call</label>
<div class="">
<label><input type="radio" class="" id="BestTimeToCall1" name="BestTimeToCall" value="Any"> Any</label><br/>
<label><input type="radio" class="" id="BestTimeToCall2" name="BestTimeToCall" value="Morning"> Morning</label><br/>
<label><input type="radio" class="" id="BestTimeToCall3" name="BestTimeToCall" value="Afternoon"> Afternoon</label><br/>
</div>
</div>
<div class="form-group">
<label for="Comments" class="cols-sm-2 control-label">Comments</label>
<div class="cols-sm-10">
<div class="">
<textarea class="form-control" name="Comments" id="Comments"  placeholder=""></textarea>
</div>
</div>
</div>
<div class="button-select text-center">
<button type="submit" name="submit" id="submit" class="btn btn-default"><i class="fa fa-check" aria-hidden="true"></i>
</button>
</div>                                           
</form>
</div>
</div>
</div>
@include('include.footer')