<?php

namespace App\Http\Controllers\Admin\CamerPages;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\CamperPages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CamperPagesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //---------------------------------------list of all pages------------------------------
    public function index()
    {
        $pages = CamperPages::OrderBy('id','desc')->get();
        return view('admin.camperpages.index',array('page_title'=>"Admin Dashboard pases",'campages'=>$pages)); 
    }
    
    //------------------------------------create new page-----------------------------------
    public function createPage()
    {
        return view('admin.camperpages.create',array('page_title'=>"Admin Dashboard Create page"));
    }
    //-------------------------------add in database---------------------------------------
    public function create(Request $request)
    {
        $pages =  new CamperPages();
        $pages->title             =    $request->input('page_title');
        $pages->meta_title        = $request->input('meta_title');
        $pages->meta_tags         = $request->input('meta_tags');
        $pages->meta_decription   = $request->input('meta_decription');
        $pages->page_url          = $request->input('page_url');
        $pages->page_description  = $request->input('page_description');
        $pages->status            = 1;
        $pages->created_at        = date("Y-m-d H:i:s");
        $pages->updated_at        = date("Y-m-d H:i:s");        
        $pages->save();
        return redirect('admin/camper-pages')->withMessage('CMS Page Successfuly Created.');
    }
    //------------------------------update Page-------------------------------------------
    public function updatePage($page_id)
    {
        $pages = CamperPages::find($page_id);
        return view('admin.camperpages.edit',array('page_title'=>"Admin Dashboard Create page",'campages'=>$pages));
    }
    //--------------------------------update data in database----------------------------
    public function update(Request $request)
    {
        $pages = CamperPages::find($request->input('page_id'));
        if($pages)
        {
            $pages->title             = $request->input('page_title');
            $pages->meta_title        = $request->input('meta_title');
            $pages->meta_tags         = $request->input('meta_tags');
            $pages->meta_decription   = $request->input('meta_decription');
            $pages->page_url          = $request->input('page_url');
            $pages->page_description  = $request->input('page_description');
            $pages->updated_at        = date("Y-m-d H:i:s");        
            $pages->save();
        return redirect('admin/camper-pages')->withMessage('CMS Page Successfuly Created.');
        }else
        {
            return redirect('admin/camper-pages')->withMessage('CMS Page does not exists.');
        }
    }
    //-------------------------------delete page----------------------------------------
    public function destroy($page_id)
    {
        $pages = CamperPages::find($page_id);   
        $pages->delete();     
        return Redirect::back()->withMessage('Page Successfuly deleted.');
    }
    
    
}
