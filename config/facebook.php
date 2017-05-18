<?php

/*
 * This file is part of Laravel Facebook.
 *
  * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Facebook Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'app_id' => '176663976026604',
            'app_secret' => '1460744d53bf8a8aefc5acbb39d0353b',
            'default_graph_version' => 'v2.8',
            //'default_access_token' => null,
        ],

        'alternative' => [
            'app_id' => '176663976026604',
            'app_secret' => '1460744d53bf8a8aefc5acbb39d0353b',
            'default_graph_version' => 'v2.8',
            //'default_access_token' => null,
        ],

    ],

];
