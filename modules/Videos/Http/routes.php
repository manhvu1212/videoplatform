<?php
Route::group(['prefix' => 'manager/videos', 'namespace' => 'Modules\Videos\Http\Controllers'], function()
{
	Route::get('/','VidoesController@index');
	Route::get('/add','VideosController@add');
});
