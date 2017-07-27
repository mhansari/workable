<?php namespace Modules\Employers\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Countries;
use App\States;
use App\Cities;
use App\SecurityQuestion;
use App\SiteUsers;
use DB;
use Input;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;
use Mail;
use App;
use Auth;
use Hash;
use App\CompanyInfo;
use App\Categories;
use App\IncorporationType;
use Image;
class CompanyInfoController extends Controller {
	
	public function updateCompnay($country)
	{
		$countries = Countries::where('active',1)->orderBy('name')->lists('Name', 'id');
		$categories = Categories::where('active',1)->orderBy('name')->lists('name','id');
		$inc = IncorporationType::where('active',1)->orderBy('name')->lists('name','id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		$ci = CompanyInfo::where('user_id',Auth::user()->id)->first();
		if(!$ci)
			$ci = new CompanyInfo;
		return view('employers::update_company_info', compact('countries','states', 'cities','categories','inc'))->with('ci',$ci)->with('country',$country);
	}

	public function changePassword($country)
	{
		$countries = Countries::where('active',1)->orderBy('name')->lists('Name', 'id');
		$categories = Categories::where('active',1)->orderBy('name')->lists('name','id');
		$inc = IncorporationType::where('active',1)->orderBy('name')->lists('name','id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		$ci = CompanyInfo::where('user_id',Auth::user()->id)->get();
		return view('employers::change_password', compact('countries','states', 'cities','categories','inc'))->with('ci',$ci)->with('country',$country);
	}

	public function updatePassword($country,Request $req)
	{
		$obj = \App\User::find(Auth::user()->id);
		
		if(!Hash::check($req->input('opwd'), $obj->password)){
			Session::flash('flash_message', 'Invalid Old Password');
	    	return redirect()->back();
    	}
    	else
    	{
    		$obj->password = Hash::make($req->input('cpwd'));
    		$obj->save();
    		Session::flash('flash_message', 'Password successfully changed.');
	    	return redirect()->back();
    	}
	}
	public function save(Request $request)
	{
		$obj = CompanyInfo::find(Auth::user()->id);
		$obj->company_name	=	$request->input('company_name');
		
		 $obj->about_company = 		$request->input('about_company');
		$obj->designation	=	$request->input('designation');
		$obj->country_id	=	$request->input('CountryID');
		$obj->state_id	=	$request->input('StateID');
		$obj->city_id	=	$request->input('CityID');
		$obj->phone	=	$request->input('phone');
		$obj->mobile	=	$request->input('mobile');
		$obj->fax	=	$request->input('fax');
		$obj->website	=	$request->input('website');
		$obj->facebook	=	$request->input('facebook');
		$obj->twitter	=	$request->input('twitter');
		$obj->google	=	$request->input('google');
		$obj->linkedin	=	$request->input('linkedin');
		$obj->business_incorporation_type	=	$request->input('incorporationtype');
		$obj->category_id	=	$request->input('CategoryID');
		$convert_date = date("Y-m-d", strtotime($request->input('incdate')));
		$obj->established_in	=	$convert_date;
		$obj->total_employees	=	$request->input('totalemp');
		$obj->alerts	=	0;
		$obj->save();
		Session::flash('flash_message', 'Company Information Updated!');

    return redirect()->back();

	}
public function cover($country)
	{
		$ci = CompanyInfo::where('user_id',Auth::user()->id)->get();
		return view('employers::upload_cover')->with('ci',$ci)->with('country',$country);
	}

	public function uploadCover($country,Request $request)
	{
		if(Input::file())
        {
            $image = Input::file('cover');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
			$obj = CompanyInfo::find(Auth::user()->id);
            $path = public_path('covers/' . $filename);
 			@unlink(public_path( $obj->company_cover ));
        
                Image::make($image->getRealPath())->resize(1168,270, function($constraint){
                	$constraint->aspectRatio();
                	$constraint->upsize();
                })->save($path);
                
                $obj->company_cover = 'covers/' . $filename;
                $obj->save();
                Session::flash('flash_message', 'Cover Updated!');
			    return Redirect::to($country . '/employers/cover');
           }
	}

	public function logo($country)
	{
		$ci = CompanyInfo::where('user_id',Auth::user()->id)->get();
		return view('employers::upload_logo')->with('ci',$ci)->with('country',$country);
	}

	public function uploadLogo(Request $request,$country)
	{
		if(Input::file())
        {
            $image = Input::file('logo');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
			$obj = CompanyInfo::find(Auth::user()->id);
            $path = public_path('logos/' . $filename);
 			@unlink(public_path( $obj->company_logo ));
        
                Image::make($image->getRealPath())->resize(150, 150,function($constraint){
                	$constraint->aspectRatio();
                	$constraint->upsize();
                })->save($path);
                
                $obj->company_logo = 'logos/' . $filename;
                $obj->save();
                Session::flash('flash_message', 'Logo Updated!');
			    return Redirect::to($country . '/employers/logo');
           }
	}
}