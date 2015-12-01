<?php
Route::group(['prefix' => 'manager/videos', 'namespace' => 'Modules\Videos\Http\Controllers'], function()
{
	Route::get('/','');
	Route::get('/add',function(){
		return "Phamnhuy";
	});
});
