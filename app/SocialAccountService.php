<?php

namespace App;

//use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(Laravel\Socialite\Contracts\User $providerUser)
    {
		//$providerUser = $provider->user();
        $providerName = class_basename($provider);
        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
        
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);

            $user = \App\SiteUsers::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = \App\SiteUsers::create([
                    'email' => $providerUser->getEmail(),
                    'first_name' => $providerUser->getName(),
                ]);
            }
            
            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}