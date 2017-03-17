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
class SavedJobsController extends Controller {
	
	public function save(Request $request)
	{
		$obj = \App\SavedJobs::where('user_id', Auth::user()->id)->where('job_id', $request->get('job_id'))->first();
		if($obj ==null)
		{
			$obj = new \App\SavedJobs;
			$obj->user_id=Auth::user()->id;
			$obj->job_id=$request->get('job_id');
			$obj->save();
			echo $request->get('job_id');
		}
		else{
			echo -1;
		}
		
	}

	public function delete($country, $id)
	{
		$obj = \App\SavedJobs::where('user_id', Auth::user()->id)->where('id', $id);
		$obj->delete();

		return Redirect::to($country . '/seekers/my-saved-jobs');
	}
}