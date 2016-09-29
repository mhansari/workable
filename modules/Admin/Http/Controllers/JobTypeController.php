<?php namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use App\JobType;
use DB;
use Input;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;

class JobTypeController extends Controller {
	
	public function index()
	{
		return view('admin::job_type');
	}
	public function allJobTypes()
    {
    	 DB::statement(DB::raw('set @rownum=0'));
        $adtypes = JobType::select(DB::raw('@rownum := 0 r'))
        ->select(DB::raw('@rownum := @rownum + 1 AS sno'),'job_type.*');

    
        return Datatables::of($adtypes)->addColumn('Actions',function($model){
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

     public function delete($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
       
            $ad = JobType::find($id);
            
            
            $ad->delete();

            // redirect
            Session::flash('message', 'Successfully deleted!');
           	return Redirect::to('admin/job-type');
        
    }

    public function create(Request $request)
	{
	//	$countries = Countries::all();

		if($request->input('Name'))
		{
				$obj = new JobType;
				$obj->Name = $request->input('Name');
				$v = $request->input('Active');
				$v= (($v=='')?'0':'1');
				$obj->Active = $v;
				$obj->save();
				return Redirect::to('admin/job-type');
		}

       return view('admin::create_job_type');
	}
	public function edit($id)
	{

		$obj = JobType::find($id);
	
        return view('admin::edit_job_type')
            ->with('obj', $obj);
	}
	public function update($id)
    {
       	$obj = JobType::find($id);
        $obj->name       = Input::get('Name');
        $obj->active      = Input::get('Active');
   
        
        $obj->save();

        // redirect
        Session::flash('message', 'Successfully updated!');
       	return Redirect::to('admin/job-type');
    }
}