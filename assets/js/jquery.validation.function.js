jQuery("#orderForm").validate({
rules: {
name:"required",
email: {
required: true,
email: true
},
takedate:"required",
takeover_loc:"required",
return_date:"required",
return_loc:"required",
packages:"required"
},
messages: {
name:"Enter your name",
email: { required: "Enter your email", email:"Enter your correct email"},
takedate:"Select takeover date and time",
takeover_loc:"Enter takeover location",
return_date:"Select return date and time",
return_loc:"Enter return location",
packages:"Select pre-paid package"
},
submitHandler: function() {
sendOrder();
},
success: function(label) {
label.remove();
}
});
function sendOrder(){
var name = $('#name').val();
var email = $('#email').val();
var takedate = $('#takedate').val();
var takeover_loc = $('#takeover_loc').val();
var return_date = $('#return_date').val();
var return_loc = $('#return_loc').val();
var packages = $('#packages').val();
var _token = $( "input[name*='_token']" ).val();
$.ajax({
url: "order",
data: {name:name,email:email,takedate:takedate,takeover_loc:takeover_loc,return_date:return_date,return_loc:return_loc,packages:packages,_token:_token},
type: 'POST',
beforeSend: function () {
},
success: function (result) {
	if(result == 'done'){
		$("#message").html('<p>Vielen Dank. Wir werden Sie in Kürze kontaktieren.</p>');
	}
},
error: function () {
}
});	
}

$(document).on("click", ".services", function () {
var _token = $( "input[name*='_token']" ).val();	
var amount = $('#amount').val();
var arr = $('.services:checked').map(function () {
         return this.value;
     }).get();	
$.ajax({
url: "fare_addservices",
data: {arr:arr,amount:amount,_token:_token},
type: 'POST',
beforeSend: function () {
},
success: function (result) {
	$("#amn_tolt").html(result);
	document.getElementById('total_amount').value = result;
},
error: function () {
	$("#amn_tolt").html(amount);
	document.getElementById('total_amount').value = amount;
}
});	
});

$(document).on("click", ".books", function () {
var vehicle_id = $('#vehicle_id').val();
var total_amount = $('#total_amount').val();
var _token = $( "input[name*='_token']" ).val();
var from_city = $('#from_city').val();
var drop_city = $('#drop_city').val();
var pic_date = $('#pic_date').val();
var drop_date = $('#drop_date').val();
var number_days = $('#number_days').val();
var addl_service_array = $('.serv:checked').map(function () {
         return $(this).attr("serid");
     }).get();
var equipment_array = $('.equip:checked').map(function () {
         return $(this).attr("equid");
     }).get();
$.ajax({
url: "booknow",
data: {vehicle_id:vehicle_id,total_amount:total_amount,addl_service_array:addl_service_array,equipment_array:equipment_array,_token:_token,from_city:from_city,drop_city:drop_city,pic_date:pic_date,drop_date:drop_date,number_days:number_days},
type: 'POST',
beforeSend: function () {
},
success: function (result) {
window.location.href = 'http://107.6.184.93/campers/booking/'+result;
},
error: function () {
window.location.href = 'http://107.6.184.93/campers/booking/'+result;
}
});	
});