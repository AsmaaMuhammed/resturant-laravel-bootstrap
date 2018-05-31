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
Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'HomeSiteController@index');
    Route::get('/blog','HomeSiteController@blog');
    Route::get('/events','HomeSiteController@events');
    Route::get('/contacts', 'HomeSiteController@getContact');
    Route::post('/contacts', 'HomeSiteController@postContact');
    Route::get('/menu','HomeSiteController@menu');
    Route::get('/comments/{id}/{type}','HomeSiteController@comments');
    Route::get('/search-for-dishes/{cat_id?}','HomeSiteController@searchForDishes');
    Route::post('/add-comment','HomeSiteController@addComment');
    Route::post('/reply','HomeSiteController@addReply');
    Route::get('/share','HomeSiteController@share');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'HomeController@admin')->middleware('admin');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::resource('/comments', 'CommentsController');
    Route::resource('/replies', 'RepliesController');
    Route::resource('/general-desc', 'GeneralDescController');
    Route::resource('/news', 'NewsController');
    Route::resource('/events', 'EventsController');
    Route::resource('/services', 'ServicesController');
    Route::resource('/about', 'AboutController');
    Route::resource('/dishes', 'DishesController');
    Route::resource('/clients', 'ClientsController');
    Route::resource('/follow-us', 'ContactsController');
    Route::resource('/posts', 'PostsController');
});
