<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use App\SocialAccountService;
class SocialAuthController extends Controller
{
    public function redirect($country,$provider)
	{
        echo $provider;
		return Socialite::driver($provider)->redirect();
	}

    public function callback(SocialAccountService $service,$country, $provider)
    {
      echo $provider;
      print_r(Socialite::driver('twitter')->user());
        $user = $service->createOrGetUser(Socialite::driver($provider));
print_r($user);
//auth()->login($user);

    //return redirect()->to('/home');
    }
}