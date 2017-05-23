<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Categories;
use App\Config;
use Illuminate\Support\Facades\Redirect;
use Socialite;
 use Session;
 use Facebook;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //$fb2 = app(\SammyK\LaravelFacebookSdk\LaravelFacebookSdk::class);
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

    public function select()
    {
        
       // $regions = \App\Regions::with(['country'])->where('active',1)->get();
       // return view('index')->with('regions',$regions);
        $c = Config::all()->keyBy('k');
        return Redirect::to('/'.$c['DEFAULT_COUNTRY']->v);
    }

    public function fb(\SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb2 )
    {
    
    $fb = new Facebook();

$fb->setDefaultAccessToken(Session('token'));
$fb->sendRequest('POST', "me/feed", [
    'message' => 'I Like French Fries.',
    'link' => 'http://blog.damirmiladinov.com',
]);

    }
    public function welcome($country)
    {

        $c = Config::all()->keyBy('k');
        $obj = Categories::where('active',1)->orderBy('name')->lists('name','seo');
        $obj1 = Categories::where('active',1) ->offset(10)->limit(10)->orderBy('name')->lists('name','id');
        $obj2 = Categories::where('active',1)->orderBy('name')->lists('name','id');
$j = \App\Jobs::with(['companies','cities','countries'])->orderBy('created_at','desc')->limit(18)->get();
$s = \App\ResumeSeekerProfile::with(['city','country','resume'=>function($q){
     $q->where('isdefault', '1');
},'experiance' => function($query){
            $query->orderBy('start_date', 'desc');
        }])->orderBy('created_at','desc')->limit(18)->get();
        return view('welcome' , compact('obj','obj1','obj2'))->with('s',$s)->with('j',$j)->with('config',$c)->with('country',$country);
    }
}
