<?php

use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Illuminate\Support\Facades\Redirect;

Route::group(['prefix' => 'manager/system', 'namespace' => 'Modules\System\Http\Controllers'], function()
{
	Route::get('/setting/email', array('before' => 'auth|role:access-settings',  'uses' => 'SystemController@email'));
	Route::get('/setting/file', array('before' => 'auth|role:access-settings',  'uses' => 'SystemController@file'));
	Route::get('/setting/site', array('before' => 'auth|role:access-settings',  'uses' => 'SystemController@site'));
	Route::post('/setting/site-setting-store', array('before' => 'auth|role:access-settings',  'uses' => 'SystemController@sitesettingstore'));
	Route::post('/setting/smtp-setting-store', array('before' => 'auth|role:access-settings',  'uses' => 'SystemController@smtpsettingstore'));
	Route::post('/setting/file-setting-store', array('before' => 'auth|role:access-settings',  'uses' => 'SystemController@filessettingstore'));
});

Route::group(['prefix' => 'dashboard', 'namespace' => 'Modules\System\Http\Controllers'], function()
{
    Route::get('/', 'SystemController@dashboard');
});




Route::filter('role', function($route, $request, $value)
{
    $user = Sentry::getUser();
    if (!$user->hasAccess($value))
    {
        return App::abort(403);
    }
});

Route::filter('auth', function()
{
    $user = Sentry::getUser();
    if(!isset($user['id'])||$user['id']==''){
        return  Redirect::to('user/login');
    }

});

Route::filter('cache.html', function($route, $request, $response = null)
{
    //if ($request->method() == 'GET' and Auth::guest() and ! Config::get('app.debug'))
    if (1)
    {
        $day = str_pad(date('d'), 2, '0', STR_PAD_LEFT);
        $hour = str_pad(date('h'), 2, '0', STR_PAD_LEFT);
        $url = preg_replace('/https?:\/\//', '', $request->url());

        $directory = public_path().'/cache/html/'.$day.'/'.$hour.'/'.$url;
        if ( ! File::isDirectory($directory))
        {
            File::makeDirectory($directory, 0777, true);
        }

        File::put($directory.'/index.html', $response->getContent());
    }
});
