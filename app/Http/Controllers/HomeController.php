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
        // Obtain an access token.

        $token = $fb2->getAccessTokenFromRedirect();
        if (! $token) {
            // Get the redirect helper
            $helper = $fb2->getRedirectLoginHelper();

            if (! $helper->getError()) {
                abort(403, 'Unauthorized action.');
            }

            // User denied the request
            dd(
                $helper->getError(),
                $helper->getErrorCode(),
                $helper->getErrorReason(),
                $helper->getErrorDescription()
            );
        }

        if (! $token->isLongLived()) {
            // OAuth 2.0 client handler
            $oauth_client = $fb2->getOAuth2Client();

            // Extend the access token.
            try {
                $token = $oauth_client->getLongLivedAccessToken($token);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                dd($e->getMessage());
            }
        }
echo $token;
        $fb2->setDefaultAccessToken($token);

        // Save for later
        Session::put('fb_user_access_token', (string) $token);

        // Get basic info on the user from Facebook.
        try {
            $response = $fb2->get('/me?fields=id,name,email');
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }

        // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
        $facebook_user = $response->getGraphUser();
        print_r($facebook_user);
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
