<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::resource('/', 'HomeController');

/*
 * Auth
 */
Route::group(['as' => 'auth.', 'namespace' => 'Auth'], function () {
    Route::get('sudo', [
        'uses' => 'LoginController@showLoginForm',
        'as'   => 'login',
    ]);
    Route::get('sudo/{provider}', [
        'uses' => 'SocialiteController@redirectToProvider',
        'as'   => 'oauth',
    ]);
    Route::get('sudo/{provider}/callback', [
        'uses' => 'SocialiteController@handleProviderCallback',
        'as'   => 'oauth.callback',
    ]);
    Route::get('exit', [
        'uses' => 'LoginController@logout',
        'as'   => 'logout',
    ]);
});

Route::get('sitemap', 'SitemapController@index');
