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
use Applied;
class JobsController extends Controller
{
	public function applicantsajax()
	{

		$sql = 'select a.resume_id, a.created_at, a.id as application_id,j.job_title, j.id as job_id, r.first_name, r.last_name, r.user_id from applied as a inner join (select user_id, first_name, last_name , resume_id from resume_seeker_profile) as r on r.resume_id = a.resume_id inner join (select user_id,id, job_title from jobs) as j on j.id = a.job_id where j.user_id =' . Auth::user()->id ;




$j =DB::table(DB::raw("($sql) as p"))->get();

$j = collect($j);


       return Datatables::of($j)
        ->make(true);
	}
	public function applications($country, $id, $status)
	{	
		$where_status = \App\ApplicationStatus::where('name', '=',$status)->first();
		$obj = \App\Applied::with(['personal_info','education','experiance'])->where('job_id', '=',$id)->where('status_id','=',$where_status->id)->get();
		$job_title = \App\Jobs::where('id','=',$id)->first();
		if($job_title ==null)
			$job_title = new Jobs();
		$candidates = array();
		for($i=0;$i<count($obj);$i++)
		{
			$candidates += array($obj[$i]->id => $obj[$i]->personal_info[0]->first_name);
		}

		$status = \App\ApplicationStatus::with(['applications'])->where('active', '=',1)->get();
		$status_ddl = \App\ApplicationStatus::where('active', '=',1)->lists('name','id');
		$degree = \App\DegreeLevels::where('active', 1)->lists('name','id');
		$currencies = \App\Currencies::where('active', 1)->lists('name', 'id');
		$maritalstatus = \App\MaritalStatus::where('active', 1)->lists('Name', 'id');
		return view('employers::applications',compact('maritalstatus','candidates','status_ddl','degree','currencies'))->with('job_title',$job_title)->with('status',$status)->with('obj',$obj)->with('country',$country)->with('id',$id);
	}
	public function savejob(Request $request,$country,$id=0)
	{
		DB::beginTransaction();
		try{

			$job = Jobs::find($id);

			if($job==null)
				$job = new Jobs();
			
			$job->ad_type_id = 4;
			$job->after_expiry_actions_id= $request->get('after_expiry_actions');
			$job->career_level_id= $request->get('CareerLevelID');
			$job->category_id= $request->get('CategoryID');
			$job->city_ids= implode(",",$request->get('CityID'));
			$job->country_id= $request->get('CountryID');
			$job->currency_min= $request->get('salary_min');
			$job->department_id= $request->get('DepartmentID');
			$job->description= $request->get('details');
			$job->email_resume= $request->get('email_resume');
			$job->experiance_level_id= $request->get('ExperianceLevelID');
			$job->job_expiry= $request->get('last_date');
			$job->job_title= $request->get('title');
			$job->job_type_id= $request->get('type');
			$job->number_of_positions= $request->get('NoVac');
			$job->qualifications= $request->get('Qualification');
			$job->required_skills= $request->get('skills');
			$job->required_travelling= ($request->get('traveling')==1?1:0);
			$job->salary_currency_id= $request->get('salary_currency');
			$job->salary_max= $request->get('salary_max');
			$job->shift_timings_id= $request->get('shift');
			$job->job_expiry = date("Y-m-d",strtotime($request->input('last_date')));
			$job->state_ids= implode(",",$request->get('StateID'));
			$job->user_id=  Auth::user()->id;
			$job->active = 1;
			$job->save();
			$job_id = $job->id;
			$cities = $request->get('CityID');
			$benefits = $request->get('benefits');
			\App\JobCities::where('job_id', $id)->delete();
			\App\JobBenefits::where('job_id', $id)->delete();
			for($i = 0; $i< count($cities); $i++)
			{
				$jc = new JobCities();
				$jc->job_id = $job_id;
				$jc->city_id = $cities[$i];
				$jc->save();
			}
			for($i = 0; $i< count($benefits); $i++)
			{
				$b = new \App\JobBenefits();
				$b->job_id = $job_id;
				$b->benefit_id = $benefits[$i];
				$b->save();
			}
			DB::commit();
			return Redirect::to($country . '/employers/my-jobs');
		}
		catch(\Exception $e)
		{
			DB::rollback();
			return Redirect::to($country . '/employers/post-job')
        ->withErrors( $e->getMessage() )
        ->withInput();
		}
	}
	
    public function postJob(Request $request,$country,$id=0)
	{

		$job = \App\Jobs::find($id);
		
		
		if($job==null)
			$job = new Jobs();
		$depts = Departments::where('employer_id', Auth::user()->id)->lists('name', 'id');
		$countries = Countries::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		$user = \App\SiteUsers::find(Auth::user()->id);
		$categories = \App\Categories::where('active',1)->lists('name','id');
		$career_level = \App\CareerLevels::where('active',1)->lists('name','id');
		$experiance_level = \App\ExperianceLevels::where('active',1)->lists('name','id');
		$type = \App\JobType::where('active',1)->lists('name','id');
		$shift = \App\ShiftTimings::where('active',1)->lists('name','id');
		$currency = \App\Currencies::where('active',1)->lists('name','id');
		$benefits = \App\Benefits::where('active',1)->get();
		$after_expiry_actions = \App\AfterExpiryActions::where('active',1)->lists('name','id');
		return view('employers::post-job',compact('after_expiry_actions','benefits','currency','type','shift','career_level','experiance_level','categories','depts','adtypes','countries','states', 'cities'))->with('country',$country)->with('user',$user)->with('job',$job);
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
	public function jobsbyjobtype(Request $request, $country,$jt)
	{
		$jobtype = \App\JobType::where('active',1)->where('seo',$jt)->first();
		$c = Config::all()->keyBy('k');
		$j = \App\Jobs::with(['adtype','jobtype','cities','countries'])->where('job_type_id', '=',$jobtype->id)->paginate($c['PAGE_SIZE']->v)->appends($request->input());;		
		$cntry = Countries::where('active',1)->where('seo',$country)->first();
		$el = ExperianceLevels::where('active',1)->orderBy('name')->lists('name','id');
		$obj2 = Categories::where('active',1)->orderBy('name')->lists('name','id');
		return view('search', compact('obj2','el'))->with('cntry', $cntry)->with('country', $country)->with('j',$j)->with('config',$c);
	}
	public function jobsbyshift(Request $request, $country,$shift)
	{
		$s = \App\ShiftTimings::where('active',1)->where('seo',$shift)->first();
		$c = Config::all()->keyBy('k');
		$j = \App\Jobs::with(['adtype','jobtype','cities','countries'])->where('shift_timings_id', '=',$s->id)->paginate($c['PAGE_SIZE']->v)->appends($request->input());;		
		$cntry = Countries::where('active',1)->where('seo',$country)->first();
		$el = ExperianceLevels::where('active',1)->orderBy('name')->lists('name','id');
		$obj2 = Categories::where('active',1)->orderBy('name')->lists('name','id');
		return view('search', compact('obj2','el'))->with('cntry', $cntry)->with('country', $country)->with('j',$j)->with('config',$c);
	}
	public function jobsbyexperiance(Request $request, $country,$exp)
	{
		$experiance = \App\ExperianceLevels::where('active',1)->where('seo',$exp)->first();
		$c = Config::all()->keyBy('k');

		$j = \App\Jobs::with(['adtype','jobtype','cities','countries'])->where('experiance_level_id', '=',$experiance->id)->paginate($c['PAGE_SIZE']->v)->appends($request->input());;		
		$cntry = Countries::where('active',1)->where('seo',$country)->first();
		$el = ExperianceLevels::where('active',1)->orderBy('name')->lists('name','id');
		$obj2 = Categories::where('active',1)->orderBy('name')->lists('name','id');
		return view('search', compact('obj2','el'))->with('cntry', $cntry)->with('country', $country)->with('j',$j)->with('config',$c);
	}

	public function jobsbycategory(Request $request, $country,$category)
	{
		$cat = \App\Categories::where('active',1)->where('seo',$category)->first();
		$c = Config::all()->keyBy('k');

		$j = \App\Jobs::with(['adtype','jobtype','cities','countries'])->where('category_id', '=',$cat->id)->paginate($c['PAGE_SIZE']->v)->appends($request->input());;		
		$cntry = Countries::where('active',1)->where('seo',$country)->first();
		$el = ExperianceLevels::where('active',1)->orderBy('name')->lists('name','id');
		$obj2 = Categories::where('active',1)->orderBy('name')->lists('name','id');
		return view('search', compact('obj2','el'))->with('cntry', $cntry)->with('country', $country)->with('j',$j)->with('config',$c);
	}
	public function jobsbycity(Request $request, $country,$city)
	{

		$c = Config::all()->keyBy('k');
		$j = \App\Jobs::with(['adtype','jobtype','cities'=>function ($query) use ($city) {
		    $query->where('seo', $city);
		},'countries'])->where('active', '=',1)->paginate($c['PAGE_SIZE']->v)->appends($request->input());

		if(count($j->cities)==0)
			$j = array();
		$cntry = Countries::where('active',1)->where('seo',$country)->first();
		$el = ExperianceLevels::where('active',1)->orderBy('name')->lists('name','id');
		$obj2 = Categories::where('active',1)->orderBy('name')->lists('name','id');
		return view('search', compact('obj2','el'))->with('cntry', $cntry)->with('country', $country)->with('j',$j)->with('config',$c);
	}
	public function viewjob($country,$id)
	{
		$c = Config::all()->keyBy('k');
		$j = \App\Jobs::with(['benefits','experiance','adtype','jobtype','cities','countries','companies'])->where('id', '=',$id)->first();		
		return view('employers::view-job')->with('j',$j)->with('config',$c)->with('country',$country);
	}

	public function myjobs($country)
	{
//		$id=0;
//		$c = Config::all()->keyBy('k');
//		$j = \App\Jobs::with(['benefits','experiance','adtype','jobtype','cities','countries','companies'])->where('id', '=',$id)->first();		
		return view('employers::myjobs')->with('country',$country);//->with('config',$c);
	}
	public function myjobsajax()
	{
		//echo "hi";
		//DB::statement(DB::raw('set @rownum=0'));
      //  $adtypes = \App\JobType::select(DB::raw('@rownum := 0 r'))
        //->select(DB::raw('@rownum := @rownum + 1 AS sno'),'job_type.*');
$j = \App\Jobs::with(['applications','users','benefits','experiance','adtype','jobtype','cities','countries','companies'])->where('user_id', '=',Auth::user()->id)->orderBy('created_at','asc')->get();		
    //var_dump($j);
        return Datatables::of($j)->addColumn('Actions',function($model){
        	//print_r($model);
        return '<a class="fa fa-edit" href="jobs/post-job/' . $model->id . '"></a> | <a onclick="return confirm(\'Are you sure you want to delete ' . $model->Name . '\')" class="fa fa-remove" href="jobs/delete/' . $model->id . '"></a> ';
    })->editColumn('active', '
                  @if($active)
                        Yes
                  @else
                         No
                  @endif'
        )->make(true);
	}

	public function apply($country,$jobid)
	{

		$obj = \App\Jobs::with(['shift_timings','cities','countries','careerlevel','experiancelevel'])->find($jobid)->first();
		$resumes = \App\Resume::where('user_id', '=',Auth::user()->id)->where('active', '=',1)->lists('title','id');
		return view('seeker::apply',compact('resumes'))->with('obj',$obj)->with('jobid',$jobid)->with('country',$country);
	}

	public function deleteJob($country,$id)
	{
		DB::beginTransaction();
		try{
			\App\Jobs::where('id',$id)->delete();
		
			DB::commit();
			return Redirect::to($country . '/employers/my-jobs');
		}
		catch(\Exception $e)
		{
			var_dump($e);
			DB::rollback();
			//return Redirect::to('employers/my-jobs');
		}
		
	}

	public function doApply(Request $request,$country)
	{
		
		$obj = \App\Applied::where('user_id','=',Auth::user()->id)->where('job_id','=',$request->get('job_id'))->get();
		if(count($obj)<1)
		{
			$obj = new \App\Applied;	
			$obj->user_id = Auth::user()->id;
			$obj->job_id = $request->get('job_id');
			$obj->resume_id = $request->get('resume');
			$obj->additional_comments = $request->get('comments');
			$obj->status_id =1;
			$obj->save();
			Session::flash('flash_message', 'You have successfully applied for this job.');
           	return Redirect::to($country . '/jobs/'.$request->get('job_id'));	
		}
		else
		{
			Session::flash('flash_message', 'You have already applied for this job.');
           	return Redirect::to($country . '/jobs/'.$request->get('job_id'));
		}
	}

	public function search(Request $request,$country,\App\Jobs $user)
	{
		$c = Config::all()->keyBy('k');

		$user = $user->with(['categories','adtype','jobtype','cities','companies','shift'])->newQuery();
		if ($request->has('category_id') !='') {
		    $user->where('category_id', $request->input('category_id'));
		}
		if ($request->has('keywords') !='') {
		    $user->where('job_title','LIKE', '%'.$request->input('keywords') .'%')->orWhere('required_skills','LIKE', '%'.$request->input('keywords') .'%');
		}


	
		$j = $user->paginate($c['PAGE_SIZE']->v)->appends($request->input());
		

		$cntry = Countries::where('active',1)->where('seo',$country)->first();
		$el = ExperianceLevels::where('active',1)->orderBy('name')->lists('name','id');
		$obj2 = Categories::where('active',1)->orderBy('name')->lists('name','id');
		
		return view('search', compact('obj2','el'))->with('cntry', $cntry)->with('country',$country)->with('j',$j)->with('config',$c);
	}

	public function advsearch(Request $request,$country, \App\Jobs $user)
	{
		$c = Config::all()->keyBy('k');
		$user = $user->with(['categories','adtype','jobtype','cities','companies','shift'])->newQuery();

		if ($request->has('category_id') !='') {
		    $user->where('category_id', $request->input('category_id'));
		}
		if ($request->has('experiance_id') !='') {
		    $user->where('experiance_level_id', $request->input('experiance_id'));
		}
		if ($request->has('MinS') !='') {
		    $user->where('currency_min','>=', $request->input('MinS'));
		}
		if ($request->has('MaxS') !='') {
		    $user->where('salary_max','<=', $request->input('MaxS'));
		}
		$j = $user->paginate($c['PAGE_SIZE']->v)->appends($request->input());

		$cntry = Countries::where('active',1)->where('seo',$country)->first();
		$el = ExperianceLevels::where('active',1)->orderBy('name')->lists('name','id');
		$obj2 = Categories::where('active',1)->orderBy('name')->lists('name','id');
		
		return view('search', compact('obj2','el'))->with('cntry', $cntry)->with('country',$country)->with('j',$j)->with('config',$c);
	}

	public function mySavedJobs($country)
	{
		return view('seeker::mysavedjobs')->with('country',$country);
	}
	public function myApplicationOnJobs($country,$resumeid)
	{
		return view('seeker::myapplicationonjobs')->with('country',$country)->with('resumeid',$resumeid);
	}
	public function withdraw($country,$id)
	{
		$o = \App\Applied::find($id);
		$resume_id = $o->resume_id;
		$o->delete();
		return Redirect::to($country . '/seekers/my-application-on-jobs/' . $resume_id);
		
	}
	public function myApplicationOnJobsAjax($country,$resumeid)
	{
		$j = \App\Applied::with(['jobs','status'])->where('user_id', '=',Auth::user()->id)->where('resume_id', '=',$resumeid)->get();		
	   // print_r($j);
	       return Datatables::of($j)->addColumn('Actions',function($model) use ($country){
	        return '<a onclick="return confirm(\'Are you sure you want to withdraw application for ' . $model->jobs->job_title . '\')" href="'. asset($country . "/seekers/withdraw/" . $model->id).'">Withdraw</a> ';
   		 })->addColumn('Seen',function($model){



	        return '<span'. ($model->seen ? ' class="fa fa-check"' : "") . '> </span>';
   		 })->make(true);
	}

	public function myApplications($country)
	{
		return view('seeker::myapplications')->with('country',$country);
	}
	public function myApplicationsAjax()
	{
		$j = \App\Applied::with(['jobs','status'])->where('user_id', '=',Auth::user()->id)->get();		
	        return Datatables::of($j)->addColumn('Actions',function($model){
	        return '<a onclick="return confirm(\'Are you sure you want to withdraw application for ' . $model->jobs->job_title . '\')" href="'. asset("delete/" . $model->job_id).'">Withdraw</a> ';
   		 })->addColumn('Seen',function($model){



	        return '<span'. ($model->seen ? ' class="fa fa-check"' : "") . '> </span>';
   		 })->make(true);
	}

	public function mysavedjobsajax($country)
	{
		//$j = \App\SavedJobs::with(['jobs','companies'])->where('user_id', '=',Auth::user()->id)->get();		
	    $j = \App\SavedJobs::join('jobs','jobs.id','=', 'saved_jobs.job_id')
	    					->join('company_info','company_info.user_id','=', 'jobs.user_id')
	    					->select('saved_jobs.id','jobs.job_title','jobs.id as job_id','company_info.company_name','jobs.created_at')
	    					->where('saved_jobs.user_id','=', Auth::user()->id)
	    					->get();

	  //  var_dump($j);
	        return Datatables::of($j)->addColumn('Actions',function($model)use($country){
	        return '<a onclick="return confirm(\'Are you sure you want to delete ' . $model->jobs->job_title . '\')" href="'. asset($country ."/saved/delete/") . '/'. $model->id.'">Delete</a> ';
   		 })->make(true);
	}

	public function viewresume($country,$id,$application_id)
	{
		$obj = \App\Resume::where('id', $id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$profile = \App\ResumeSeekerProfile::with(['awards'=>function($query){$query->orderBy('award_date');},'affilitions','publications','references','education','experiance','projects','languages','skills'])->where('resume_id', $id)->first();
		return view('employers::view-resume')->with('application_id',$application_id)->with('country',$country)->with('sections',$sections)->with('obj',$obj)->with('profile',$profile);
	}


	public function filter_applicants(Request $request,$country, \App\Jobs $user)
	{
		$c = Config::all()->keyBy('k');
		$user = $user->with(['categories','adtype','jobtype','cities','companies','shift'])->newQuery();

		if ($request->has('category_id') !='') {
		    $user->where('category_id', $request->input('category_id'));
		}
		if ($request->has('experiance_id') !='') {
		    $user->where('experiance_level_id', $request->input('experiance_id'));
		}
		if ($request->has('MinS') !='') {
		    $user->where('currency_min','>=', $request->input('MinS'));
		}
		if ($request->has('MaxS') !='') {
		    $user->where('salary_max','<=', $request->input('MaxS'));
		}
		$j = $user->paginate($c['PAGE_SIZE']->v)->appends($request->input());

		$cntry = Countries::where('active',1)->where('seo',$country)->first();
		$el = ExperianceLevels::where('active',1)->orderBy('name')->lists('name','id');
		$obj2 = Categories::where('active',1)->orderBy('name')->lists('name','id');
		
		return view('search', compact('obj2','el'))->with('cntry', $cntry)->with('country',$country)->with('j',$j)->with('config',$c);
	}
}
