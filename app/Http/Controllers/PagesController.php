<?php



namespace App\Http\Controllers;



use DB;

use Redirect;

use App\Cities;
use App\Categories;

use App\Vehicles;

use App\Inclusions;

use App\Equipments;

use App\AdditionalServices;

use App\Companies;

use App\Seasons;

use App\BookingOrders;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;



class PagesController extends Controller

{

    public function homeVersion()

    {

      $home = 'home';

      $cities = DB::table('camp_city')->get();

      $vehicles = Vehicles::OrderBy('id','desc')->where('is_featured','1')->get();    

      return view('pages.'.$home)->with('cities',$cities)->with('vehicles',$vehicles);

    }



    public function satellitephone(){

    	$satellite = 'satelitephone';

    	return view('pages.'.$satellite);

    }



    public function tavelinsurance(){

    	$tavelinsurance = 'travelinsurance';

    	return view('pages.'.$tavelinsurance);

    }



    public function payments(){

    	$payments = 'payments';

    	return view('pages.'.$payments);

    }



    public function contact(){

    	$contact = 'contact';

    	return view('pages.'.$contact);

    }



    public function search(){

        $search = 'search';

        return view('pages.'.$search);

    }



    public function review(){

        $review = 'review';

        return view('pages.'.$review);

    }



    public function thanks(){

        $thanks = 'thanks';

        return view('pages.'.$thanks);

    }



    public function faredetails(Request $request){

        $vehicles = Vehicles::find($request->input("vehicle_id"));

        $inclusion_ids = explode(",", $vehicles->inclusion_id);

        $equipments = explode(",", $vehicles->equipments);

        $services = explode(",", $vehicles->service_id);  

        $inclusion = Inclusions::find($inclusion_ids);

        $equipment = Equipments::find($equipments);

        $service = AdditionalServices::find($services);

        $city = Cities::find($vehicles->city_id);

        $company = Companies::find($vehicles->company_id);

        $season = Seasons::find($vehicles->season_id);

        $faredetails = 'faredetails';

        return view('pages.'.$faredetails)->with('vehicles',$vehicles)->with('inclusion',$inclusion)->with('equipment',$equipment)->with('service',$service)->with('city',$city)->with('company',$company)->with('season',$season)->with('fromcity',$request->input("from_city"))->with('dropcity',$request->input("drop_city"))->with('picdate',$request->input("pic_date"))->with('dropdate',$request->input("drop_date"))->with('numberdays',$request->input("number_days"));

    }



    public function fare_addservices(Request $request){

       $arr=implode(',', $request->input("arr"));

       $sum = array_sum(explode(",", $arr));

       $amount=$request->input("amount");

       echo $sum + $amount;

    }



    public function booknow(Request $request){

        $booking = new BookingOrders();

        $booking->vechicle_id=$request->input("vehicle_id");

        $booking->from_city=$request->input("from_city");

        $booking->to_city=$request->input("drop_city");

        $booking->pic_date=$request->input("pic_date");

        $booking->drop_date=$request->input("drop_date");

        $booking->number_days=$request->input("number_days");

        $booking->services=$request->input("addl_service_array") ? implode(',', $request->input("addl_service_array")) : '';

        $booking->equipments=$request->input("equipment_array") ? implode(',', $request->input("equipment_array")) : '';

        $booking->totl_amount = $request->input("total_amount");

        $booking->created_at=date("Y-m-d H:i:s");

        $booking->updated_at=date("Y-m-d H:i:s");

        $booking->save();

        $bookingId = $booking->id;    

        return $bookingId;

    }



    public function booking($id){

        $bookingorder = BookingOrders::find($id);

        $vehicles = Vehicles::find($bookingorder->vechicle_id);

        $inclusion_ids = explode(",", $vehicles->inclusion_id);

        $equipments = explode(",", $vehicles->equipments);

        $services = explode(",", $vehicles->service_id);  

        $inclusion = Inclusions::find($inclusion_ids);

        $equipment = Equipments::find($equipments);

        $service = AdditionalServices::find($services);

        $city = Cities::find($vehicles->city_id);

        $company = Companies::find($vehicles->company_id);

        $season = Seasons::find($vehicles->season_id);

        $book_add_services = explode(",", $bookingorder->services);

        $book_addservice = AdditionalServices::find($book_add_services);

        $book_add_equip = explode(",", $bookingorder->equipments);

        $book_addequipment = Equipments::find($book_add_equip);

        $booking = 'booking';

        return view('pages.'.$booking)->with('vehicles',$vehicles)->with('inclusion',$inclusion)->with('equipment',$equipment)->with('service',$service)->with('city',$city)->with('company',$company)->with('season',$season)->with('bookaddservices',$book_addservice)->with('bookaddequipment',$book_addequipment)->with('bookings',$bookingorder);

    }



    public function submitbooking_info(Request $request){

        $bookingInfo = BookingOrders::find($request->input("bookingid"));

        $vehicles = Vehicles::find($bookingInfo->vechicle_id);
        

        if($bookingInfo)

        {            

            $bookingInfo->salutation  = $request->input('salutation');

            $bookingInfo->f_name  = $request->input('f_name');

            $bookingInfo->l_name  = $request->input('l_name');

            $bookingInfo->dob  = $request->input('dob');

            $bookingInfo->address  = $request->input('address1');

            $bookingInfo->post_code  = $request->input('postal_code');

            $bookingInfo->city  = $request->input('city');

            $bookingInfo->country  = $request->input('country');

            $bookingInfo->phone  = $request->input('tel');        

            $bookingInfo->email  = $request->input('email');

            $bookingInfo->other_salutation  = $request->input('other_salutation') ? implode(",",$request->input('other_salutation')) : '';

            $bookingInfo->other_f_name  = $request->input('other_fname') ? implode(",",$request->input('other_fname')) : '';

            $bookingInfo->other_l_name  = $request->input('other_lname') ? implode(",",$request->input('other_lname')) : '';

            $bookingInfo->other_contacts  = $request->input('comments') ? $request->input('comments') : '';

            $bookingInfo->card_name  = $request->input('ccname') ? $request->input('ccname'): '';

            $bookingInfo->card_number  = $request->input('ccnumber') ? $request->input('ccnumber') : '';

            $bookingInfo->ccv  = $request->input('cccvv') ? $request->input('cccvv') : '';

            $bookingInfo->card_expiry  = $request->input('ccexpiry') ? $request->input('ccexpiry') : '';

            $bookingInfo->status  = 1;      

            $bookingInfo->save();

            $bookingId = $bookingInfo->id;  

            $bookingorder = BookingOrders::find($bookingId);  



            $message =  "";

            $message .=  "<p>Client Info</p>";

            $message .=  "<table>";

            $message .=  "<tr>";

            $message .=  "<td>Name</td><td>".$bookingorder->salutation." ".$bookingorder->f_name." ".$bookingorder->l_name."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>Date of Birth</td><td>".$bookingorder->dob."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>Address</td><td>".$bookingorder->address."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>Postal Code</td><td>".$bookingorder->post_code."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>City</td><td>".$bookingorder->city."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>Country</td><td>".$bookingorder->country."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>Telephone</td><td>".$bookingorder->phone."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>Email Address</td><td>".$bookingorder->email."</td>";

            $message .=  "</tr>";

            $message .=  "</table>";

            if($request->has('paymentOption') == 'cc'){

            $message .=  "<p>Card Info</p>";

            $message .=  "<table>";

            $message .=  "<tr>";

            $message .=  "<td>Card Holder Name</td><td>".$bookingorder->card_name."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>Credit/Debit Card Number</td><td>".$bookingorder->card_number."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>CVV</td><td>".$bookingorder->ccv."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>Card Expiry</td><td>".$bookingorder->card_expiry."</td>";

            $message .=  "</tr>";

            $message .=  "</table>";

            }

            $message .=  "<p>Vehicle Info</p>";

            $message .=  "<table>";

            $message .=  "<tr>";

            $message .=  "<td>Vehicle Name</td><td>".$vehicles->v_name."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>Person</td><td>".$vehicles->v_person."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>Age</td><td>".$vehicles->v_age."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>Type</td><td>".$vehicles->v_type."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>Engine</td><td>".$vehicles->v_engine."</td>";

            $message .=  "</tr>";

            $message .=  "<tr>";

            $message .=  "<td>Total</td><td>".$bookingorder->totl_amount."</td>";

            $message .=  "</tr>";

            $message .=  "</table>";

            $headers = "MIME-Version: 1.0" . "\r\n";

            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: Camper<info@camper.com>' . "\r\n";

            $to = 'camper@yopmail.com';

            $subject = "Buchungsbestätigung";

            $mail = mail($to,$subject,$message,$headers);



            $booking = 'review';
           
            return view('pages.'.$booking)->with('booking',$bookingorder)->with('vehicles',$vehicles);

        }else

        {

           //return Redirect::back()->withMessage('Error Occured Try again later.'); 

        }

    }



    public function ordernow(Request $request){

        

        $name=$request->input("name");

        $email=$request->input("email");

        $takedate=$request->input("takedate");

        $takeover_loc=$request->input("takeover_loc");

        $return_date=$request->input("return_date");

        $return_loc=$request->input("return_loc");

        $packages=$request->input("packages");



        // Send email

        $message =  "";

        $message .=  "<table>";

        $message .=  "<tr>";

        $message .=  "<td>Name</td><td>".$name."</td>";

        $message .=  "</tr>";

        $message .=  "<tr>";

        $message .=  "<td>Email</td><td>".$email."</td>";

        $message .=  "</tr>";

        $message .=  "<tr>";

        $message .=  "<td>Takeover date and time</td><td>".$takedate."</td>";

        $message .=  "</tr>";

        $message .=  "<tr>";

        $message .=  "<td>Takeover location</td><td>".$takeover_loc."</td>";

        $message .=  "</tr>";

        $message .=  "<tr>";

        $message .=  "<td>Return date and time</td><td>".$return_date."</td>";

        $message .=  "</tr>";

        $message .=  "<tr>";

        $message .=  "<td>Return location</td><td>".$return_loc."</td>";

        $message .=  "</tr>";

        $message .=  "<tr>";

        $message .=  "<td>Pre-paid packages</td><td>".$packages."</td>";

        $message .=  "</tr>";

        $message .=  "</table>";

        $headers = "MIME-Version: 1.0" . "\r\n";

        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: Camper<info@camper.com>' . "\r\n";

        $to = 'camper@yopmail.com';

        $subject = "Order Now";

        $mail = mail($to,$subject,$message,$headers);



        return 'done';

    }



    public function searchingForm(Request $request){
        $pick_date=strtotime($request->input("pick_date"));
        $drop_date=strtotime($request->input("drop_date"));
        $pick_loc=$request->input("pick_loc");
        $drop_loc=$request->input("drop_loc");
        $pic_city = Cities::find($pick_loc);
        $drop_city = Cities::find($drop_loc);
        $companies = Companies::orderBy('id','desc')->get();
        $categories = Categories::OrderBy('id','des')->get();
        $vehicles = Vehicles::OrderBy('id','desc')->where('city_id',$pick_loc)->orWhere('city_id', $drop_loc)->get(); 
        $search = 'search';
        $datediff = $drop_date - $pick_date;
        
        $differnce = round($datediff / (60 * 60 * 24));         
        
        return view('pages.'.$search)->with('vehicles',$vehicles)->with('companies',$companies)->with('categories',$categories)->with('categories',$categories)->with('daysnumber',$differnce+1)->with('pic_city',$pic_city)->with('drop_city',$drop_city)->with('pic_date',date("d/m/Y",$pick_date))->with('drop_date',date("d/m/Y",$drop_date));
    }
    
    //--------------------------edited by azeem----------------------------------------
    public function getVehiclesByCompany(Request $request)
    {   
        $pic_city   = $request->input("from_city");
        $drop_city  = $request->input("drop_city");
        $pick_date  = $request->input("pic_date");
        $drop_date  = $request->input("drop_date");
        $differnce  = $request->input("number_days");
        $vehicles   = Vehicles::OrderBy('id','desc')->where('company_id',$request->input('company_id'))->get(); 
        $vehicle_number = count($vehicles);           
        if($vehicles)
        {
          $search = 'search_company';                
          return view('pages.'.$search)->with('companyvehicle',$vehicles)->with('vehicle_number',$vehicle_number)->with('daysnumber',$differnce)->with('pic_city',$pic_city)->with('drop_city',$drop_city)->with('pic_date',$pick_date)->with('drop_date',$drop_date);
        } else {
            $message ="Sorry there no found search result";   
            $vehicles="";
            $vehicle_number = "";   
            return view('pages.'.$search)->with('companyvehicle',$vehicles)->with('vehicle_number',$vehicle_number)->with('message',$message);
        }
    }
    
    public function getVehiclesByCategory(Request $request)
    {
        $pic_city=$request->input("from_city");
        $drop_city=$request->input("drop_city");
        $pick_date=$request->input("pic_date");
        $drop_date=$request->input("drop_date");
        $differnce=$request->input("number_days");
        $category_id = $request->input('category_id');
        $vehicles = \DB::table("camp_vechicle")
                    ->select("camp_vechicle.*")
                    ->whereRaw("find_in_set('".$category_id."',camp_vechicle.category_id)")
                     ->get();
        //$vehicles = Vehicles::orderBy('id','desc')->whereRaw("find_in_set($category_id,'category_id')")->get();
        //$vehicles = Vehicles::OrderBy('id','desc')->collect('category_id',$category_id)->all();       
        
        $search = 'search_categories';
        return view('pages.'.$search)->with('categoryvehicle',$vehicles)->with('daysnumber',$differnce)->with('pic_city',$pic_city)->with('drop_city',$drop_city)->with('pic_date',$pick_date)->with('drop_date',$drop_date);
    }


}