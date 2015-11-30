<?php

Route::group(['prefix' => 'frontend', 'namespace' => 'Modules\Frontend\Http\Controllers'], function()
{
	Route::get('/home', 'FrontendController@home');
	Route::get('/about', 'FrontendController@about');
});
Route::group(['namespace' => 'Modules\Frontend\Http\Controllers'], function()
{
    Route::get('/', 'FrontendController@home');
    Route::get('/home', 'FrontendController@home');
    Route::get('/about', 'FrontendController@about');
    Route::get('/page-{alias}', 'FrontendController@page');
    Route::get('/post-{alias}', 'FrontendController@post');

    Route::get('/Contact', 'FrontendController@contact');
    Route::post('/Contact', 'FrontendController@contact');

    Route::get('/Faq', 'FrontendController@faq');
    Route::get('/search-faq', 'FrontendController@faq');
    Route::get('/Log-in-Sign-Up', 'FrontendController@login_signup');
    Route::get('/Log-in-Sign-Up/{alias}', 'FrontendController@login_signup1');
    Route::get('/register', 'FrontendController@register');
    Route::get('/register-step1', 'FrontendController@register_step1');
    Route::post('/register-step2', 'FrontendController@register_step2');
    Route::get('/register-step2', 'FrontendController@register_step2');
    Route::post('/register-step3', 'FrontendController@register_step3');
    Route::get('/register-step3', 'FrontendController@register_step3');
    Route::post('/register-step4', 'FrontendController@register_step4');
    Route::get('/register-step4', 'FrontendController@register_step4');
    Route::post('/register-step5', 'FrontendController@register_step5');
    Route::get('/register-step5', 'FrontendController@register_step5');
    Route::post('/register-step6', 'FrontendController@register_step6');
    Route::get('/register-step6', 'FrontendController@register_step6');
    Route::post('/register-step7', 'FrontendController@register_step7');
    Route::get('/register-step7', 'FrontendController@register_step7');
    Route::post('/register-step8', 'FrontendController@register_step8');
    Route::get('/create-pdf/{slug}', 'FrontendController@create_pdf');
    Route::get('/docusign/{slug}', 'FrontendController@docusign');
    Route::get('/success/{slug}', 'FrontendController@success');
    Route::get('/forms', 'FrontendController@template_form');
    Route::get('/form/{alias}', 'FrontendController@detail_form');


});