<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Categories;
use App\Config;
use Illuminate\Support\Facades\Redirect;
use Vinkla\Facebook\Facades\Facebook;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;
session_start();
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

    public function fb()
    {
// start session


// init app with app id and secret
FacebookSession::setDefaultApplication( 'xxx','yyy' );

// login helper with redirect_uri
$helper = new FacebookRedirectLoginHelper( 'http://yourwebsite.com/app/' );

// see if a existing session exists
if ( isset( $_SESSION ) && isset( $_SESSION['fb_token'] ) ) {
  // create new session from saved access_token
  $session = new FacebookSession( $_SESSION['fb_token'] );

  // validate the access_token to make sure it's still valid
  try {
    if ( !$session->validate() ) {
      $session = null;
    }
  } catch ( Exception $e ) {
    // catch any exceptions
    $session = null;
  }

} else {
  // no session exists

  try {
    $session = $helper->getSessionFromRedirect();
  } catch( FacebookRequestException $ex ) {
    // When Facebook returns an error
  } catch( Exception $ex ) {
    // When validation fails or other local issues
    echo $ex->message;
  }

}

// see if we have a session
if ( isset( $session ) ) {

  // save the session
  $_SESSION['fb_token'] = $session->getToken();
  // create a session using saved token or the new one we generated at login
  $session = new FacebookSession( $session->getToken() );

  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject()->asArray();

  // print profile data
  echo '<pre>' . print_r( $graphObject, 1 ) . '</pre>';

  // print logout url using session and redirect_uri (logout.php page should destroy the session)
  echo '<a href="' . $helper->getLogoutUrl( $session, 'http://yourwebsite.com/app/logout.php' ) . '">Logout</a>';

} else {
  // show login url
  echo '<a href="' . $helper->getLoginUrl( array( 'email', 'user_friends' ) ) . '">Login</a>';
}
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
