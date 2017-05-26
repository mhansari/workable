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
use Image;
class EmployersController extends Controller {
	
	public function index()
	{

		
		$countries = Countries::all()->lists('Name', 'id');
		$questions = SecurityQuestion::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');

		return view('employers::index', compact('countries','states', 'cities','questions'));
	}
	public function home($country)
	{
		$user = SiteUsers::find(Auth::user()->id);
		return view('employers::home')->with('user', $user)->with('country',$country);
	}
	public function dashboard($country)
	{
		$user = SiteUsers::find(Auth::user()->id);
		$interviews = \App\Interview::with(['jobs','vanue'])->where('user_id','=',Auth::user()->id)->get();
		return view('employers::dashboard')->with('interviews',$interviews  )->with('user', $user)->with('country',$country);
	}
	public function register($country,$id=0)
	{
		$countries = Countries::all()->lists('Name', 'id');
		$questions = SecurityQuestion::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');

		return view('employers::register', compact('countries','states', 'cities','questions'))->with('msg','')->with('ut',$id)->with('country',$country);
	}

	public function login($country)
	{
	//	echo Auth::check();
		return view('employers::login')->with('msg','')->with('country',$country);
	}
	public function logout($country)
	{
		Auth::logout();
		Session::flush();
		return Redirect::to('/'.$country);
	}
	public function success()
	{
		return view('employers::register+success')->with('msg','');
	}
	public function createUser(Request $request,$country='pk')
	{
		//var_dump($request);
		$users = SiteUsers::select('id')->where('Email', '=',$request->input('email'))->get();

		if(count($users)>1)
		{
			$countries = Countries::all()->lists('Name', 'id');
			$questions = SecurityQuestion::all()->lists('Name', 'id');
			$states = array();//States::all()->lists('Name', 'id');
			$cities = array();//Cities::all()->lists('Name', 'id');
			Session::set('msg', "Email address already exists.");
			return Redirect::to('create')->withInput(Input::except('password', 'password_confirm'))->with('msg','Email address already exists.');
		}
		else
		{
			if($request->input('firstname'))
			{
					$user = new SiteUsers;
					$company_info = new CompanyInfo;
					$po = \App\PrivacyOptions::where('active','=',1)->get();
					$user->first_name = $request->input('firstname');
					$user->last_name = $request->input('lastname');
					$user->gender = $request->input('gender');
					$user->dob = date("Y-m-d",strtotime($request->input('dob')));
					$company_info->country_id = $user->country_id = $request->input('CountryID');
					$company_info->state_id = $user->state_id = $request->input('StateID');
					$company_info->city_id = $user->city_id = $request->input('CityID');
				//	$user->mobile_prefix = $request->input('mobile-prefix');
					$company_info->mobile = $user->mobile_phone = $request->input('mobile_number');
					$user->email = $request->input('email');
					$user->password = Hash::make($request->input('confirm_password'));
					$user->question_id = $request->input('QuestionID');
					$user->answer = $request->input('security_answer');
					$user->newsletter = ($request->input('newsletter')==''?'0':'1');
					//$user->user_type = $request->input('ut');
					$code = str_random(10);
					$user->code = $code;
					$user->suspended = '0';
					$user->active = 1;
					$user->save();
					$company_info->user_id = $user->id;
					$company_info->save();

					foreach($po as $p)
					{
						$ups = new \App\UserPrivacySettings();
						$ups->user_id =  $user->id;
						$ups->privacy_settings_id = $p->id;
						$ups->visible = 1;
						$ups->save();
					}
					$n = new \App\Notifications();

					$n->user_id =  $user->id;
					$n->service_alerts =1;
					$n->messages =1;
					$n->new_applications =1;
					$n->closing_jobs =1;
					$n->daily_jobs_alerts =1;
					$n->country_id =$user->country_id;
					$n->state_id = $user->state_id;
					$n->city_id = $user->city_id;
					$n->save();
					//$this->activationEmail( $user->FirstName . ' ' . $user->LastName, $user->Email, $code);
					Session::set('msg', "Your account has created, Activation link has been emailed on the provided email address.");
					return Redirect::to($country . '/employers/success/' . $request->input('ut'));


			}

		}
		
	}

	public function dologin(Request $request,$country)
	{
		//print_r($request);
		$data = array(
					'email' => $request->input('email'), 
					'password' => $request->input('password'),
				//	'user_type' => $request->input('ut'),
					);
		$r = (Input::has('remember')) ? true : false;
        if (Auth::attempt($data, $r)) {
          	$user = Auth::user();
          	if(!$user->active)
          	{
          		Session::set('msg', "Your account has not activated yet, please activate your account.");
				return Redirect::to($country . '/account/login/' . $request->input('ut'))->withInput(Input::except('password'));
          		//return response()->json(['error' => 'Your account has not activated yet, please activate your account.']);
          	}

          	if($user->suspended == 1)
          	{
          		Session::set('msg', "Your account has suspended, contact support for more information.");
				return Redirect::to($country . '/account/login/' . $request->input('ut'))->withInput(Input::except('password'));
          		//return response()->json(['error' => 'Your account has suspended, contact support for more information']);
          	}
        //  	if($user->user_type==1){
          		return Redirect::to($country . '/account/home');
          //	}
          	//else{
          		//return Redirect::to('seeker/home');
          	//}
        }
        else
        {
        	Session::set('msg', "Invalid credentials.");
			return Redirect::to($country . '/account/login')->withInput(Input::except('password'));
        	//return response()->json(['error' => 'Invalid credentials.']);
        }
    
	
	}

	private function activationEmail($name, $email, $code)
	{
		$url= App::make('url')->to('/') . $country . '/employers/activate/'. $code;
		Mail::send('emails.test', ['link' => $url, 'name'=>$name, 'email'=>$email], function ($m) use ($email, $name){
					//$m->from('info@localhost', 'GetHired.pk');
					$m->to($email, $name)->subject('JobStreet.pk - Activate your account');
        		}
        );
	}
	public function activate($code)
	{
		$users = SiteUsers::select('id')->where('code', '=',$code)->get();
		//echo $users[0]->id;
		if(count($users)>0)
		{
			$user = SiteUsers::find($users[0]->id);
			if($user->Active)
			{
				return Redirect::to('messages/already_activated');
			}
			else
			{
				$user->Active = 1;
				$user->save();
				return Redirect::to('messages/user_activated');
			}
		}
		else
		{
			return Redirect::to('messages/invalid_activation_code');
		}
	}

	public function show($country,$id)
	{
		$c = App\Config::all()->keyBy('k');
		$company = CompanyInfo::with(['city','country','categories','inctype','jobs'])->find($id);
		//$latest = $company->jobs()->orderBy('created_at', 'desc')->get();
		$latest = App\Jobs::where('user_id',$id)->where('active',1)->orderBy('created_at', 'desc')->limit(30)->get();

		return view('employers::show')->with('company',$company)->with('latest',$latest)->with('config',$c)->with('country',$country);
	}
	public function profile_picture($country)
	{
		$user = SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		return view('seeker::pp')->with('user',$user)->with('sections', $sections)->with('country',$country)->with('obj',$obj);
	}

	public function upload_profile_picture($country)
	{
		$user = SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();

		if(Input::file())
        {
            $image = Input::file('logo');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('pp/' . $filename);
 			@unlink(public_path( $profile->pp ));
        
                Image::make($image->getRealPath())->resize(150, 150,function($constraint){
                	$constraint->aspectRatio();
                	//$constraint->upsize();
                })->save($path);
                
                $user->pp = 'pp/' . $filename;
           }

           $user->save();
				return view('seeker::pp')->with('user',$user)->with('sections', $sections)->with('country',$country)->with('obj',$obj);
	}

	public function profile($country)
	{
		$countries = Countries::all()->lists('Name', 'id');
		$questions = SecurityQuestion::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		$user = SiteUsers::find(Auth::user()->id);
		return view('employers::profile', compact('countries','states', 'cities','questions'))->with('user',$user)->with('country',$country);
	}

	public function updateprofile($country,Request $request)
	{
		if($request->input('firstname'))
		{
			$user = SiteUsers::find(Auth::user()->id);
			$user->first_name = $request->input('firstname');
			$user->last_name = $request->input('lastname');
			$user->gender = $request->input('gender');
			$user->dob = date("Y-m-d",strtotime($request->input('dob')));
			$user->country_id = $request->input('CountryID');
			$user->state_id = $request->input('StateID');
			$user->city_id = $request->input('CityID');
			$user->mobile_phone = $request->input('mobile_number');
			
			$user->save();
			Session::set('flash_message', "Profile updated.");
			return Redirect::to($country .'/employers/profile');
		}
	}

	public function privacy($country)
	{
		$privacy_options = \App\UserPrivacySettings::with(['options'])->where('user_id','=',Auth::user()->id)->get();

		return view('employers::privacy')->with('privacy_options',$privacy_options)->with('country',$country);
	}

	public function jobalerts($country)
	{
		$industries = \App\Categories::where('active', 1)->lists('Name', 'id');
		$notifications = \App\Notifications::find(Auth::user()->id);
		$countries = Countries::all()->lists('Name', 'id');
		$states = States::where('CountryID','=',$notifications->country_id)->lists('Name', 'id');
		$cities = Cities::where('StateID','=',$notifications->state_id)->lists('Name', 'id');

		//print_r($notifications);
		return view('employers::job-alerts', compact('industries','countries','states', 'cities'))->with('notifications',$notifications)->with('country',$country);
	}
	public function updatejobalerts($country,Request $req)
	{
		$cities = implode(",",$req->input('CityID'));
		$states = implode(",",$req->input('StateID'));
		$categories = implode(",",$req->input('CategoryID'));
		$notifications = \App\Notifications::find(Auth::user()->id);
		$notifications->service_alerts = $req->input('service_alerts');
		$notifications->messages =$req->input('messages');
		$notifications->new_applications = $req->input('new_applications');
		$notifications->closing_jobs =$req->input('closing_jobs');
		$notifications->daily_jobs_alerts =$req->input('daily_jobs_alerts');
		$notifications->category_id = $categories;
		$notifications->country_id = $req->input('CountryID');
		$notifications->state_id = $states;
		$notifications->city_id = $cities;
		$notifications->save();
		Session::set('flash_message', "Alerts updated.");
		return Redirect::to($country .'/employers/job-alerts');
	}
	public function updatePrivacy($country,Request $req)
	{
		$pv = $req->input('pv');

		\App\UserPrivacySettings::where('user_id','=',Auth::user()->id)
			->update(['visible' => 0]);

		for($i=0;$i<count($pv); $i++)
		{
			\App\UserPrivacySettings::where('privacy_settings_id', '=', 
				$pv[$i])
			->where('user_id','=',Auth::user()->id)
			->update(['visible' => 1]);

		}
		Session::set('flash_message', "Privacy Settings updated.");
		return Redirect::to($country .'/employers/privacy');
	}
}