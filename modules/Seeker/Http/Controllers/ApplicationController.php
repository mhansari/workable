<?php namespace Modules\Seeker\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Input;
use Session;
use App\Resume;
use Auth;
use PDF;
class ApplicationController extends Controller {
	
	public function changeStatus(Request $request)
	{
		$data = json_decode(stripslashes($request->input('data')));		
		$data = explode(',',$data);
		$values=array('status_id'=>$request->input('status'));
		echo \App\Applied::whereIn('id',$data)->update($values);		
	}
}