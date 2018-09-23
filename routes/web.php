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

Route::get('/', 'pagesController@index' );
//Route::get('/createquestion', 'pagesController@createquestion' );
//Route::get('/questions', 'pagesController@questions' );

Route::resource('questions','questionsController');
Route::get('/mcq','pagesController@mcq');
Route::get('/tf','pagesController@tf');
Route::get('/simple','pagesController@simple');
Route::post('/storemcq', 'questionsController@storemcq');
Route::post('/storetf', 'questionsController@storetf');
Route::get('/questions/{id}/take', 'questionsController@take');
Route::post('/answer', 'questionsController@answer');
