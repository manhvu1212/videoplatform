<?php

Route::group(['prefix' => 'slide', 'namespace' => 'Modules\Slide\Http\Controllers'], function()
{
	Route::get('/', 'SlideController@index');
});