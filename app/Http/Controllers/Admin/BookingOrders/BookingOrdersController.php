<?php

namespace App\Http\Controllers\Admin\BookingOrders;
use App\BookingOrders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //-----------------------------list of all orders-----------------------------
    public function index()
    {
       $orders = BookingOrders::Latest('id','dess')->get();
       return view('admin.bookingorders.index',array('page_title'=>"Admin Dashboard Booking Orders",'orders'=>$orders));
    }
    
    //-------------------------view order detail---------------------------------
    public function viewOrder($order_id)
    {
        $orders = BookingOrders::find($order_id);
        if($order_id)
        {
            return view('admin.bookingorders.view-order',array('page_title'=>"Admin Dashboard Booking Orders",'order'=>$orders));
        }else
        {
            return redirect('admin/booking-orders')->withErrors('Booking order does not exits');
        }
        
    }
    //--------------------------delete order------------------------------------
    public function destroy($order_id)
    {
        
    }
    
    
    
    
}
