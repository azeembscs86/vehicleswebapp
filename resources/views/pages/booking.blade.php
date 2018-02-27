@include('include.head')
<div class="fare-banner">
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Fares</h1>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="container">
<div class="row" >
<div class="col-md-4 bg-success book-yourself">
<h3>INVOICE</h3>
<div class="slick-slider">
<?php $imgs = explode(",",$vehicles->v_images); foreach($imgs as $immm){
?>
<div>
	<img class="center-block col-md-12 padding-zero" src="../public/uploads/vehicles/<?php echo $immm; ?>">
</div>
<?php
}
?>
</div>
<input type="hidden" name="vehicle_img" value="Britz 4x4 Trax Nissan Camper.png"/>
<h1 class="clearfix col-md-12">{{$vehicles->v_name}}</h1>
<input type="hidden" name="vehicle_title" value="Bobocamper Discoverer 4"/>
<table  class="table booking-yourself">
<tbody>
<tr>
<th>Company</th>
<td>{{$company->company_name}}</td>
</tr>
<tr>
<th>Person</th>
<td>{{$vehicles->v_person}}</td>
</tr>
<tr>
<th>From City</th>
<td>{{$bookings->from_city}}</td>
</tr>
<tr>
<th>To City</th>
<td>{{$bookings->to_city}}</td>
</tr>
<tr>
<th>From</th>
<td>{{$bookings->pic_date}}</td>
</tr>                
<tr>
<th>Until</th>
<td>{{$bookings->drop_date}}</td>
</tr>    
<tr>
<th>Total Days</th>
<td>{{$bookings->number_days}}</td>
</tr>             
<tr>
<td colspan="3" class="text-right"> <span class="badge badge-success"> </span> On Request <i class="fa fa-info-circle " aria-hidden="true"></i></td>
</tr>
<tr>
<td colspan="3"> <hr> </td>
</tr>
<tr>
<td>Season</td>                            
<td colspan="2" class="text-right">{{$season->season_name}}</td>
</tr>                
<tr>
<td>Season Rental Price</td>                           
<td colspan="2" class="text-right"><i class="fa fa-eur" aria-hidden="true"></i>{{$season->amount}}</td>
</tr>  
<tr>
<td colspan="1"><h4 class="rental-price">Rental Price<br>(payable upon booking)</h4></td>
<td colspan="2"><h4 class="rental-price"><i class="fa fa-eur pull-right" aria-hidden="true"> {{$season->amount}}</i></h4></td>
</tr>                
<tr>
<td colspan="3"> <hr> </td>
</tr>
<?php if(isset($bookaddservices)): ?>
<tr class="equipment_ajax">
<td colspan="3"><h4 class="extra-charges"> Additional Services</h4></td>
</tr>	
<?php
foreach($bookaddservices as $bookadserv):
?>
<tr class="space">
<td colspan="2"><?php echo $bookadserv->name; ?></td>
<td class="text-right"><i class="fa fa-eur" aria-hidden="true"></i><?php echo $bookadserv->amount; ?></td>
</tr>		
<?php endforeach; endif; ?>
<?php if(isset($bookaddequipment)): ?>
<tr class="equipment_ajax">
<td colspan="3"><h4 class="extra-charges"> Additional Equipment</h4></td>
</tr>	
<?php
foreach($bookaddequipment as $bookequip):
?>
<tr class="space">
<td colspan="2"><?php echo $bookequip->name; ?></td>
<td class="text-right"><i class="fa fa-eur" aria-hidden="true"></i><?php echo $bookequip->amount; ?></td>
</tr>		
<?php endforeach; endif; ?>
<tr>
<td colspan="3"><h4 class="extra-charges"> Extra Charges </h4></td>
</tr>
<tr>
<td>Toll Fee</td>
<td colspan="2" class="text-right ">Approx. <i class="fa fa-eur" aria-hidden="true">
{{$vehicles->v_toll_fee}}</i></td>
</tr>
<tr>
<td>Contract Fee</td>
<td colspan="2" class="text-right ">Approx. <i class="fa fa-eur" aria-hidden="true"></i> {{$vehicles->v_dep_fee}}</td>
</tr>
<tr>
<td colspan="2"><h4 class="rental-price">Total Extras<br>(payable locally)</h4></td>
<td><h4 class="rental-price"><i class="fa fa-eur pull-right" aria-hidden="true"> {{$bookings->totl_amount}} </i></h4></td>
</tr>
</tbody>
</table>
</div>
<div class="col-md-8 booking-form">
<h3>Book Yourself</h3>
<form onsubmit="return checkEmailMatch();" name="bookingInfoForm" id="bookingInfoForm" method="post" action="{{ url('/bookinginfo') }}">
{{csrf_field()}}	
<input type="hidden" name="bookingid" id="bookingid" value="{{$bookings->id}}">
<div class="form-group">
<label class="control-label" for="select" placeholder="Anrede">Anrede </label>
<select class="select form-control" id="select" name="salutation">
			<option value="Anrede">Anrede</option>
			<option value="Herr">Herr</option>
			<option value="Frau">Frau</option>
			<option value="Dr">Dr</option>
</select>
</div>
<div class="form-group">
<label class="control-label" for="name">Vorname</label>
<input class="form-control" id="f_name" name="f_name" type="text" placeholder="Vorname" required="" />
</div>
<div class="form-group">
<label class="control-label" for="name1">Nachname</label>
<input class="form-control" id="l_name" name="l_name" type="text" placeholder="Nachname" required=""/>
</div>
<div class="form-group">
<label class="control-label " for="dob">Geburtsdatum</label>
<input class="form-control" id="dob" name="dob" placeholder="Geburtsdatum" type="text" required=""/>
</div>
<div class="form-group">
<label class="control-label" for="text">Strassse/Hausnummer</label>
<input class="form-control" id="address1" name="address1" placeholder="Strassse/Hausnummer" type="text" required=""/>
</div>
<div class="form-group col-md-4 padding-left">
<label class="control-label" for="text2">Postleitzahl</label>
<input class="form-control" id="postal_code" name="postal_code" type="text" placeholder="Postleitzahl" required=""/>
</div>
<div class="form-group col-md-4">
<label class="control-label" for="text3">Ort</label>
<input class="form-control" id="city" name="city" type="text" placeholder="Ort" required="" />
</div>
<div class="form-group col-md-4 padding-right">
<label class="control-label" for="country">Land</label>
<input class="form-control" id="country" name="country" type="text" placeholder="Land" required="" />
</div>
<div class="form-group">
<label class="control-label" for="tel">Telephone</label>
<input class="form-control" id="phone" name="tel" type="tel" required=""/>
</div>
<div class="form-group">
<label class="control-label requiredField" for="email">Email Address</label>
<input class="form-control email-address" id="email" name="email" type="text" required=""/>
</div>
<div>
<label class="control-label requiredField" for="email">Confirm Email Address<span class="asteriskField">*</span></label>
<input class="form-control confirm-email-address" id="email_confirm" name="email_confirm" type="text" required=""/></div>
<hr>
<h3>Further Travellers</h3>
<div class="further-details-add">
	<div class="further-details-item">
		<div class="form-group col-md-4 padding-left">
		<label class="control-label" for="select" placeholder="Anrede">Anrede</label>
		<select class="select form-control" id="other_salutation" name="other_salutation[]">
			<option>Anrede</option>
			<option value="Herr">Herr</option>
			<option value="Frau">Frau</option>
			<option value="Kind unter 12 Jahren">Kind unter 12 Jahren</option>
		</select>
		</div>
		<div class="form-group col-md-4">
		<label class="control-label" for="name">Vorname</label>
		<input class="form-control" id="other_fname" name="other_fname[]" type="text" placeholder="Vorname" />
		</div>
		<div class="form-group col-md-4 padding-right">
		<label class="control-label" for="name1">Nachname</label>
		<input class="form-control" id="other_lname" name="other_lname[]" type="text" placeholder="Nachname"/>
		</div>
	</div>
</div>
<div class="form-group col-md-12 text-right">
	<a class="add-more-further" href="javascript:;" ><i class="fa fa-plus"></i></a>
</div>
<hr>
<h3>Diese Zahlungsoption wünsche ich</h3>
<p>Umgehend nach erfolgreicher Buchungsbestätigung ist eine Anzahlung von 10% erforderlich, der Restbetrag ist erst 45 Tage vor Reisebeginn fällig </p>
<p>
	<label><input type="radio" name="paymentOption" value="cash" checked="" /> &nbsp;Zahlung auf Rechnung</label>&nbsp;&nbsp;&nbsp;
	<label><input type="radio" name="paymentOption" value="cc" /> &nbsp;Zahlung per Kreditkarte&nbsp;&nbsp;
		<span class="pull-right">
			<img src="http://107.6.184.93/campers/assets/images/american-express.png">
			<img src="http://107.6.184.93/campers/assets/images/visa.png">
			<img src="http://107.6.184.93/campers/assets/images/master-card.png">
		</span>
	</label>
</p>
<div class="ccdetails-div" style="display:none">
<div class="form-group col-md-12">
<label class="control-label" for="cctype">Kartentyp</label>
<select name="cctype" class="form-control">
	<option>Kartentyp</option>
	<option>MasterCard</option>
	<option>VISA</option>
	<option>American Express2</option>
</select></div>
<div class="form-group col-md-6 padding-right">
<label class="control-label" for="ccname">Name des Karteninhabers</label>
<input class="form-control" id="ccname" name="ccname" type="text" placeholder="Name des Karteninhabers"/>
</div>
<div class="form-group col-md-6 padding-right">
<label class="control-label" for="ccnumber">Kreditkartennummer</label>
<input class="form-control" id="ccnumber" name="ccnumber" type="text" placeholder="Kreditkartennummer"/>
</div>
<div class="form-group col-md-6 padding-right">
<label class="control-label" for="cccvv">CVV</label>
<input class="form-control" id="cccvv" name="cccvv" type="text" placeholder="Enter Card Holder Name"/>
</div>
<div class="form-group col-md-6 padding-right">
<div>
<label class="control-label" for="ccexpiry">gültig bis</label>
</div>
<div class="row">
<div class="col-md-6">
<select name="ccexpiryMonth" class="form-control">
	<option>Month</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>10</option>
	<option>11</option>
	<option>12</option>
</select>
</div>
<div class="col-md-6">
<select name="ccexpiryMonth" class="form-control">
	<option>Year</option>
	<?php
	for($i = 2018; $i <= 2025; $i++){
	?>
	<option><?php echo $i; ?></option>
	<?php
	}
	?>
</select>
</div>
</div>
</div>
<p><label><input type="checkbox" name="check1" value="check1" /> &nbsp;Eine Belastung (Anzahlung)  Ihrer Kreditkarte erfolgt erst nach erfolgreicher Buchungsbestätigung des Fahrzeugs</label></p>
</div>
<div class="form-group padding-right">
<label class="control-label" for="Comments">Mitteilungen an uns</label>
<textarea class="form-control" id="comments" name="comments" type="text" placeholder="Mitteilungen an uns"></textarea>
</div>

<p><label>&nbsp;Bitte bestätigen Sie die vertraglichen Verpflichtungen sowie die Miet- und Reisebedingungen</label></p>
<p><label><input type="checkbox" name="check3" value="check3" required="" /> &nbsp;Ich habe die <a data-toggle="modal" data-target="#Stornobedingungen">Stornobedingungen</a> zur Kenntnis genomommen und akzeptiere diese </label></p>
<p><label><input type="checkbox" name="check4" value="check4" required="" /> &nbsp;Ich habe die <a data-toggle="modal" data-target="#Mietbedingungen">Mietbedingungen des Vermieters </a> zur Kenntnis genomommen und akzeptiere diese</label></p>


<div class="form-group pull-right">
<button class="btn btn-primary" name="submit" type="submit">weiter</button>
</div>
</form>
</div>
</div>
</div>
</div>



<div id="Stornobedingungen" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Stornobedinungen</h4>
</div>
<div class="modal-body">
Eine kostenfreie Annulation ist bis zu 7 Tagen nach Buchungsbestätigung möglich. Danach führt jede Annulierung eine Gebühr in Höhe von EUR 50.00 mit sich. Sollte die Annulation ausserdem in eine der u.a. Fristen fallen, so werden zusätzlich folgende Gebühren berechnet
<ul>
	<li>45 bis 31 Tage vor Reisebeginn 25% des Gesamtbetrages</li>
	<li>30 bis 15 Tage vor Abholung: 50% des Gesamtbetrages</li>
	<li>14 bis 7 Tage vor Abholung: 75% des Gesamtbetrages</li>
	<li>7 bis 1 Tag vor Abholung: 85 % des Gesamtpreises</li>
	<li>Am Tag der Abholung oder bei Nichterscheinen: 100% des Gesamtpreises</li>
</ul>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>


<div id="Mietbedingungen" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Mietbedingungen des Vermieters </h4>
</div>
<div class="modal-body">
<ul>
	<li><a href="{{ url('/assets/files/Mietbedingungen Britz.pdf') }}" target="_blank">Mietbedingungen Britz </a></li>
	<li><a href="{{ url('/assets/files/Mietbedingungen Maui.pdf') }}" target="_blank">Mietbedingungen Maui </a></li>
	<li><a href="{{ url('/assets/files/Miedbedingungen Bobo 4x4.pdf') }}" target="_blank">Mietbedingungen Bobo 4x4 </a></li>
	<li><a href="{{ url('/assets/files/Miedbedingungen Bobo Wohnmobile.pdf') }}" target="_blank">MIetbedingungen Bobo Wohnmobile </a></li>
	<li><a href="{{ url('/assets/files/Mietbedingugen Asco.pdf') }}" target="_blank">Mietbedingungen Asco</a></li>
</ul>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>


@include('include.footer')