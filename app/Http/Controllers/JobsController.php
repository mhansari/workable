<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs;
use App\AdType;
use App\Countries;
use App\Categories;
use App\States;
use App\Cities;
use App\CareerLevels;
use App\ShiftTimings;
use App\Departments;
use App\ExperianceLevels;
use App\AfterExpiryActions;

use Auth; 

use DB;
class JobsController extends Controller
{
    public function postJob()
	{
		$adtypes = AdType::select(
        DB::raw("CONCAT(name, ' - PKR-' ,price, ' for ', duration_unit, ' day(s)') AS name, id"))->lists('name', 'id');
		$categories = Categories::where('Active','1')->lists('name', 'id');
	
		$countries = Countries::where('active','1')->lists('name', 'id');
		
		$CareerLevel = CareerLevels::where('active','1')->lists('name', 'id');
		
		$states = States::where('active','1')->lists('name', 'id');
		
		$cities = Cities::where('active','1')->lists('name', 'id');
		
		$shift = ShiftTimings::where('active','1')->lists('name', 'id');
		
		$depts = Departments::where('employer_id', Auth::user()->id)->lists('name', 'id');
		
		$experiancelevels = ExperianceLevels::where('active','1')->lists('name',  'id');
		
		$afterexpiryActions = AfterExpiryActions::where('active','1')->lists('name', 'id');
	
	
		$states = array();
		
		$cities = array();
		
		return view('employers::post-job',compact('adtypes','CareerLevel','experiancelevels','categories','countries','states','cities','shift','afterexpiryActions','depts'));
	
	}

    public function create(Request $request)
	{
	// $countries = Countries::all();

		if($request->input('JobTitle'))
		{
			//echo $request->input('Department');
				$jobs = new Jobs;
				$jobs->user_id = Auth::user()->id;//$request->input('employer_id');
				
				
				$jobs->ad_type_id = $request->input('AdType');
				$jobs->job_title = $request->input('JobTitle');
				$jobs->department_id = $request->input('DepartmentID');
				$jobs->category_id = $request->input('CategoryID');
				$jobs->career_level_id = $request->input('CareerLevelID');
				$jobs->experiance_level_id = $request->input('ExperianceLevelID');
				$jobs->number_of_positions = $request->input('NoVac');
				$jobs->qualifications = $request->input('Qualification');
				$jobs->shift_timings_id = $request->input('ShiftID');
				$jobs->required_travelling = $request->input('TravelingID');
				$jobs->currency_min = $request->input('MinimumSalary');
				$jobs->salary_max = $request->input('MaximumSalary');
				
				$jobs->country_id = $request->input('CountryID');
				$jobs->state_ids = $request->input('StateID');
				$jobs->city_ids = $request->input('CityID');
				$jobs->job_expiry = $request->input('JobExpiry');
				$jobs->after_expiry_actions_id = $request->input('AfterExpiryActionsID');
				$jobs->email_resume = $request->input('EmailResumeID');
				
				
				
				$jobs->description = $request->input('Description');
				
				
				
				//$jobs->active = '1';
				print_r($jobs);
			echo	$jobs->save();
				return response()->json(['success' => 'jobs successfully added.', 'jobs_id'=>$jobs->id]);
		}

      
	}
}//
