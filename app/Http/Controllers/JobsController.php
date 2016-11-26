<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs;
use App\AdType;
use App\Countries;
use DB;
use App\Departments;
use Auth;
use App\Categories;
use App\ExperianceLevels;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon ;
use App\Config;
use App\JobCities;
use Yajra\Datatables\Datatables;
use Session;
class JobsController extends Controller
{
    public function postJob()
	{
		$adtypes = AdType::select(
        DB::raw("CONCAT(name, ' - PKR-' ,price, ' for ', duration_unit, ' day(s)') AS name, id")
    )->lists('name', 'id');
$depts = Departments::where('employer_id', Auth::user()->id)->lists('name', 'id');
		$countries = Countries::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		return view('employers::post-job',compact('depts','adtypes','countries','states', 'cities'));
	}


	public function listbycategory($country,$seo)
	{
		$c = Config::all()->keyBy('k');
		$j = \App\Jobs::select('jobs.*')->with(['categories','adtype','jobtype','cities','companies'])->join('categories', 'categories.id', '=', 'category_id')->where('categories.seo',$seo)->get();		

		$cntry = Countries::where('active',1)->where('seo',$country)->first();
		$el = ExperianceLevels::where('active',1)->orderBy('name')->lists('name','id');
		$obj2 = Categories::where('active',1)->orderBy('name')->lists('name','id');

		return view('search', compact('obj2','el'))->with('cntry', $cntry)->with('j',$j)->with('config',$c);
	}

	public function jobsbycompnay($id)
	{
		$c = Config::all()->keyBy('k');
		$j = \App\Jobs::with(['adtype','jobtype','cities','countries'])->where('user_id', '=',$id)->get();		
		$cntry = Countries::where('active',1)->where('seo',$country)->first();
		$el = ExperianceLevels::where('active',1)->orderBy('name')->lists('name','id');
		$obj2 = Categories::where('active',1)->orderBy('name')->lists('name','id');
		return view('search', compact('obj2','el'))->with('cntry', $cntry)->with('j',$j)->with('config',$c);
	}

	public function viewjob($id)
	{
		$c = Config::all()->keyBy('k');
		$j = \App\Jobs::with(['benefits','experiance','adtype','jobtype','cities','countries','companies'])->where('id', '=',$id)->first();		
		return view('employers::view-job')->with('j',$j)->with('config',$c);
	}

	public function myjobs()
	{
		$id=0;
		$c = Config::all()->keyBy('k');
		$j = \App\Jobs::with(['benefits','experiance','adtype','jobtype','cities','countries','companies'])->where('id', '=',$id)->first();		
		return view('employers::myjobs')->with('j',$j)->with('config',$c);
	}
	public function myjobsajax()
	{
		//DB::statement(DB::raw('set @rownum=0'));
      //  $adtypes = \App\JobType::select(DB::raw('@rownum := 0 r'))
        //->select(DB::raw('@rownum := @rownum + 1 AS sno'),'job_type.*');
$j = \App\Jobs::with(['applications','users','benefits','experiance','adtype','jobtype','cities','countries','companies'])->where('user_id', '=',26)->get();		
    
        return Datatables::of($j)->addColumn('Actions',function($model){
        	//print_r($model);
        return '<a class="fa fa-edit" href="job-type/edit/' . $model->id . '"></a> | <a onclick="return confirm(\'Are you sure you want to delete ' . $model->Name . '\')" class="fa fa-remove" href="job-type/delete/' . $model->id . '"></a> ';
    })->editColumn('active', '
                  @if($active)
                        Yes
                  @else
                         No
                  @endif'
        )->make(true);
	}

	public function apply($jobid)
	{
		$obj = \App\Jobs::with(['shift_timings','cities','countries','careerlevel','experiancelevel'])->find($jobid)->first();
		var_dump($obj->cities);
		$resumes = \App\Resume::where('user_id', '=',Auth::user()->id)->where('active', '=',1)->lists('title','id');
		return view('seeker::apply',compact('resumes'))->with('obj',$obj);
	}

	public function doApply(Request $request)
	{
		$obj = \App\Applied::where('user_id','=',Auth::user()->id)->where('job_id','=',$request->get('job_id'))->get();
		var_dump($obj);
		if(count($obj)<1)
		{
			$obj = new \App\Applied;	
			$obj->user_id = Auth::user()->id;
			$obj->job_id = $request->get('job_id');
			$obj->resume_id = $request->get('resume');
			$obj->additional_comments = $request->get('comments');
			$obj->save();
			Session::flash('flash_message', 'You have successfully applied for this job.');
           	return Redirect::to('jobs/'.$request->get('job_id'));	
		}
		else
		{
			Session::flash('flash_message', 'You have already applied for this job.');
           	return Redirect::to('jobs/'.$request->get('job_id'));
		}
	}

	public function search(Request $request,$country)
	{
		$j =null;
		if(!$request->get('category_id'))
		{
			$j = \App\Jobs::with(['categories','adtype','jobtype','cities','companies'])->where('job_title','LIKE', '%'.$request->get('keywords') .'%')->orWhere('required_skills','LIKE', '%'.$request->get('keywords') .'%')->get();		
		}
		else
		{
			$j = \App\Jobs::with(['categories','adtype','jobtype','cities','companies'])->where('category_id',$request->get('category_id'))->orWhere('job_title','LIKE', '%'.$request->get('keywords') .'%')->orWhere('required_skills','LIKE', '%'.$request->get('keywords') .'%')->get();		
		}
		$c = Config::all()->keyBy('k');
		

		$cntry = Countries::where('active',1)->where('seo',$country)->first();
		$el = ExperianceLevels::where('active',1)->orderBy('name')->lists('name','id');
		$obj2 = Categories::where('active',1)->orderBy('name')->lists('name','id');

		return view('search', compact('obj2','el'))->with('cntry', $cntry)->with('j',$j)->with('config',$c);
	}
}
