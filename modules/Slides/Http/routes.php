<?php
Route::group(['prefix' => 'manager/slides', 'namespace' => 'Modules\Slides\Http\Controllers'], function () {
    Route::get('/', array('before' => 'auth|role:access-slides', 'uses' => 'SlidesController@index'));
    Route::get('/add', array('before' => 'auth|role:access-slides', 'uses' => 'SlidesController@add'));
});