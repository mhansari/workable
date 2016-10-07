<?php namespace Modules\Admin\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use App\Departments;
use DB;
use Input;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;

class DepartmentsController extends Controller {
	
	public function index()
	{
		return view('admin::departments');
	}
	public function allDepartments()
    {
    	 DB::statement(DB::raw('set @rownum=0'));
        $departments = Departments::select(DB::raw('@rownum := 0 r'))
        ->select(DB::raw('@rownum := @rownum + 1 AS sno'),'departments.*');

    
        return Datatables::of($departments)->addColumn('Actions',function($model){
        	//print_r($model);
        return '<a class="fa fa-edit" href="departments/edit/' . $model->id . '"></a> | <a onclick="return confirm(\'Are you sure you want to delete ' . $model->Name . '\')" class="fa fa-remove" href="departments/delete/' . $model->id . '"></a> ';
    })->editColumn('active', '
                  @if($active)
                        Yes
                  @else
                         No
                  @endif'
        )->make(true);
    }

    public function create(Request $request)
	{
	//	$countries = Countries::all();

		if($request->input('Department'))
		{
			//echo $request->input('Department');
				$departments = new Departments;
				$departments->employer_id = $request->input('employer_id');
				$departments->name = $request->input('Department');
				$departments->country_id = $request->input('CountryID');
				$departments->state_id = $request->input('StateID');
				$departments->city_id = $request->input('CityID');
				$departments->description = $request->input('Description');
				
				$departments->active = '1';
				$departments->save();
				return response()->json(['success' => 'Department successfully added.', 'department_id'=>$departments->id]);
		}

      
	}
}