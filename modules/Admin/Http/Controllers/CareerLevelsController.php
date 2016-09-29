<?php namespace Modules\Admin\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\CareerLevels;
use DB;
use Input;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;
use Pingpong\Modules\Routing\Controller;

class CareerLevelsController extends Controller {
	
	public function index()
	{
		return view('admin::career_levels');
	}
	public function allCareerLevels()
    {
    	 DB::statement(DB::raw('set @rownum=0'));
        $adtypes = CareerLevels::select(DB::raw('@rownum := 0 r'))
        ->select(DB::raw('@rownum := @rownum + 1 AS sno'),'career_levels.*');

    
        return Datatables::of($adtypes)->addColumn('Actions',function($model){
        	//print_r($model);
        return '<a class="fa fa-edit" href="career-levels/edit/' . $model->id . '"></a> | <a onclick="return confirm(\'Are you sure you want to delete ' . $model->Name . '\')" class="fa fa-remove" href="career-levels/delete/' . $model->id . '"></a> ';
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
       
            $ad = CareerLevels::find($id);
            
            
            $ad->delete();

            // redirect
            Session::flash('message', 'Successfully deleted!');
           	return Redirect::to('admin/career-levels');
        
    }
    public function create(Request $request)
	{
	//	$countries = Countries::all();

		if($request->input('Name'))
		{
				$obj = new CareerLevels;
				$obj->Name = $request->input('Name');
				$v = $request->input('Active');
				$v= (($v=='')?'0':'1');
				$obj->Active = $v;
				$obj->save();
				return Redirect::to('admin/career-levels');
		}

       return view('admin::create_career_level');
	}
	public function edit($id)
	{

		$obj = CareerLevels::find($id);
	
        return view('admin::edit_career_level')
            ->with('obj', $obj);
	}
	public function update($id)
    {
       	$obj = CareerLevels::find($id);
        $obj->name       = Input::get('Name');
        $obj->active      = Input::get('Active');
   
        
        $obj->save();

        // redirect
        Session::flash('message', 'Successfully updated!');
       	return Redirect::to('admin/career-levels');
    }
}