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
Route::post('ExecuteCode', 'QuestionController@ExecuteCode');
Route::resource('Question', 'QuestionController');
Route::resource('Answer', 'QuestionController@answer');
Route::resource('Authority', 'AuthorityController');
Route::resource('Track', 'TrackController');
Route::get('Track_ordered', 'TrackController@tracks_ordered'); //json
Route::get('emailcheck', 'UsersController@emailcheck');
Route::get('trackOptions','TrackController@travesre_for_options');
Route::get('categoryOptions','CategoryController@travesre_for_options');
Route::get('AuthcategoryOptions','AuthProfileController@travesre_for_options');
Route::get('AuthtrackOptions','AuthProfileController@travesre_for_options1');
Route::get('Exams','ExamController@index');
Route::get('Exams/{id}','ExamController@show');
Route::get('Exam/{id}','ExamController@showQuestions');
Route::post('Exam','ExamController@addQuestionToExam');
Route::post('Exams','ExamController@store');
Route::post('AuthProfile','AuthProfileController@addTrack');
Route::resource('Tracks','TracksController1');
Route::resource('Home','HomeController');
Route::resource('Category','CategoryController');
Route::get('/profile', 'UsersController@showProfile');
Route::get('/profile/update', 'UsersController@proUpdate');
Route::post('/profile/edit', 'UsersController@update');
Route::get('/activity', 'UsersController@activity');
Route::resource('/ExamSolve', 'ExamSolveController');
Route::GET('/UserProceededExams', 'UserProceededExamsController@UserProceededExams');
Route::GET('/SubmittedExams', 'UserProceededExamsController@SubmittedExams');
Route::GET('/ViewAnswers', 'UserProceededExamsController@ViewAnswers');
Route::post('/proceed', 'ExamSolveController@proceed');
// Route::get('/Category/{id?}','CategoryController@show');
// Route::get('/?view=Category&id={id?}','CategoryController@index');
