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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('hello', 'HelloController@index');

// Route::get('articles', 'ArticlesController@index');
// Route::get('articles/{id?}', 'ArticlesController@show');

Route::get('categories', 'CategoriesController@index');

Route::controller('pages', 'PagesController');

Route::resource('articles', 'ArticlesController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('lang/{lang}', function($lang){
	$available = ['en', 'th'];
	Session::put('locale', in_array($lang, $available)? $lang :
	Config::get('app.locale'));
	return redirect()->back();
});
