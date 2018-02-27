@include('include.head')
<div class="fare-banner">
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Review</h1>
<p>Lorem ipsum dolor sit amet</p>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="container">
<div class="row" >
<div class="col-md-12">
<?php $imgs = explode(",",$vehicles->v_images); 
    $sliderText = '<div class="slick-slider">';
foreach($imgs as $immm){
$sliderText .= '<div><img class="center-block col-md-12 padding-zero" src="public/uploads/vehicles/'.$immm.'"></div>';
}
	$sliderText .= '</div>'
?>
<h3>{{$vehicles->v_name}}</h3>
<div class="row"><div class="col-md-4"><table class="col-md-12">
<tbody>

<tr>
<th>Person</th>
<td>{{$vehicles->v_person}}</td>
</tr>
<tr>
<th>From City</th>
<td>{{$booking->from_city}}</td>
</tr>
<tr>
<th>To City</th>
<td>{{$booking->to_city}}</td>
</tr>
<tr>
<th>From</th>
<td>{{$booking->pic_date}}</td>
</tr>                
<tr>
<th>Until</th>
<td>{{$booking->drop_date}}</td>
</tr>
<tr>
<th>Total Days</th>
<td>{{$booking->number_days}}</td>
</tr>                

<tr>
<td colspan="3"> <hr> </td>
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
<td class="width"><h4 class="rental-price"><i id="amn_tolt" class="fa fa-eur pull-right" aria-hidden="true"> <span class="total-payable-price">{{$booking->totl_amount}}</span> </i></h4></td>
</tr>


</tbody>
</table><hr/><table class="col-md-12"><tr><td width="50%">Name </td><td><strong>{{$booking->salutation}} {{$booking->f_name}}{{$booking->l_name}}</strong></td>	</tr><tr><td>Date of Birth</td><td><strong>{{$booking->dob}}</strong></td>	</tr><tr><td>Address</td><td><strong>{{$booking->address}}</strong></td>	</tr><tr><td>Postal Code</td><td><strong>{{$booking->post_code}}</strong></td>	</tr><tr><td>City</td><td><strong>{{$booking->city}}</strong></td>	</tr><tr><td>Country</td><td><strong>{{$booking->country}}</strong></td>	</tr><tr><td>Telephone</td><td><strong>{{$booking->phone}}</strong></td>	</tr>	<tr><td>Email Address</td><td><strong>{{$booking->email}}</strong></td>	</tr></table><div class="row"><div class="col-md-12"><br/><a class="btn btn-info btn-lg btn-thanks-review" href="{{ url('/thanks') }}">verbindlich buchen</a></div></div></div>
<div class="col-md-8"><?php echo $sliderText; ?></div></div><div class="row text-right">
<br/><br/>
<br/><br/><br/>
</div>
</div>
</div>
</div></div>
@include('include.footer')