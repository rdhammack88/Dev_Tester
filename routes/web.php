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
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

Route::get('/admin-login', 'PagesController@adminLogin');
Route::get('/admin-register', 'PagesController@adminRegister');
Route::get('/admin/dashboard', 'DashboardController@index');


Route::resource('/quiz-choice', 'QuizChoicesController'); //PagesController@quizChoice

Route::get('/ajax/{count}/{route}', 'AjaxController@index');
// Route::get('/ajax/admin/login', 'AjaxController@loginSwitch');
// Route::get('/ajax/admin/register', 'AjaxController@registerSwitch');

// Auth::routes();
Route::get('/question', 'QuestionsController@showQuestion');
Route::post('/question', 'QuestionsController@showQuestion');
Route::post('/question/{category}/{num}', 'QuestionsController@showQuestion');

Route::get('/quizFinal', 'QuestionsController@quizComplete');

// Route::post('/question/{category}', 'QuizChoicesController@showQuestion'); //'PagesController@question');

// /questions

// Route::get('/question-count', 'QuestionsController@index');


// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
