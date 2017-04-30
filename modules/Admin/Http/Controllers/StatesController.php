<?php namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Countries;
use App\States;
use DB;
use Input;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;
class StatesController extends Controller {
	
	public function index()
	{
		
		return view('admin::states');
	}

	public function getByCountry($country='pk',$cid)
	{
		$states = \App\States::select('Name','id')->where('CountryID', '=', $cid)->orderBy('Name','asc')->get();
		return $states;
	}
	public function allStates()
    {
    	 DB::statement(DB::raw('set @rownum=0'));

    	 $states = DB::table('states')
            ->join('countries', 'countries.id', '=', 'states.CountryID')
            ->select(DB::raw('@rownum := 0 r'))
            ->select(DB::raw('@rownum := @rownum + 1 AS sno'),'states.*', 'countries.Name as CountryName');



    
        return Datatables::of($states)->addColumn('Actions',function($model){
        	//print_r($model);
        return '<a class="fa fa-edit" href="states/edit/' . $model->id . '"></a> | <a onclick="return confirm(\'Are you sure you want to delete ' . $model->Name . '\')" class="fa fa-remove" href="states/delete/' . $model->id . '"></a> ';
    })->editColumn('Active', '
                  @if($Active)
                        Yes
                  @else
                         No
                  @endif'
        )->make(true);
    }

	public function create(Request $request)
	{
		$countries = Countries::all()->lists('Name', 'id');

		if($request->input('StateName'))
		{
				 $states = new States;
				 $states->Name = $request->input('StateName');
				 $states->CountryID = $request->input('CountryID');
				 $v = $request->input('Active');
					$v= (($v=='')?'0':'1');
				 $states->Active = $v;
				$states->save();
					return Redirect::to('admin/states');
		}

       return view('admin::create_state', compact('countries'));
	}


	public function edit($id)
	{

		$state = States::find($id);
	$countries = Countries::all()->lists('Name', 'id');
        return view('admin::edit_state', compact('countries'))
            ->with('state', $state);
	}

	public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'StateName'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('states/edit/' . $id)
                ->withErrors($validator);
        } else {
            // store

            $state = States::find($id);
             $state->Name       = Input::get('StateName');
            $state->CountryID       = Input::get('CountryID');
            $state->Active      = Input::get('Active');
       
            
            $state->save();

            // redirect
            Session::flash('message', 'Successfully updated!');
           	return Redirect::to('admin/states');
        }
    }

    public function delete($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
       
            $state = States::find($id);
            
            
            $state->delete();

            // redirect
            Session::flash('message', 'Successfully deleted!');
           	return Redirect::to('admin/states');
        
    }
}