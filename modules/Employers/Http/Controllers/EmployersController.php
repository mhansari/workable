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
class EmployersController extends Controller {
	
	public function index()
	{

		
		$countries = Countries::all()->lists('Name', 'id');
		$questions = SecurityQuestion::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');

		return view('employers::index', compact('countries','states', 'cities','questions'));
	}
	public function home()
	{
		$user = SiteUsers::find(Auth::user()->id);
		return view('employers::home')->with('user', $user);
	}
	public function dashboard()
	{
		$user = SiteUsers::find(Auth::user()->id);
		return view('employers::dashboard')->with('user', $user);
	}
	public function register($id)
	{
		$countries = Countries::all()->lists('Name', 'id');
		$questions = SecurityQuestion::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');

		return view('employers::register', compact('countries','states', 'cities','questions'))->with('msg','')->with('ut',$id);
	}

	public function login()
	{
	//	echo Auth::check();
		return view('employers::login')->with('msg','');
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
	public function createUser(Request $request)
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
					$user->user_type = $request->input('ut');
					$code = str_random(10);
					$user->code = $code;
					$user->suspended = '0';
					$user->active = '0';
					$user->save();
					$company_info->user_id = $user->id;
					$company_info->save();
					//$this->activationEmail( $user->FirstName . ' ' . $user->LastName, $user->Email, $code);
					Session::set('msg', "Your account has created, Activation link has been emailed on the provided email address.");
					return Redirect::to('employers/success/' . $request->input('ut'));


			}

		}
		
	}

	public function dologin(Request $request)
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
				return Redirect::to('account/login/' . $request->input('ut'))->withInput(Input::except('password'));
          		//return response()->json(['error' => 'Your account has not activated yet, please activate your account.']);
          	}

          	if($user->suspended == 1)
          	{
          		Session::set('msg', "Your account has suspended, contact support for more information.");
				return Redirect::to('account/login/' . $request->input('ut'))->withInput(Input::except('password'));
          		//return response()->json(['error' => 'Your account has suspended, contact support for more information']);
          	}
        //  	if($user->user_type==1){
          		return Redirect::to('account/home');
          //	}
          	//else{
          		//return Redirect::to('seeker/home');
          	//}
        }
        else
        {
        	Session::set('msg', "Invalid credentials.");
			return Redirect::to('account/login')->withInput(Input::except('password'));
        	//return response()->json(['error' => 'Invalid credentials.']);
        }
    
	
	}

	private function activationEmail($name, $email, $code)
	{
		$url= App::make('url')->to('/') . '/employers/activate/'. $code;
		Mail::send('emails.test', ['link' => $url, 'name'=>$name, 'email'=>$email], function ($m) use ($email, $name){
					//$m->from('info@localhost', 'GetHired.pk');
					$m->to($email, $name)->subject('Gethired.pk - Activate your account');
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

	public function show($id)
	{
		$c = App\Config::all()->keyBy('k');
		$company = CompanyInfo::with(['city','country','categories','inctype','jobs'])->find($id);
		//$latest = $company->jobs()->orderBy('created_at', 'desc')->get();
		$latest = App\Jobs::where('user_id',$id)->where('active',1)->orderBy('created_at', 'desc')->limit(30)->get();

		return view('employers::show')->with('company',$company)->with('latest',$latest)->with('config',$c);;
	}
	
}