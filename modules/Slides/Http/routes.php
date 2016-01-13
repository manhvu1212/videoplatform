<?php
Route::group(['prefix' => 'manager/slides', 'namespace' => 'Modules\Slides\Http\Controllers'], function () {
    Route::get('/', array('before' => 'auth|role:access-slides', 'uses' => 'SlidesController@index'));
    Route::get('/add', array('before' => 'auth|role:access-slides', 'uses' => 'SlidesController@add'));
    Route::get('/edit/{slide_id}', array('before' => 'auth|role:access-slides', 'uses' => 'SlidesController@edit'));
    Route::post('/save', array('before' => 'auth|role:access-slides', 'uses' => 'SlidesController@save'));
    Route::post('/change_status', array('before' => 'auth|role:access-slides', 'uses' => 'SlidesController@change_status'));
    Route::post('/destroy', array('before' => 'auth|role:access-slides', 'uses' => 'SlidesController@destroy'));
});