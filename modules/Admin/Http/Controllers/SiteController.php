<?php 

namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
class SiteController extends Controller {
	
	public function index()
	{
		return view('admin::index');
	}

	public function login(Request $request)
	{
	

		$users = DB::table('admin_users')
                    ->whereEmailAndPasswordAndActive($request['Username'],$request['password'],1)
                    ->first();
        if($users)
        {
			$request->session()->put('uid',$users->ID);
			return Redirect::to('admin/dashboard');
        }
        else
        {
        	\Session::flash('error_login', 'Please check your Username or Password.');
        	return view('admin::login');
        }
		return view('admin::login');
	}
	
}