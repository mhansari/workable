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
		//echo "i am home";
		return view('employers::home');
	}
	public function createUser(Request $request)
	{
			
		$users = SiteUsers::select('id')->where('Email', '=',$request->input('email'))->get();

		if(count($users)>0)
		{
			return response()->json(['error' => 'Email address already exists.']);
		}
		else
		{
			if($request->input('firstname'))
			{
					 $user = new SiteUsers;
					 $user->first_name = $request->input('firstname');
					$user->last_name = $request->input('lastname');
					$user->gender = $request->input('gender');
					$user->dob = date("Y-m-d",strtotime($request->input('dob')));
					$user->country_id = $request->input('country');
					$user->state_id = $request->input('state');
					$user->city_id = $request->input('city');
					$user->mobile_prefix = $request->input('mobile-prefix');
					$user->mobile_phone = $request->input('mobile-number');
					$user->email = $request->input('email');
					$user->password = Hash::make($request->input('pwd'));
					$user->question_id = $request->input('question');
					$user->answer = $request->input('answer');
					$user->newsletter = ($request->input('newsletter')==''?'0':'1');
					$user->user_type = '1';
					$code = str_random(10);
					$user->code = $code;
					$user->suspended = '0';
					 $user->active = '0';
					$user->save();
					$this->activationEmail( $user->FirstName . ' ' . $user->LastName, $user->Email, $code);


					return response()->json(['success' => 'Your account has created, Activation link has been emailed on the provided email address.']);


			}

		}
		
	}

	public function login(Request $request)
	{
		$data = array(
					'email' => $request->input('email'), 
					'password' => $request->input('pwd'),
					);
		$r = (Input::has('remember_me')) ? true : false;
        if (Auth::attempt($data, $r)) {
          	$user = Auth::user();
          	if(!$user->active)
          	{
          		return response()->json(['error' => 'Your account has not activated yet, please activate your account.']);
          	}

          	if($user->suspended == 1)
          	{
          		return response()->json(['error' => 'Your account has suspended, contact support for more information']);
          	}
          	if($user->user_type==1){

          	 return response()->json(['success' => 'employer']);
          	}
          	else{
          		return response()->json(['success' => 'seeker']);
          	}
        }
        else
        {
        	return response()->json(['error' => 'Invalid credentials.']);
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
	
}