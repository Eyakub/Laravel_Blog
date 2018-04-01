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
Route::get('/dashboard', 'SuperAdminController@index');


Route::get('/add-category', 'SuperAdminController@add_category');
Route::post('/save-category', 'SuperAdminController@save_category');
Route::get('/manage-category', 'SuperAdminController@manage_category');
Route::get('/unpublished-category/{id}', 'SuperAdminController@unpublished_category');
Route::get('/published-category/{id}', 'SuperAdminController@published_category');
Route::get('/delete-category/{id}', 'SuperAdminController@delete_category');


Route::get('/logout', 'SuperAdminController@logout');
