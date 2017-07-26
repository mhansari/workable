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

		return Socialite::driver($provider)->scopes(['publish_actions','publish_stream','manage_pages'])->redirect();
	}

    public function callback(SocialAccountService $service,$country, $provider)
    {
     // echo $provider;
      print_r(Socialite::driver('facebook')->user());

      //  $user = $service->createOrGetUser(Socialite::driver($provider));

       // auth()->login($user);

   // return redirect()->to('/');
    }
}