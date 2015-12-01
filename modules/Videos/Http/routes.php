<?php
Route::group(['prefix' => 'manager/videos', 'namespace' => 'Modules\Posts\Http\Controllers'], function()
{
	Route::get('/','VideosController@index');
	Route::get('/add','VideosController@add');
});
