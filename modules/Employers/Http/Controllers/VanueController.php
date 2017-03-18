<?php 
namespace Modules\Employers\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use App\Vanues;
use DB;
use Input;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;
use Auth;
class VanueController extends Controller {
	
	public function update($country,$id=0)
	{
		$obj = Vanues::find($id);
		if($obj == null)
			$obj = new Vanues;
		$countries = \App\Countries::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		return view('employers::update-vanue', compact('countries','states', 'cities'))->with('obj',$obj)->with('country',$country);
	}
	public function all($country)
	{
		return view('employers::vanues')->with('country',$country);
	}
	public function myvanuesajax()
	{
		$j = \App\Vanues::with(['country','state','city'])->where('user_id', '=',Auth::user()->id)->orderBy('created_at','asc')->get();		
    //var_dump($j);
        return Datatables::of($j)->addColumn('Actions',function($model){
        	//print_r($model);
        return '<a class="fa fa-edit" href="update-vanue/' . $model->id . '"></a> | <a onclick="return confirm(\'Are you sure you want to delete ' . $model->Name . '\')" class="fa fa-remove" href="vanue/delete/' . $model->id . '"></a> ';
    })->editColumn('active', '
                  @if($active)
                        Yes
                  @else
                         No
                  @endif'
        )->make(true);
	}
    public function save(Request $request,$country)
	{



		$vanue = Vanues::find($request->get('vanue_id'));
		if($vanue == null)
			$vanue = new Vanues;

echo $request->input('title');
		$vanue->user_id = Auth::user()->id;
		$vanue->title = $request->input('title');
		$vanue->country_id = $request->input('CountryID');
		$vanue->state_id = $request->input('StateID');
		$vanue->city_id = $request->input('CityID');
		$vanue->address = $request->input('address');
		$vanue->contact_person = $request->input('contact_person');
		$vanue->phone = $request->input('phone');
		$vanue->mobile = $request->input('mobile');
		$vanue->fax = $request->input('fax');
		$vanue->email = $request->input('email');
		$vanue->instructions = $request->input('instructions');
		
		$vanue->active = '1';
		$vanue->save();
		return Redirect::to($country.'/employers/vanues');
	}

	public function delete($country,$id)
	{
		echo $id;
		$obj = Vanues::find($id);
		$obj->delete();
		return Redirect::to($country.'/employers/vanues');
	}
}