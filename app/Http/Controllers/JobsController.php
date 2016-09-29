<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs;
use App\AdType;
use App\Countries;
use DB;
class JobsController extends Controller
{
    public function postJob()
	{
		$adtypes = AdType::select(
        DB::raw("CONCAT(name, ' - PKR-' ,price, ' for ', duration_unit, ' day(s)') AS name, id")
    )->lists('name', 'id');

		$countries = Countries::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		return view('employers::post-job',compact('adtypes','countries','states', 'cities'));
	}
}
