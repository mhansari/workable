<?php namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use App\OtherBenefits;
use DB;
use Input;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;

class OtherBenefitsController extends Controller {
	
	public function index()
	{
		return view('admin::other_benefits');
	}
	public function allOtherBenefits()
    {
    	 DB::statement(DB::raw('set @rownum=0'));
        $adtypes = OtherBenefits::select(DB::raw('@rownum := 0 r'))
        ->select(DB::raw('@rownum := @rownum + 1 AS sno'),'other_benefits.*');

    
        return Datatables::of($adtypes)->addColumn('Actions',function($model){
        	//print_r($model);
        return '<a class="fa fa-edit" href="other-benefits/edit/' . $model->id . '"></a> | <a onclick="return confirm(\'Are you sure you want to delete ' . $model->Name . '\')" class="fa fa-remove" href="other-benefits/delete/' . $model->id . '"></a> ';
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
       
            $ad = OtherBenefits::find($id);
            
            
            $ad->delete();

            // redirect
            Session::flash('message', 'Successfully deleted!');
           	return Redirect::to('admin/other-benefits');
        
    }

    public function create(Request $request)
	{
	//	$countries = Countries::all();

		if($request->input('Name'))
		{
				$obj = new OtherBenefits;
				$obj->Name = $request->input('Name');
				$v = $request->input('Active');
				$v= (($v=='')?'0':'1');
				$obj->Active = $v;
				$obj->save();
				return Redirect::to('admin/other-benefits');
		}

       return view('admin::create_other_benefit');
	}
	public function edit($id)
	{

		$obj = OtherBenefits::find($id);
	
        return view('admin::edit_other_benefit')
            ->with('obj', $obj);
	}
	public function update($id)
    {
       	$obj = OtherBenefits::find($id);
        $obj->name       = Input::get('Name');
        $obj->active      = Input::get('Active');
   
        
        $obj->save();

        // redirect
        Session::flash('message', 'Successfully updated!');
       	return Redirect::to('admin/other-benefits');
    }
	
}