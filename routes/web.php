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


 //others

Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');

Route::get('about', 'PagesController@getAbout');

Route::get('/', 'PagesController@getIndex');

Route::resource('designs','PostController');

Route::get('designer/{slug}', ['as' => 'designs.single', 'uses' => 'BlogController@getSingle']) -> where('slug','[\w\d\-\_]+');
 
Route::get('designer', ['uses' => 'BlogController@getIndex', 'as' => 'designs.index']);
// slug must be either words or numbers or _ or -


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout','Auth\LoginController@logout' );

//Categories
//this will create CRUD

Route::resource('categories', 'CategoryController', ['except' => ['create']]);