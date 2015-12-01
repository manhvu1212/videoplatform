<?php
Route::group(['prefix' => 'manager/videos', 'namespace' => 'Modules\Posts\Http\Controllers'], function()
{
	Route::get('/','PostController@index');
	Route::get('/add','PostController@ypn');
});
