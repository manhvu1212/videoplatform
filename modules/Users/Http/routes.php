<?php

Route::group(['prefix' => 'manager/users', 'namespace' => 'Modules\Users\Http\Controllers'], function () {
    Route::get('/', array('before' => 'auth|role:access-users', 'uses' => 'UsersController@index'));
    Route::get('/edit', array('before' => 'auth|role:access-users', 'uses' => 'UsersController@edit'));
    Route::get('/edit/{id}', array('before' => 'auth|role:access-users', 'uses' => 'UsersController@edit'));
    Route::get('/groups', array('before' => 'auth|role:access-groups-users', 'uses' => 'GroupsController@groups'));
    Route::post('/store', array('before' => 'auth|role:access-users', 'uses' => 'UsersController@store'));

    Route::post('/groups/savegroups', array('before' => 'auth|role:access-groups-users', 'uses' => 'GroupsController@savegroups'));
    Route::post('/destroy', array('before' => 'auth|role:access-users', 'uses' => 'UsersController@destroy'));
    Route::post('/deletegroup', array('before' => 'auth|role:access-groups-users', 'uses' => 'GroupsController@deletegroups'));
    Route::get('/permission', array('before' => 'auth|role:access-permission', 'uses' => 'GroupsController@permission'));
    Route::post('/storepermission', array('before' => 'auth|role:access-permission', 'uses' => 'GroupsController@storepermission'));
    Route::post('/savegroupspermission', array('before' => 'auth|role:access-permission', 'uses' => 'GroupsController@savegroupspermission'));
    Route::post('/savegroupspermission', array('before' => 'auth|role:access-permission', 'uses' => 'GroupsController@savegroupspermission'));
    Route::post('/destroypermisstion', array('before' => 'auth|role:access-permission', 'uses' => 'GroupsController@destroypermisstion'));
    Route::post('/deletepermission', array('before' => 'auth|role:access-permission', 'uses' => 'GroupsController@deletepermission'));
    Route::post('/changstatususer', array('before' => 'auth|role:access-permission', 'uses' => 'UsersController@changstatususer'));
});

Route::group(['prefix' => 'user', 'namespace' => 'Modules\Users\Http\Controllers'], function () {
    Route::get('/login', array('uses' => 'UsersController@login'));
    Route::post('/loginsubmit', array('uses' => 'UsersController@loginsubmit'));
    Route::post('/check_login', array('uses' => 'UsersController@checklogin'));
    Route::post('/signup', array('uses' => 'UsersController@signup'));
    Route::get('/logout', array('uses' => 'UsersController@logout'));
    Route::get('/myprofiles', array('uses' => 'UsersController@myprofiles'));
    Route::post('/myprofilestore', array('uses' => 'UsersController@myprofilestore'));

});