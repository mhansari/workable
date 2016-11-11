<?php namespace Modules\Seeker\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class SeekerController extends Controller {
	
	public function index()
	{
		return view('seeker::index');
	}
	
}