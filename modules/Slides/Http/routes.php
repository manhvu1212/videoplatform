<?php

Route::group(['prefix' => 'slides', 'namespace' => 'Modules\Slides\Http\Controllers'], function()
{
	Route::get('/', 'SlidesController@index');
});