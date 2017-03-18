<?php 
namespace Modules\Employers\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use App\Vanues;
use DB;
use Input;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;
use Auth;
class InterviewsController extends Controller 
{
	public function scheduleInterview(Request $request,$country,$id)
	{
		$vanues = \App\Vanues::where('user_id','=',Auth::user()->id)->lists('title','id');
		$start = "00:00";
		$end = "23:59";
		$obj = \App\Interview::where('application_id', $id)->first();
		if($obj == null)
			$obj = new \App\Interview;
		$tStart = strtotime($start);
		$tEnd = strtotime($end);
		$tNow = $tStart;
		$slot = array();
		while($tNow <= $tEnd){
		  $slot[date("g:i A",$tNow)]= date("g:i A",$tNow);
		  $tNow = strtotime('+15 minutes',$tNow);
		}
		return view('employers::schedule-interview',compact('vanues','slot'))->with('obj',$obj)->with('country',$country)->with('application_id',$id);
	}
	public function schedule(Request $request,$country,$application_id)
	{

		$obj = \App\Interview::where('application_id', $application_id)->first();
		if($obj ==null)
		{
			$obj = new \App\Interview;
		}
		$apply = \App\Applied::find($application_id);
		$obj->job_id = $apply->job_id;
		$obj->application_id =$application_id;
		$obj->duration =$request->input('duration');
		$obj->interview_date = date("Y-m-d",strtotime($request->input('date')));
		$obj->vanue_id =$request->input('vanue');
		$obj->interviewer =$request->input('interviewer');
		$obj->status_id =1;
		$obj->interview_time =date("H:i", strtotime($request->input('time')));
		$obj->user_id =Auth::user()->id;
		$obj->active = 1;
		if($obj->save())
		{
			Session::flash('flash_message', 'Successfully scheduled!');
         	 	return Redirect::to($country . '/jobs/applications/'.$apply->job_id);
		}
		Session::flash('flash_message', 'Successfully scheduled!');

		
	}
}