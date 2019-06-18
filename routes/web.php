<?php

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');
// Route::post('register', 'FrontController@register');
// Route::get("emailcheck2", "FrontController@emailcheck");



/**************************
 * admins
 * *************************/
	// Route::get('/', function () {
	//     return view('welcome');
	// });

	Route::get('/', 'ViewController@view');

 
Route::view('/profile', 'common/profile');
Route::resource('Users', 'UsersController');
Route::get('category', 'QuestionController@category');
Route::put('Correct/{id}', 'QuestionController@Correct');
Route::resource('Question', 'QuestionController');
Route::resource('Answer', 'QuestionController@answer');
Route::get('emailcheck', 'UsersController@emailcheck');

