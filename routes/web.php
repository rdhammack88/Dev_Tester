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

Route::get('/', 'PagesController@index');

Route::get('/admin-login', 'PagesController@adminLogin');

Route::get('/admin-register', 'PagesController@adminRegister');

Route::resource('/quiz-choice', 'QuizChoicesController'); //PagesController@quizChoice

Route::get('/ajax/{route}', 'AjaxController@questionCount');

// Auth::routes();
Route::get('/question', 'QuestionsController@showQuestion');
Route::post('/question', 'QuestionsController@showQuestion');
Route::post('/question/{category}/{num}', 'QuestionsController@returnTest');

// Route::post('/question/{category}', 'QuizChoicesController@showQuestion'); //'PagesController@question');

// /questions

// Route::get('/question-count', 'QuestionsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
