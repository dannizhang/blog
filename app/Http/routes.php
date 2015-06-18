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





Route::get('home', 'HomeController@index');
Route::get('about', 'PagesController@about');


//Route::get('articles','ArticlesController@index');
//
//Route::get('articles/create','ArticlesController@create');
//
//Route::get('articles/{id}','ArticlesController@show');
//
//Route::post('articles','ArticlesController@store');


Route::resource('articles','ArticlesController');


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('tags/{tags}', 'TagsController@show');

// Route::get('/', function())
// {
// 	$user = new App\User;

// 	event(new UserWasBanned($user))
// 	return view('welcome');
// }


Route::get('/', function()
{
	new Billing;
	new Acme\Billing\Billing;

});



// Route::get('/', 'WelcomeController@index');

// Route::get('contact', 'WelcomeController@contact');

// Route::get('home', 'HomeController@index');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);





