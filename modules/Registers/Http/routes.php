<?php

Route::group(['prefix' => 'manager/registers', 'namespace' => 'Modules\Registers\Http\Controllers'], function()
{
	Route::get('/', array('before' => 'auth|role:access-registers',  'uses' => 'RegistersController@index'));
	Route::post('/destroy', array('before' => 'auth|role:access-registers',  'uses' => 'RegistersController@destroy'));
	Route::post('/deletemulti', array('before' => 'auth|role:access-registers',  'uses' => 'RegistersController@deletemulti'));
});