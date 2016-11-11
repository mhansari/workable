<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Categories;
use App\Config;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        return view('home');
    }

     public function welcome()
    {
        $c = Config::all()->keyBy('k');
        $obj = Categories::where('active',1)->orderBy('name')->lists('name','seo');
        $obj1 = Categories::where('active',1) ->offset(10)->limit(10)->orderBy('name')->lists('name','id');
        $obj2 = Categories::where('active',1)->orderBy('name')->lists('name','id');

        return view('welcome' , compact('obj','obj1','obj2'))->with('config',$c);
    }
}
