<?php namespace Modules\Admin\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use App\AdType;
use DB;
use Input;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;

class AdTypeController extends Controller {
	
	public function index()
	{
		return view('admin::ad-types');
	}

	public function allAds()
    {
    	 DB::statement(DB::raw('set @rownum=0'));
        $adtypes = AdType::select(DB::raw('@rownum := 0 r'))
        ->select(DB::raw('@rownum := @rownum + 1 AS sno'),'ad_types.*');

    
        return Datatables::of($adtypes)->addColumn('Actions',function($model){
        	//print_r($model);
        return '<a class="fa fa-edit" href="ad-type/edit/' . $model->id . '"></a> | <a onclick="return confirm(\'Are you sure you want to delete ' . $model->Name . '\')" class="fa fa-remove" href="ad-type/delete/' . $model->id . '"></a> ';
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

		if($request->input('Name'))
		{
				$ad = new AdType;
				$ad->name = $request->input('Name');
				$ad->description = $request->input('description');
				$ad->price = $request->input('Price');
				$ad->duration_unit = $request->input('Duration');
				$v = $request->input('Active');
				$v= (($v=='')?'0':'1');
				$ad->Active = $v;
				$ad->save();
					return Redirect::to('admin/ad-type');
		}

       return view('admin::create_adtype');
	}

	public function edit($id)
	{

		$ad = AdType::find($id);
	
        return view('admin::edit_adtype')
            ->with('ad', $ad);
	}

	public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
       
            $ad = AdType::find($id);
            $ad->name = Input::get('Name');
				$ad->description = Input::get('description');
				$ad->price = Input::get('Price');
				$ad->duration_unit = Input::get('Duration');
				$v = Input::get('Active');
				$v= (($v=='')?'0':'1');
				$ad->Active = $v;
            $ad->save();

            // redirect
            Session::flash('message', 'Successfully updated!');
           	return Redirect::to('admin/ad-type');
        
    }

    public function delete($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
       
            $ad = AdType::find($id);
            
            
            $ad->delete();

            // redirect
            Session::flash('message', 'Successfully deleted!');
           	return Redirect::to('admin/ad-type');
        
    }
}