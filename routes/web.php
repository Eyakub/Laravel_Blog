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


//category
Route::get('/add-category', 'SuperAdminController@add_category');
Route::post('/save-category', 'SuperAdminController@save_category');
Route::get('/manage-category', 'SuperAdminController@manage_category');
Route::get('/unpublished-category/{id}', 'SuperAdminController@unpublished_category');
Route::get('/published-category/{id}', 'SuperAdminController@published_category');
Route::get('/delete-category/{id}', 'SuperAdminController@delete_category');
Route::get('/edit-category/{id}', 'SuperAdminController@edit_category');
Route::post('/update-category', 'SuperAdminController@update_category');


//blog
Route::get('/add-blog', 'SuperAdminController@add_blog');
Route::post('/save-blog', 'SuperAdminController@save_blog');
Route::post('/manage-blog', 'SuperAdminController@manage_blog');
Route::post('/edit-blog/{id}', 'SuperAdminController@edit_blog');
Route::post('/update-blog', 'SuperAdminController@update_blog');
Route::post('/unpublished-blog/{id}', 'SuperAdminController@unpublished_blog');
Route::post('/published-blog/{id}', 'SuperAdminController@published_blog');
Route::post('/delete-blog/{id}', 'SuperAdminController@delete_blog');


Route::get('/logout', 'SuperAdminController@logout');
