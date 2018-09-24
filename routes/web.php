<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/createquestion', 'pagesController@createquestion' );
//Route::get('/questions', 'pagesController@questions' );

Route::resource('questions','questionsController');

Route::get('/mcq','pagesController@mcq')->middleware('auth');;
Route::get('/tf','pagesController@tf')->middleware('auth');;
Route::get('/simple','pagesController@simple')->middleware('auth');;

Route::post('/storemcq', 'questionsController@storemcq');
Route::post('/storetf', 'questionsController@storetf');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questions/{id}/take', 'questionsController@take')->middleware('auth');
Route::post('/answer', 'questionsController@answer')->middleware('auth');;

Route::get('/', 'pagesController@index' );
Route::get('/home', 'pagesController@index' );
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
