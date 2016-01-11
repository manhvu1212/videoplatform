<?php
Route::group(['prefix' => 'manager/videos', 'namespace' => 'Modules\Videos\Http\Controllers'], function () {
    Route::get('/', array('before' => 'auth|role:access-videos', 'uses' => 'VideosController@index'));
    Route::get('/add', array('before' => 'auth|role:access-videos', 'uses' => 'VideosController@add'));
    Route::post('/save', array('before' => 'auth|role:access-videos', 'uses' => 'VideosController@save'));
    Route::get('/edit/{video_id}', array('before' => 'auth|role:access-videos', 'uses' => 'VideosController@edit'));
    Route::post('/change_status', array('before' => 'auth|role:access-videos', 'uses' => 'VideosController@change_status'));
    Route::post('/destroy', array('before' => 'auth|role:access-videos', 'uses' => 'VideosController@destroy'));
    Route::post('/bind_link', array('before' => 'auth|role:access-videos', 'uses' => 'VideosController@bind_link'));
});
