<?php namespace Modules\Seeker\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class SeekerController extends Controller {
	
	public function dashboard()
	{
		return view('seeker::dashboard');
	}
	public function myresumes()
	{
		return view('seeker::myresumes');
	}

	
}