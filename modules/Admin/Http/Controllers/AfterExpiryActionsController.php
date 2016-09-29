<?php namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use App\AfterExpiryActions;
use DB;
use Input;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;

class AfterExpiryActionsController extends Controller {
	
	public function index()
	{
		return view('admin::after_expiry_actions');
	}

	
	public function allAfterExpiryActions()
    {
    	 DB::statement(DB::raw('set @rownum=0'));
        $adtypes = AfterExpiryActions::select(DB::raw('@rownum := 0 r'))
        ->select(DB::raw('@rownum := @rownum + 1 AS sno'),'after_expiry_actions.*');

    
        return Datatables::of($adtypes)->addColumn('Actions',function($model){
        	//print_r($model);
        return '<a class="fa fa-edit" href="after-expiry-actions/edit/' . $model->id . '"></a> | <a onclick="return confirm(\'Are you sure you want to delete ' . $model->Name . '\')" class="fa fa-remove" href="after-expiry-actions/delete/' . $model->id . '"></a> ';
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
       
            $ad = AfterExpiryActions::find($id);
            
            
            $ad->delete();

            // redirect
            Session::flash('message', 'Successfully deleted!');
           	return Redirect::to('admin/after-expiry-actions');
        
    }
	public function create(Request $request)
	{
	//	$countries = Countries::all();

		if($request->input('Name'))
		{
				$obj = new AfterExpiryActions;
				$obj->Name = $request->input('Name');
				$v = $request->input('Active');
				$v= (($v=='')?'0':'1');
				$obj->Active = $v;
				$obj->save();
				return Redirect::to('admin/after-expiry-actions');
		}

       return view('admin::create_after_expiry_action');
	}

	public function edit($id)
	{

		$obj = AfterExpiryActions::find($id);
	
        return view('admin::edit_after_expiry_action')
            ->with('obj', $obj);
	}

	public function update($id)
    {
       	$obj = AfterExpiryActions::find($id);
        $obj->name       = Input::get('Name');
        $obj->active      = Input::get('Active');
   
        
        $obj->save();

        // redirect
        Session::flash('message', 'Successfully updated!');
       	return Redirect::to('admin/after-expiry-actions');
    }
}