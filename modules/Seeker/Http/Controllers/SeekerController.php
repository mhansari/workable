<?php namespace Modules\Seeker\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Auth;
use Yajra\Datatables\Datatables;
class SeekerController extends Controller {
	
	public function dashboard($country)
	{
		return view('seeker::dashboard')->with('country',$country);
	}
	public function myresumes($country)
	{
		return view('seeker::myresumes')->with('country',$country);
	}
public function myResumeAjax()
	{
		$j = \App\Resume::with(['applications'])->where('user_id', '=',Auth::user()->id)->get();	
		return Datatables::of($j)->addColumn('Actions',function($model){
        	//print_r($model);
        return '<a class="fa fa-edit" href="manage/update-personal-information/' . $model->id . '"></a> | <a onclick="return confirm(\'Are you sure you want to delete ' . $model->title . '\')" class="fa fa-remove" href="manage/resume/delete/' . $model->id . '"></a> ';
    })->make(true);
	}
	
}