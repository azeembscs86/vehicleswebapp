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


<div class="col-md-4 bg-success">
<h3>Invoice</h3>
<div class="slick-slider">
<?php $imgs = explode(",",$vehicles->v_images); 
foreach($imgs as $immm){
?>
<div>
	<img class="center-block col-md-12 padding-zero" src="public/uploads/vehicles/<?php echo $immm; ?>">
</div>
<?php
}
?>
</div>
<h1 class="clearfix col-md-12">{{$vehicles->v_name}}</h1>
<table class="table">
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
<td>{{$fromcity}}</td>
</tr>
<tr>
<th>To City</th>
<td>{{$dropcity}}</td>
</tr>
<tr>
<th>From</th>
<td>{{$picdate}}</td>
</tr>                
<tr>
<th>Until</th>
<td>{{$dropdate}}</td>
</tr>
<tr>
<th>Total Days</th>
<td>{{$numberdays}}</td>
</tr>                
<tr>
<td colspan="3" class="text-right"> <span class="badge badge-success"> </span> On Request <a href="#requestInfo" data-toggle="modal" data-target="#requestInfo"> <i class="fa fa-info-circle " aria-hidden="true"></i></a></td>
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
<tr>
<td colspan="1"><h4 class="total-price">Price</h4></td>
<td colspan="2"><h4 class="margin_zero text-right"><i class="fa fa-eur" aria-hidden="true"></i> {{$season->amount}}</h4></td>
</tr>
<tr>
<td colspan="3">A deposit of 10% is payable at the time of the booking confirmation, the remaining balance 45 days prior to travel.</td>
</tr>
<tr>
<td colspan="3"><h4 class="extra-charges"> Extra Charges </h4></td>
</tr>
<tr>
<td>Toll Fee</td>                            
<td colspan="2" class="text-right">Approx. <i class="fa fa-eur" aria-hidden="true"> {{$vehicles->v_toll_fee}} </td>
</tr>
<tr>
<td>Contract Fee</td>                           
<td colspan="2" class="text-right">Approx. <i class="fa fa-eur" aria-hidden="true"> {{$vehicles->v_dep_fee}}</td>
</tr>
<tr>
<td colspan="3"> <hr> </td>
</tr>
<tr>
<td colspan="2"><h4 class="rental-price">Total<br>(payable locally)</h4></td>
<td class="width"><h4 class="rental-price"><i id="amn_tolt" class="fa fa-eur pull-right" aria-hidden="true"> <span class="total-payable-price">{{$vehicles->v_toll_fee + $vehicles->v_dep_fee + $season->amount}}</span> </i></h4></td>
</tr>
<tr>
<td colspan="3"> 
{{csrf_field()}}	
<input type="hidden" name="vehicle_id" id="vehicle_id" value="{{$vehicles->id}}">
<input type="hidden" name="amount" id="amount" value="{{$vehicles->v_toll_fee + $vehicles->v_dep_fee + $season->amount}}">
<input type="hidden" name="total_amount" id="total_amount" value="{{$vehicles->v_toll_fee + $vehicles->v_dep_fee + $season->amount}}">
<input type="hidden" name="from_city" id="from_city" value="{{$fromcity}}">  
<input type="hidden" name="drop_city" id="drop_city" value="{{$dropcity}}">  
<input type="hidden" name="pic_date" id="pic_date" value="{{$picdate}}">  
<input type="hidden" name="drop_date" id="drop_date" value="{{$dropdate}}">  
<input type="hidden" name="number_days" id="number_days" value="{{$numberdays}}">
<a class="btn btn-default col-md-12 btn-lg dropdown-toggle books" href="javascript:void(0);">Book Now</a>
</td>
</tr>
<tr>
<td colspan="3">
<a class="btn btn-default col-md-12 btn-lg dropdown-toggle" href="javascript:;" onclick="sendEmailQue();">Frage zum Angebot</a>
</td>
</tr>
</tbody>
</table>
</div>
<div id="requestInfo" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Request Info</h4>
</div>
<div class="modal-body">
<p>Die Verfügbarkeit des gewünschten Fahrzeugs kann erst nach Rücksprache mit dem Vermieter bestätigt werde. Wir werden Ihren Buchungsauftrag umgehend an den Vermieter weiterleiten, sobald Ihre Online-Buchung bei uns eingegangen ist.<br/>
Es kann ca. 1-3 Tage dauern, bis wir die Antwort des Vermieters erhalten. Umgehend nach Erhalt der Antwort werden wir Sie informieren, ob die Buchung erfolgreich war.</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>



<div class="col-md-8">
<div class="fare-div">
<h3>Fare</h3>
<ul hidden class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#home">Standard Package</a></li>
<li><a data-toggle="tab" href="#menu1">All Inclusive Package</a></li>
</ul>
<div class="tab-content">
<div id="home" class="tab-pane fade in active">
<h2>Inclusions</h2><ul> 
@foreach($inclusion as $inclusions)
<li><i class="fa fa-check" aria-hidden="true"> </i> {{$inclusions->name}}</li> 
@endforeach	
</ul> 
<hr>							   
<form   action="" method="post">
<h2>Additional Service</h2>
<table class="table">
<tbody>
<input type="hidden" class="zar price" value="25"/>
@foreach($service as $services)
<tr>
<td class='text-right'>
<input value='{{$services->amount}}' serid="{{$services->id}}" class="services serv" name='addl_service[]' type='checkbox' />
</td>
<td>{{$services->name}} {!!html_entity_decode($services->descp)!!}</td>
<td class='red text-center'><i class="fa fa-eur" aria-hidden="true"></i> {{$services->amount}}, <?php if($services->service_charges == 'once'){ echo 'Once Off'; }else{ echo 'Per Day'; } ?></td>
</tr>
@endforeach
</tbody>
</table>

<hr>
<h2>Equipment</h2>
<table class="table">
<tbody>
@foreach($equipment as $equipments)
<tr>
<td class='text-right'>
<input value='{{$equipments->amount}}' equid="{{$equipments->id}}" class="services equip" name='equipment[]' type='checkbox' />
</td>
<td>{{$equipments->name}}</td>
<td class='red text-center'><i class="fa fa-eur" aria-hidden="true"></i> {{$equipments->amount}}, Payable locally</td>
</tr>
@endforeach
</tbody>
</table>
@if($vehicles->vehicle_pdf)
<hr>
<table class="table">
<tr>
<td class='text-right'>
<a target="_blank" class="btn btn-default col-md-12 btn-lg bg-red" href="{{asset('public/'.$vehicles->vehicle_pdf)}}"><i class="fa fa-download"></i> Download PDF</a>
</td>
<tr>
</table>
@endif

</form>
</div>
<div id="menu11" class="tab-pane fade">
    
    AAAA
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
function sendEmailQue(){
	var url = 'mailto:info@sudafrika-wohnmobile-und-camper.de?subject='+ encodeURIComponent('Frage zum Angebot') + '&body=';
	url += encodeURIComponent('This was requested via email dated <?php echo date('d-m-y'); ?>\n\n');
	url += encodeURIComponent('Vehicle: {{$vehicles->v_name}}\n');
	url += encodeURIComponent('Company: {{$company->company_name}}\n');
	url += encodeURIComponent('Person: {{$vehicles->v_person}}\n');
	url += encodeURIComponent('From City: {{$fromcity}}\n');
	url += encodeURIComponent('To City: {{$dropcity}}\n');
	url += encodeURIComponent('From: {{$picdate}}\n');
	url += encodeURIComponent('Until: {{$dropdate}}\n');
	url += encodeURIComponent('Total Days: {{$numberdays}}\n');
	url += encodeURIComponent('Season: {{$season->season_name}}\n');
	url += encodeURIComponent('Season Rental Price: €{{$season->amount}}\n');
	url += encodeURIComponent('Rental Price (payable upon booking): €{{$season->amount}}\n');
	url += encodeURIComponent('Price: €{{$season->amount}}\n');
	url += encodeURIComponent('A deposit of 10% is payable at the time of the booking confirmation, the remaining balance 45 days prior to travel.\n');
	url += encodeURIComponent('\nExtra Charges:-\n');
	url += encodeURIComponent('Toll Fee	Approx.: €{{$vehicles->v_toll_fee}}\n');
	url += encodeURIComponent('Contract Fee	Approx.: €{{$vehicles->v_dep_fee}}\n');
	if($('.services.serv[serid]:checked').length){
		url += encodeURIComponent('\nAdditional Service:-\n');
		$('.services.serv[serid]:checked').each(function(){
			url += encodeURIComponent($(this).closest("td").next("td").text()+': €'+$(this).attr("serid")+'\n');
		});
	}
	if($('.services.equip[equid]:checked').length){
		url += encodeURIComponent('\nEquipment:-\n');
		$('.services.equip[equid]:checked').each(function(){
			url += encodeURIComponent($(this).closest("td").next("td").text()+': €'+$(this).attr("equid")+'\n');
		});
	}
	url += encodeURIComponent('Contract Fee	Approx.: €{{$vehicles->v_dep_fee}}\n');
	url += encodeURIComponent('\nTotal (payable locally): €'+$("#amn_tolt").text()+'');
	window.location.href=url;
}
</script>
@include('include.footer')