<?php namespace Modules\Admin\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use App\Countries;
use DB;
use Input;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;
class CountriesController extends Controller {
	
	public function index()
	{
	//	$countries = Countries::all();
		
		return view('admin::countries');
	}
	 public function allCountries()
    {
    	 DB::statement(DB::raw('set @rownum=0'));
        $countries = Countries::select(DB::raw('@rownum := 0 r'))
        ->select(DB::raw('@rownum := @rownum + 1 AS sno'),'countries.*');

    
        return Datatables::of($countries)->addColumn('Actions',function($model){
        	//print_r($model);
        return '<a class="fa fa-edit" href="countries/edit/' . $model->id . '"></a> | <a onclick="return confirm(\'Are you sure you want to delete ' . $model->Name . '\')" class="fa fa-remove" href="countries/delete/' . $model->id . '"></a> ';
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
	//	$countries = Countries::all();

		if($request->input('CountryName'))
		{
				 $countries = new Countries;
				 $countries->Name = $request->input('CountryName');
				 $v = $request->input('Active');
					$v= (($v=='')?'0':'1');
				 $countries->Active = $v;
				 echo $countries->Active;
					$countries->save();
					return Redirect::to('admin/countries');
		}

       return view('admin::create_country');
	}

	public function edit($id)
	{

		$country = Countries::find($id);
	
        return view('admin::edit_country')
            ->with('country', $country);
	}

	public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'CountryName'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('countries/edit/' . $id)
                ->withErrors($validator);
        } else {
            // store

            $country = Countries::find($id);
            $country->Name       = Input::get('CountryName');
            $country->Active      = Input::get('Active');
       
            
            $country->save();

            // redirect
            Session::flash('message', 'Successfully updated!');
           	return Redirect::to('admin/countries');
        }
    }

    public function delete($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
       
            $country = Countries::find($id);
            
            
            $country->delete();

            // redirect
            Session::flash('message', 'Successfully deleted!');
           	return Redirect::to('admin/countries');
        
    }

}