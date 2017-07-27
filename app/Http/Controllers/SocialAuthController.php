<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use App\SocialAccountService;
use Session;
class SocialAuthController extends Controller
{
  public function redirect($country,$provider)
	{
    if($provider=='facebook');
		  return Socialite::driver($provider)->scopes(['publish_actions','manage_pages'])->redirect();
    else
      return Socialite::driver($provider)->redirect();      

	}

    public function callback(SocialAccountService $service,$country, $provider)
    {
     // echo $provider;
      //print_r(Socialite::driver('facebook')->user());

        $user = $service->createOrGetUser(Socialite::driver($provider)->user(), $provider);

        auth()->login($user);

    return redirect()->to('/');
    }
}