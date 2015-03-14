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

/**
 * ADMIN ROUTES
 */
Route::group(['prefix' => 'admin'], function()
{
	Route::get('/', array('as' => 'admin.index', 'uses' => 'AdminController@home'));

	Route::match(array('GET','POST'),'login',array('as' => 'admin.login', 'uses' => 'AuthController@login'));

	Route::get('logout',array('as' => 'admin.logout', 'uses' => 'AuthController@logout'));
	Route::get('register', array('as' => 'admin.register', 'uses' => 'AuthController@register'));
	Route::match(array('GET','POST'),'forgotten-password', array('as' => 'admin.forgotten-password', 'uses' => 'AuthController@forgottenPassword'));

	Route::post('store', array('as' => 'admin.store', 'uses' => 'AuthController@store'));
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
   Route::get('dashboard',array('as' => 'admin.dashboard', 'uses' => 'AdminController@dashboard'));


    //Settings
    Route::group(['prefix' => 'settings',], function()
    {

        Route::get('/', array('as' => 'admin.settings', 'uses' => 'SettingsController@index'));
        Route::get('/profile', array('as' => 'admin.settings.profile', 'uses' => 'SettingsController@profile'));
    });
});

/**
 * API ROUTES
 */



/**
 * MAIN ROUTES
 */

//Home
Route::Get('/', array('as' => 'main.home', 'uses' => 'MainController@home'));

//Single Post
Route::get('{year}/{month}/{day}/{slug}',array('as' => 'main.single.post', 'uses' => 'MainController@single',function($id){}))
    ->where(array('year' => '[0-9]+', 'month' => '[0-9]+', 'day' => '[0-9]+', 'slug' => '[a-z0-9-]+'));

//Archives
Route::get('/blog', array('as' => 'main.archive.all', 'uses' => 'ArchiveController@all'));
Route::get('{year}', array('as' => 'main.archive.year', 'uses' => 'ArchiveController@year', function($id) {}))->where('year', '[0-9]+');
Route::get('{year}/{month}', array('as' => 'main.archive.month', 'uses' => 'ArchiveController@month', function($id) {}))->where(array('month' => '[0-9]+', 'year' => '[0-9]+'));
Route::get('{year}/{month}/{day}', array('as' => 'main.archive.day', 'uses' => 'ArchiveController@day', function($id){}))->where(array('day' => '[0-9]+', 'month' => '[0-9]+', 'year' => '[0-9]+'));

//Page Not Post
Route::get('/{page}', array('as' => 'main.page', 'uses' => 'MainController@page', function($id){}))->where(array('page' => '[a-z0-9-]+'));
