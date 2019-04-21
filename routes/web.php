<?php

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');
// Route::post('register', 'FrontController@register');
// Route::get("emailcheck2", "FrontController@emailcheck");
Route::post('register', 'registerController@store');

// reset-password
//--------------------------------------------------
/**************************
 * admins
  * *************************/
Route::view('/profile', 'common/profile');
Route::get('/', 'ViewController@view');
Route::resource('Users', 'UsersController');
Route::get('category', 'QuestionController@category');
Route::put('Correct/{id}', 'QuestionController@Correct');
Route::resource('Question', 'QuestionController');
Route::resource('Answer', 'QuestionController@answer');
Route::resource('Authority', 'AuthorityController');
Route::resource('Track', 'TrackController');
Route::get('Track_ordered', 'TrackController@tracks_ordered'); //json
Route::resource('Category', 'CategoryController');
Route::get('emailcheck', 'UsersController@emailcheck');
Route::get('trackOptions','TrackController@travesre_for_options');
Route::get('categoryOptions','CategoryController@travesre_for_options');
Route::get('AuthcategoryOptions','AuthProfileController@travesre_for_options');
Route::get('AuthtrackOptions','AuthProfileController@travesre_for_options1');
Route::post('AuthProfile','AuthProfileController@addTrack');
Route::resource('Tracks','TracksController1');
Route::resource('Home','HomeController');

//Route::post('addTrackToAuth', array('as' => 'addTrack', 'uses' => 'AuthProfileController@addTrack'));
Route::get('showAuth/{id}','AuthProfileController@index');

