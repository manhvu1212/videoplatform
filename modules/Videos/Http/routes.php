<?php
Route::group(['prefix' => 'manager/videos', 'namespace' => 'Modules\Videos\Http\Controllers'], function()
{
	Route::get('/','VideosController@index');
	Route::get('/add','VideosController@add');
});
