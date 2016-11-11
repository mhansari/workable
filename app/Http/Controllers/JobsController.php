<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs;
use App\AdType;
use App\Countries;
use DB;
use App\Departments;
use Auth;
use App\Categories;
use App\ExperianceLevels;
use Carbon\Carbon ;
use App\Config;
use App\JobCities;
class JobsController extends Controller
{
    public function postJob()
	{
		$adtypes = AdType::select(
        DB::raw("CONCAT(name, ' - PKR-' ,price, ' for ', duration_unit, ' day(s)') AS name, id")
    )->lists('name', 'id');
$depts = Departments::where('employer_id', Auth::user()->id)->lists('name', 'id');
		$countries = Countries::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		return view('employers::post-job',compact('depts','adtypes','countries','states', 'cities'));
	}


	public function listbycategory($country,$seo)
	{
		$c = Config::all()->keyBy('k');
		$j = \App\Jobs::with(['adtype','jobtype','cities'])->get();		
		$cntry = Countries::where('active',1)->where('seo',$country)->first();
		$el = ExperianceLevels::where('active',1)->orderBy('name')->lists('name','id');
		$obj2 = Categories::where('active',1)->orderBy('name')->lists('name','id');
		return view('search', compact('obj2','el'))->with('cntry', $cntry)->with('j',$j)->with('config',$c);
	}
}
