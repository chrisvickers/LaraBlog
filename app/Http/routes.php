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

/**
 * API ROUTES
 */



/**
 * MAIN ROUTES
 */

//Home
Route::Get('/', array('as' => 'MainController@home', 'uses' => 'MainController@home'));

//Single Post
Route::get('{year}/{month}/{day}/{slug}',array('as' => 'main.single-post', 'uses' => 'MainController@singlePost'));

//Archives
Route::get('{year}',array('as' => 'main.archive.year', 'uses' => 'ArchiveController@year'));
Route::get('{year}/{month}', array('as' => 'main.archive.month', 'uses' => 'ArchiveController@month'));
Route::Get('{year}/{month}/{day}', array('as' => 'main.archive.day', 'uses' => 'ArchiveController@day'));
