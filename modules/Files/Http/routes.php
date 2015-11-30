<?php

Route::group(['prefix' => '/manager/files', 'namespace' => 'Modules\Files\Http\Controllers'], function()
{
	Route::get('/', array('before' => 'auth',  'uses' => 'FilesController@index'));

	Route::get('/index',  array('before' => 'auth',  'uses' => 'FilesController@files'));
	Route::get('/manager',  array('before' => 'auth',  'uses' => 'FilesController@files'));
	Route::post('/manager',  array('before' => 'auth',  'uses' => 'FilesController@files'));
	Route::get('/manager/{id}', array('before' => 'auth',  'uses' => 'FilesController@files'));
	Route::post('/manager/{id}',  array('before' => 'auth',  'uses' => 'FilesController@files'));



	Route::post('/uploadimage',  array('before' => 'auth',  'uses' => 'FilesController@uploadimage'));
	Route::get('/uploadimage',  array('before' => 'auth',  'uses' => 'FilesController@uploadimage'));
	Route::post('/getdetail',  array('before' => 'auth',  'uses' => 'FilesController@getdetail'));
	Route::post('/destroyfile',  array('before' => 'auth',  'uses' => 'FilesController@destroyfile') );
	Route::post('/update',  array('before' => 'auth',  'uses' => 'FilesController@update') );

	Route::post('/savefolder',  array('before' => 'auth',  'uses' => 'FilesController@savefolder'));
	Route::post('/deletefolder',  array('before' => 'auth',  'uses' => 'FilesController@deletefolder') );
});