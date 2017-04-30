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

	public function empReschedule($country,$id)
	{
		$vanues = \App\Vanues::where('user_id','=',Auth::user()->id)->lists('title','id');
		$interviews = \App\Interview::find($id);
		$start = "00:00";
		$end = "23:59";

		$tStart = strtotime($start);
		$tEnd = strtotime($end);
		$tNow = $tStart;
		$slot = array();
		while($tNow <= $tEnd){
		  $slot[date("g:i A",$tNow)]= date("g:i A",$tNow);
		  $tNow = strtotime('+15 minutes',$tNow);
		}
		return view('employers::rescheduled-interview',compact('vanues','slot'))->with('id',$id)->with('obj',$interviews)->with('country',$country);
	}
	public function deleteInterview($country,$id)
	{

		$obj = \App\Interview::find($id);
		if($obj !=null)
		{
			if($obj->delete())
			{
				Session::flash('flash_message', 'Successfully Deleted!');
	         	 	return Redirect::to($country .'/employers/interviews');
			}
		}
		Session::flash('error_message', 'Invalid Interview ID');
         	 	return Redirect::to($country .'/employers/interviews');
	}
	public function scheduledInterviews($country)
	{
		$interviews = \App\Interview::with(['jobs','vanue'])->where('user_id','=',Auth::user()->id)->get();
		return view('employers::scheduled-interviews')->with('interviews',$interviews)->with('country',$country);
	}
	public function rescheduleUpdate($country, $id, Request $request)
	{
		$interviews = \App\Interview::find($id);
		if($interviews)
		{
			$interviews->re_interview_date = date("Y-m-d",strtotime($request->input('date')));
			$interviews->status_id =2;
			$interviews->re_interview_time =date("H:i", strtotime($request->input('time')));
			$interviews->save();
			return Redirect::to('/'.$country.'/seeker/interview/'.$id);
		}
	}
	public function reschedule($country, $id)
	{

		$start = "00:00";
		$end = "23:59";

		$tStart = strtotime($start);
		$tEnd = strtotime($end);
		$tNow = $tStart;
		$slot = array();
		while($tNow <= $tEnd){
		  $slot[date("g:i A",$tNow)]= date("g:i A",$tNow);
		  $tNow = strtotime('+15 minutes',$tNow);
		}
		$interviews = \App\Interview::with(['jobs','vanue'])->where('id','=',$id)->first();
		return view('seeker::reschedule-interview',compact('slot'))->with('id',$id)->with('country',$country)->with('interviews',$interviews);
	}
	public function detail($country, $id)
	{
		$interviews = \App\Interview::with(['jobs','vanue'])->where('id','=',$id)->first();
		return view('seeker::interview-detail')->with('country',$country)->with('interviews',$interviews);
	}
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
	public function confirm(Request $request,$country,$id)
	{
		$obj = \App\Interview::find($id);
		if($obj->applicant_id == AUth::user()->id){
			$obj->status_id =3;		
			if($obj->save())
			{
         		return Redirect::to($country .'/seekers/dashboard');
			}
		}
		return Redirect::to($country .'/seekers/dashboard');		
	}
	public function empRescheduleUpdate(Request $request,$country,$id)
	{

		$obj = \App\Interview::find($id);

		$obj->duration =$request->input('duration');
		$obj->interview_date = date("Y-m-d",strtotime($request->input('date')));
		$obj->vanue_id =$request->input('vanue');
		$obj->interviewer =$request->input('interviewer');
		$obj->status_id =1;
		$obj->interview_time =date("H:i", strtotime($request->input('time')));
		if($obj->save())
		{
			Session::flash('flash_message', 'Successfully Rescheduled!');
         	 	return Redirect::to($country .'/employers/interviews');
		}
		Session::flash('flash_message', 'Successfully scheduled!');

		
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
		$obj->applicant_id =$apply->user_id;
		$obj->active = 1;
		if($obj->save())
		{
			Session::flash('flash_message', 'Successfully scheduled!');
         	 	return Redirect::to($country . '/jobs/applications/'.$apply->job_id);
		}
		Session::flash('flash_message', 'Successfully scheduled!');

		
	}
}