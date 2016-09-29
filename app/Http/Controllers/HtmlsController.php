<?php namespace App\Http\Controllers;

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
class HtmlsController extends Controller {
	
	public function login_html()
	{

		return view('htmls.login_modal');
	}
	public function signup_html()
	{

		$countries = Countries::all()->lists('Name', 'id');
		$questions = SecurityQuestion::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');

		
		return view('htmls.signup_modal', compact('countries','states', 'cities','questions'));
	}
	public function department_html()
	{

		$countries = Countries::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');

		
		return view('htmls.department_modal', compact('countries','states', 'cities'));
	}
	public function user_activated()
	{

		return view('messages.user_activated');
	}
}