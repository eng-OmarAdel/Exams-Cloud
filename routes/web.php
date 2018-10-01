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

Auth::routes();

Route::group([/*'middleware' => 'can:admin'*/], function() {
    Route::get('adminsec', 'AdminController@view');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

///////////////////////////// Categories and their SubCategoies ///////////////////
Route::resource("Category", "CategoryController");
Route::delete("Categorydelete/{id}", "CategoryController@Categorydelete");

Route::resource("SubCategories", "SubCategoryController");
Route::delete("SubCategoriesdelete/{id}", "SubCategoryController@SubCategorydelete");
Route::get("SubCategories2/{id}", "SubCategoryController@SubCategory2");


/////////////////////////////////////////////////////////////////////////
Route::resource("Question", "QuestionController");
Route::delete("Questiondelete/{id}", "QuestionController@Questiondelete");

/* =================    Examination ===============*/

Route::get('exam/generate', '/ExamController@generate');