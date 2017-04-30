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
		return Socialite::driver($provider)->redirect();
	}

    public function callback(SocialAccountService $service,$country, $provider)
    {
      
        $user = $service->createOrGetUser(Socialite::driver($provider));

    auth()->login($user);

    return redirect()->to('/home');
    }
}