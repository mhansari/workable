<?php namespace Modules\Admin\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use App\SecurityQuestion;
use DB;
use Input;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Redirect;


class SecurityQuestionController extends Controller {
	
	public function index()
	{
		return view('admin::security_questions');
	}
	public function allQuestions()
    {
    	 DB::statement(DB::raw('set @rownum=0'));
        $securityquestions = SecurityQuestion::select(DB::raw('@rownum := 0 r'))
        ->select(DB::raw('@rownum := @rownum + 1 AS sno'),'securityquestions.*');

    
        return Datatables::of($securityquestions)->addColumn('Actions',function($model){
        	//print_r($model);
        return '<a class="fa fa-edit" href="security-question/edit/' . $model->id . '"></a> | <a onclick="return confirm(\'Are you sure you want to delete ' . $model->Name . '\')" class="fa fa-remove" href="security-question/delete/' . $model->id . '"></a> ';
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

		if($request->input('SecurityQuestion'))
		{
				 $countries = new SecurityQuestion;
				 $countries->Name = $request->input('SecurityQuestion');
				 $v = $request->input('Active');
					$v= (($v=='')?'0':'1');
				 $countries->Active = $v;
				 echo $countries->Active;
					$countries->save();
					return Redirect::to('admin/security-question');
		}

       return view('admin::create_question');
	}

	public function edit($id)
	{

		$securityquestion = SecurityQuestion::find($id);
	
        return view('admin::edit_question')
            ->with('securityquestion', $securityquestion);
	}

	public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'SecurityQuestion'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('security-question/edit/' . $id)
                ->withErrors($validator);
        } else {
            // store

            $country = SecurityQuestion::find($id);
            $country->Name       = Input::get('SecurityQuestion');
            $country->Active      = Input::get('Active');
       
            
            $country->save();

            // redirect
            Session::flash('message', 'Successfully updated!');
           	return Redirect::to('admin/security-question');
        }
    }

    public function delete($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
       
            $country = SecurityQuestion::find($id);
            
            
            $country->delete();

            // redirect
            Session::flash('message', 'Successfully deleted!');
           	return Redirect::to('admin/security-question');
        
    }
}