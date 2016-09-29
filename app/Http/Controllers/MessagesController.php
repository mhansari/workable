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
class MessagesController extends Controller {
	
	public function already_activated()
	{

		return view('messages.already_activated');
	}
	public function invalid_activation_code()
	{

		return view('messages.invalid_activation_code');
	}
	public function user_activated()
	{

		return view('messages.user_activated');
	}
}