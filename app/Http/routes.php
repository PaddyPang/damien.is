<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/', 'HomeController');

/*
 * Auth
 */
Route::group(['as' => 'auth.', 'namespace' => 'Auth'], function () {
    Route::get('sudo', [
        'uses' => 'AuthController@showLoginForm',
        'as'   => 'sudo',
    ]);
    Route::get('sudo/{provider}', [
        'uses' => 'AuthController@redirectToProvider',
        'as'   => 'oauth',
    ]);
    Route::get('sudo/{provider}/callback', [
        'uses' => 'AuthController@handleProviderCallback',
        'as'   => 'oauth.callback',
    ]);
    Route::get('exit', [
        'uses' => 'AuthController@logout',
        'as'   => 'logout',
    ]);
});

Route::get('sitemap', 'SitemapController@index');
