<h3>Search Results By Categories</h3>
<div class="bg-red search-line-3"></div>
<!-- <p>4 affordable Motorhomes from 1 rental company in Windhoek </p> -->
<?php 
if(count($categoryvehicle) == 0){
    echo '<div>There is no searching result found</div>';
}
?>

@if(isset($categoryvehicle))
@foreach($categoryvehicle as $vehicle)
<div class="row margin-bottom">
<div class="col-md-6 search-result-car padding-right">
<?php	
$imgs = explode(",",$vehicle->v_images);
for($i=0;$i<count($imgs);$i++):
if($i==1){
	break;
}
?>
<img src="public/uploads/vehicles/<?php echo $imgs[$i]; ?>" class="img-responsive">
<?php endfor; ?>	
<div class="bg-red">
<h4>{{$vehicle->v_name}}  </h4>
</div>
</div>
<div class="col-md-6 search-result-car bg-black">
<div class="col-md-12">
<table class="table select-box-four">
<tr>
<th>Suitable for</th>
<td>{{$vehicle->v_person}}</td>
</tr>
<tr>
<th>Vehicle age</th>
<td>{{$vehicle->v_age}}</td>
</tr>
<tr>
<th>Vehicle type</th>
<td>{{$vehicle->v_type}}</td>
</tr>
<tr>
<th class="select-price">Price</th>
<td class="currency">{{$vehicle->v_toll_fee + $vehicle->v_dep_fee}} <i class="fa fa-eur" aria-hidden="true"></i></td>
</tr>
</table>
</div>
<div class="col-md-12 search-button text-center">
<form name="selectVehicleForm" id="selectVehicleForm" method="POST" action="{{url('/faredetails')}}">
    {{ csrf_field() }}
                                <input type="hidden" name="vehicle_id" id="vehicle_id" value="{{$vehicle->id}}">
                                <input type="hidden" name="from_city" id="from_city" value="{{$pic_city}}">
                                <input type="hidden" name="drop_city" id="drop_city" value="{{$drop_city}}">
                                <input type="hidden" name="pic_date" id="pic_date" value="{{$pic_date}}">
                                <input type="hidden" name="drop_date" id="drop_date" value="{{$drop_date}}">
                                <input type="hidden" name="number_days" id="number_days" value="{{$daysnumber}}">
                                <input type="submit" name="submit" id="submit" class="btn btn-lg" value="Select Vehicle">
                            </form>
</div>
</div>
</div>
@endforeach
@else
<div>Sorry there no found search result</div>
@endif

