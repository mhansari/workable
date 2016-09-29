<?php namespace Modules\Employers\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class JobsController extends Controller {
	
	public function index()
	{
		return view('employers::index');
	}
	
}