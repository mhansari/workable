<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Categories;
use App\Config;
use Illuminate\Support\Facades\Redirect;
use Socialite;
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
        // Send an array of permissions to request
    $login_url = $fb2->getLoginUrl(['publish_actions','publish_stream','manage_pages']);

    // Obviously you'd do this in blade :)
    echo '<a href="' . $login_url . '">Login with Facebook</a>';
        
    }
    public function cb(\SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb2 )
    {
        $token = $fb2->getAccessTokenFromRedirect();
        $fb2->setDefaultAccessToken($token);
        $response = $fb2->get('/299010880556401/?fields=access_token');
        //echo $response['access_token'];
        print_r($response->getGraphObject());
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
