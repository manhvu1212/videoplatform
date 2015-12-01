<?php
Route::group(['prefix' => 'manager/videos', 'namespace' => 'Modules\Posts\Http\Controllers'], function()
{
	Route::get('/','PostsController@index');
	Route::get('/add','PostsController@ypn');
});
