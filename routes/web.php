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
Route::get('/blog-details/{id}', 'WelcomeController@blog_details');
Route::get('/blog-by-category/{id}', 'WelcomeController@blog_by_category');
Route::get('/contact', 'WelcomeController@contact');


/**
 * start admin panel
 */
Route::get('/admin-panel', 'AdminController@index');
Route::post('/admin-login','AdminController@admin_login_check'); //form er khetre (@post)
Route::get('/dashboard', 'SuperAdminController@index');


//category handle
Route::get('/add-category', 'SuperAdminController@add_category');
Route::post('/save-category', 'SuperAdminController@save_category');
Route::get('/manage-category', 'SuperAdminController@manage_category');
Route::get('/unpublished-category/{id}', 'SuperAdminController@unpublished_category');
Route::get('/published-category/{id}', 'SuperAdminController@published_category');
Route::get('/delete-category/{id}', 'SuperAdminController@delete_category');
Route::get('/edit-category/{id}', 'SuperAdminController@edit_category');
Route::post('/update-category', 'SuperAdminController@update_category');


//blog handle
Route::get('/add-blog', 'SuperAdminController@add_blog');
Route::post('/save-blog', 'SuperAdminController@save_blog');
Route::get('/manage-blog', 'SuperAdminController@manage_blog');
Route::get('/edit-blog/{id}', 'SuperAdminController@edit_blog');
Route::post('/update-blog', 'SuperAdminController@update_blog');
Route::get('/unpublished-blog/{id}', 'SuperAdminController@unpublished_blog');
Route::get('/published-blog/{id}', 'SuperAdminController@published_blog');
Route::get('/delete-blog/{id}', 'SuperAdminController@delete_blog');


//comments handle
Route::post('/save-comments', 'WelcomeController@save_comments');
Route::get('/manage-comments', 'SuperAdminController@manage_comments');
Route::get('/unpublished-comments/{id}', 'SuperAdminController@unpublished_comment');
Route::get('/published-comments/{id}', 'SuperAdminController@published_comment');
Route::get('/delete-comments/{id}', 'SuperAdminController@delete_comment');



//handle logout
Route::get('/admin-logout', 'SuperAdminController@admin_logout');
Route::get('/user-logout', 'SuperAdminController@logout');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
