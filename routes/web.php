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

Route::get('/', function () { return view('welcome'); });
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact', 'ContactPageController@contact')->name('contact');
Route::post('/contact', 'ContactPageController@proc_contact_msg')->name('contact');
Route::get('/contact/{contact_msg}', 'ContactPageController@display_contact_msg')->name('display_contact_msg');



