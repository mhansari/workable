<?php 
namespace Modules\Employers\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use App\Departments;
use DB;
use Input;
use Auth;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;
use App\Countries;
use App\States;
use App\Cities;
use App\Notifications;
class DepartmentsController extends Controller {
	
	public function index($country)
	{
		return view('employers::departments')->with('country',$country);
	}

	public function edit($country, $id=0)
	{
		$department = Departments::find($id);
		$countries = Countries::all()->lists('Name', 'id');
		$states = array();
		$cities = array();

		if($department)
		{
			$states = States::where('CountryID','=',$department->country_id)->lists('Name', 'id');
			$cities = Cities::where('StateID','=',$department->state_id)->lists('Name', 'id');
		}
		else
		{
			$department = new Departments();
		}
		return view('employers::update-department', compact('countries','states', 'cities'))->with('obj',$department)->with('country',$country)->with('id',$id);

	
	}
	public function mydepartmentsajax()
	{
		 DB::statement(DB::raw('set @rownum=0'));
        $departments = Departments::select(DB::raw('@rownum := 0 r'))
        ->select(DB::raw('@rownum := @rownum + 1 AS sno'),'departments.*')->with(['countries','cities','states'])->where('employer_id','=', Auth::user()->id);

    
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

    public function save($country,$id=0,Request $request)
	{
		if($request->input('name'))
		{
			$departments = Departments::find($id);

			if(!$departments)
				$departments = new Departments;
			
			$departments->employer_id = Auth::user()->id;
			$departments->name = $request->input('name');
			$departments->country_id = $request->input('CountryID');
			$departments->state_id = $request->input('StateID');
			$departments->city_id = $request->input('CityID');
			$departments->description = $request->input('description');
			$departments->active = '1';
			$departments->save();
			Session::set('flash_message', "Department Saved.");
				return Redirect::to($country .'/employers/departments');
		}      
	}

    public function create(Request $request)
	{
	//	$countries = Countries::all();

		if($request->input('Department'))
		{
			//echo $request->input('Department');
				$departments = new Departments;
				$departments->employer_id = Auth::user()->id;
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