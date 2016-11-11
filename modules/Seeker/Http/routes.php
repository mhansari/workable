<?php

Route::group(['middleware' => 'web', 'prefix' => 'seeker', 'namespace' => 'Modules\Seeker\Http\Controllers'], function()
{
	Route::get('/', 'SeekerController@index');
});