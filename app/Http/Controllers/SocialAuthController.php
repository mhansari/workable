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

		return Socialite::driver($provider)->redirect();
	}

    public function callback(SocialAccountService $service,$country, $provider)
    {
     // echo $provider;
    //  print_r(Socialite::driver('facebook')->user());

      if($provider=='facebook')
        Session::put('token', Socialite::driver('facebook')->user()->token);
        $user = $service->createOrGetUser(Socialite::driver($provider));

        auth()->login($user);

    return redirect()->to('/');
    }
}