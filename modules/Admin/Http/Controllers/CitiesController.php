<?php namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Countries;
use App\States;
use App\Cities;
use DB;
use Input;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;
class CitiesController extends Controller {
	
	public function index()
	{
		
		return view('admin::cities');
	}
	public function allCities()
    {
    	 DB::statement(DB::raw('set @rownum=0'));

    	 $cities = DB::table('cities')
            ->join('states', 'states.id', '=', 'cities.StateID')
            ->join('countries', 'countries.id', '=', 'states.CountryID')
            ->select(DB::raw('@rownum := 0 r'))
            ->select(DB::raw('@rownum := @rownum + 1 AS sno'),'cities.*', 'countries.Name as CountryName', 'states.Name as StateName');



    
        return Datatables::of($cities)->addColumn('Actions',function($model){
        	//print_r($model);
        return '<a class="fa fa-edit" href="cities/edit/' . $model->id . '"></a> | <a onclick="return confirm(\'Are you sure you want to delete ' . $model->Name . '\')" class="fa fa-remove" href="cities/delete/' . $model->id . '"></a> ';
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
$states = States::all()->lists('Name', 'id');
		if($request->input('CityName'))
		{
				 $cities = new Cities;
				 $cities->Name = $request->input('CityName');
				 $cities->StateID = $request->input('StateID');
				 $v = $request->input('Active');
					$v= (($v=='')?'0':'1');
				 $cities->Active = $v;
				$cities->save();
					return Redirect::to('admin/cities');
		}

       return view('admin::create_city', compact('countries'),compact('states'));
	}
public function getByState($sid)
    {
            $cities = Cities::select('Name','id')->where('StateID', '=', $sid)->orderBy('Name','asc')->get();
            return $cities;
    }
	public function edit($id)
	{

		$city = Cities::find($id);
	$countries = Countries::all()->lists('Name', 'id');
		$state = States::find($city->StateID);

	//$states = States::all()->lists('Name', 'id');
	$states = States::where('CountryID', '=', $state->CountryID)->lists('Name','id');

	print_r($states);
        return view('admin::edit_city', compact('countries'),compact('states'))
            ->with('city', $city);
	}


	public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'CityName'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('cities/edit/' . $id)
                ->withErrors($validator);
        } else {
            // store

            $city = Cities::find($id);
             $city->Name       = Input::get('CityName');
            $city->StateID       = Input::get('StateID');
            $city->Active      = Input::get('Active');
       
            
            $city->save();

            // redirect
            Session::flash('message', 'Successfully updated!');
           	return Redirect::to('admin/cities');
        }
    }

 public function delete($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
       
            $city = Cities::find($id);
            
            
            $city->delete();

            // redirect
            Session::flash('message', 'Successfully deleted!');
           	return Redirect::to('admin/cities');
        
    }
}