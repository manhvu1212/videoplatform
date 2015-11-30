<?php

Route::group(['prefix' => 'manager/posts', 'namespace' => 'Modules\Posts\Http\Controllers'], function()
{
	Route::get('/', array('before' => 'auth|role:access-posts',  'uses' => 'PostsController@index'));
	Route::get('/edit/{id}', array('before' => 'auth|role:access-posts',  'uses' => 'PostsController@edit'));
	Route::get('/add', array('before' => 'auth|role:access-posts',  'uses' => 'PostsController@add'));
	Route::post('/add', array('before' => 'auth|role:access-posts',  'uses' => 'PostsController@add'));
	Route::get('/add/{type}', array('before' => 'auth|role:access-posts',  'uses' => 'PostsController@add'));
	Route::post('/save', array('before' => 'auth|role:access-posts',  'uses' => 'PostsController@save'));
	Route::post('/change_status', array('before' => 'auth|role:access-posts',  'uses' => 'PostsController@change_status'));
	Route::post('/destroy', array('before' => 'auth|role:access-posts',  'uses' => 'PostsController@destroy'));
});

Route::group(['prefix' => 'manager/page', 'namespace' => 'Modules\Posts\Http\Controllers'], function()
{
	Route::get('/', array('before' => 'auth|role:access-page',  'uses' => 'PostsController@page'));
	Route::get('/edit/{id}', array('before' => 'auth|role:access-page',  'uses' => 'PostsController@edit'));
	Route::get('/add', array('before' => 'auth|role:access-page',  'uses' => 'PostsController@add'));
	Route::get('/add/{type}', array('before' => 'auth|role:access-page',  'uses' => 'PostsController@add'));

});

Route::group(['prefix' => 'manager/faq', 'namespace' => 'Modules\Posts\Http\Controllers'], function()
{
	Route::get('/', array('before' => 'auth|role:access-faq',  'uses' => 'PostsController@faq'));
	Route::get('/edit/{id}', array('before' => 'auth|role:access-faq',  'uses' => 'PostsController@edit'));
	Route::get('/add', array('before' => 'auth|role:access-faq',  'uses' => 'PostsController@add'));
	Route::get('/add/{type}', array('before' => 'auth|role:access-faq',  'uses' => 'PostsController@add'));

});

Route::group(['prefix' => 'manager/form', 'namespace' => 'Modules\Posts\Http\Controllers'], function()
{
	Route::get('/', array('before' => 'auth|role:access-form',  'uses' => 'FormsController@form'));
	Route::get('/add', array('before' => 'auth|role:access-form',  'uses' => 'FormsController@add'));
	Route::post('/add', array('before' => 'auth|role:access-form',  'uses' => 'FormsController@add'));
	Route::get('/add/{id}', array('before' => 'auth|role:access-form',  'uses' => 'FormsController@add'));
	Route::post('/add/{id}', array('before' => 'auth|role:access-form',  'uses' => 'FormsController@add'));
	Route::post('/destroy', array('before' => 'auth|role:access-form',  'uses' => 'FormsController@destroy'));
	Route::post('/save', array('before' => 'auth|role:access-form',  'uses' => 'FormsController@save'));
	Route::post('/change_frame', array('before' => 'auth|role:access-form',  'uses' => 'FormsController@change_frame'));
	Route::post('/change_check_id', array('before' => 'auth|role:access-form',  'uses' => 'FormsController@change_check_id'));

});