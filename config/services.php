<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('sandbox9fbb25a2a3a94c12b19c2589717f59ba.mailgun.org'),
        'secret' => env('key-59d05e54d1b7e03b8c304ade10003748'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '176663976026604',
        'client_secret' => '1460744d53bf8a8aefc5acbb39d0353b',
        'redirect' => 'http://www.jobstreet.pk/pk/account/callback/facebook',
    ],
    
    'twitter' => [
        'client_id' => '795x3vde98G1x2gqePqPXv0iS',
        'client_secret' => 'PkXXM2WQSREt8uNljGZ20EnUSIz7HigTTPulpOc5B3o7xjns3g',
        'redirect' => 'http://www.jobstreet.pk/pk/account/callback/twitter',
    ],
    
    'google' => [
        'client_id' => '608764785078-s9dap3el1pn7svnm8825mlv39428m0nb.apps.googleusercontent.com',
        'client_secret' => 'bcph1-xXDD63TECofHHVF0YV',
        'redirect' => 'http://www.jobstreet.pk/pk/account/callback/google',
    ],
    
    'linkedin' => [
        'client_id' => '86ef68765qjs45',
        'client_secret' => 'oo0L21Z9nY7aDkqo',
        'redirect' => 'http://www.jobstreet.pk/pk/account/callback/linkedin',
    ],

];
