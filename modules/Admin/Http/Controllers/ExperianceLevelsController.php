<?php namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use App\ExperianceLevels;
use DB;
use Input;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;

class ExperianceLevelsController extends Controller {
	
	public function index()
	{
		return view('admin::experiance_levels');
	}
	public function allExperianceLevels()
    {
    	 DB::statement(DB::raw('set @rownum=0'));
        $adtypes = ExperianceLevels::select(DB::raw('@rownum := 0 r'))
        ->select(DB::raw('@rownum := @rownum + 1 AS sno'),'experiance_levels.*');

    
        return Datatables::of($adtypes)->addColumn('Actions',function($model){
        	//print_r($model);
        return '<a class="fa fa-edit" href="experiance-levels/edit/' . $model->id . '"></a> | <a onclick="return confirm(\'Are you sure you want to delete ' . $model->Name . '\')" class="fa fa-remove" href="experiance-levels/delete/' . $model->id . '"></a> ';
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
       
            $ad = ExperianceLevels::find($id);
            
            
            $ad->delete();

            // redirect
            Session::flash('message', 'Successfully deleted!');
           	return Redirect::to('admin/experiance-levels');
        
    }

    public function create(Request $request)
	{
	//	$countries = Countries::all();

		if($request->input('Name'))
		{
				$obj = new ExperianceLevels;
				$obj->Name = $request->input('Name');
				$v = $request->input('Active');
				$v= (($v=='')?'0':'1');
				$obj->Active = $v;
				$obj->save();
				return Redirect::to('admin/experiance-levels');
		}

       return view('admin::create_experiance_level');
	}

	public function edit($id)
	{

		$obj = ExperianceLevels::find($id);
	
        return view('admin::edit_experiance_level')
            ->with('obj', $obj);
	}

	public function update($id)
    {
       	$obj = ExperianceLevels::find($id);
        $obj->name       = Input::get('Name');
        $obj->active      = Input::get('Active');
   
        
        $obj->save();

        // redirect
        Session::flash('message', 'Successfully updated!');
       	return Redirect::to('admin/experiance-levels');
    }
}