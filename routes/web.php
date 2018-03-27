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

//we can call view this way or using controller withing under process

//Route::get('/', function () {
//    return view('eyakub');
//});


Route::get('/', 'WelcomeController@index');
Route::get('/blog-details', 'WelcomeController@blog_details');
Route::get('/contact', 'WelcomeController@contact');


/**
 * start admin panel
 */
Route::get('/admin-panel', 'AdminController@index');
Route::post('/admin-login','AdminController@admin_login_check'); //form er khetre (@post)
