<?php

Route::group(['prefix' => '/manager/taxonomy', 'namespace' => 'Modules\Taxonomy\Http\Controllers'], function()
{
	//Vocabulary
	Route::get('/', array('before' => 'auth|role:access-taxonomy',  'uses' => 'TaxonomyController@index'));
	Route::post('/',  array('before' => 'auth|role:access-taxonomy',  'uses' => 'TaxonomyController@index') );
	Route::get('/save', array('before' => 'auth|role:access-taxonomy',  'uses' => 'TaxonomyController@save') );
	Route::post('/save',  array('before' => 'auth|role:access-taxonomy',  'uses' => 'TaxonomyController@save'));
	Route::post('/get_taxonomy',   array('before' => 'auth|role:access-taxonomy',  'uses' => 'TaxonomyController@get_taxonomy'));
	Route::get('/get_taxonomy', array('before' => 'auth|role:access-taxonomy',  'uses' => 'TaxonomyController@get_taxonomy'));
	Route::post('/delete_taxonomy', array('before' => 'auth|role:access-taxonomy',  'uses' => 'TaxonomyController@delete_taxonomy') );

	Route::get('/taxonomy-item/{id}',  array('before' => 'auth|role:access-taxonomy',  'uses' => 'TaxonomyController@taxonomyitem'));
	Route::post('/taxonomy-item/{id}', array('before' => 'auth|role:access-taxonomy',  'uses' => 'TaxonomyController@taxonomyitem'));
	Route::get('/save_taxonomyitem', array('before' => 'auth|role:access-taxonomy',  'uses' => 'TaxonomyController@save_taxonomyitem'));
	Route::post('/save_taxonomyitem', array('before' => 'auth|role:access-taxonomy',  'uses' => 'TaxonomyController@save_taxonomyitem'));
	Route::post('/get_taxonomyitem', array('before' => 'auth|role:access-taxonomy',  'uses' => 'TaxonomyController@get_taxonomyitem'));
	Route::get('/get_taxonomyitem', array('before' => 'auth|role:access-taxonomy',  'uses' => 'TaxonomyController@get_taxonomyitem'));
	Route::post('/delete_taxonomyitem', array('before' => 'auth|role:access-taxonomy',  'uses' => 'TaxonomyController@delete_taxonomyitem'));


});

