<?php

Route::group(['middleware' => 'web', 'prefix' => 'employers', 'namespace' => 'Modules\Employers\Http\Controllers'], function()
{
	Route::get('/', 'EmployersController@index');
});