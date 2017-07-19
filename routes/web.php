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

Route::resource('posts','PostController');

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle']) -> where('slug','[\w\d\-\_]+');
 
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
// slug must be either words or numbers or _ or -

//log in button
Route::get('loginas', 'PagesController@getLogin')->name('loginas');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout','Auth\LoginController@logout' ) ->name('designer.logout');

//Categories
//this will create CRUD

Route::resource('categories', 'CategoryController', ['except' => ['create']]);

//Consumer interface
Route::get('register/consumer', 'Auth\ConsumerRegisterController@showRegistrationForm')->name('register.consumer');
Route::post('register/consumer', 'Auth\ConsumerRegisterController@register');

//logout
Route::get('/consumer/logout', 'Auth\ConsumerLoginController@logout')->name('consumer.logout');
Route::get('logout', 'Auth\LoginController@userLogout')-> name('logout');

Route::prefix('consumer')->group(function(){
	Route::get('/login', 'Auth\ConsumerLoginController@showLoginForm') ->name('consumer.login');
	Route::post('/login', 'Auth\ConsumerLoginController@login') ->name('consumer.login.submit');
	Route::get('', 'ConsumerController@index') -> name('consumer.dashboard');

	//password reset routes
	Route::post('/password/email', 'Auth\ConsumerForgotPasswordController@sendResetLinkEmail')	->name('consumer.password.email');
	Route::get('/password/reset', 'Auth\ConsumerForgotPasswordController@showLinkRequestForm')->name('consumer.password.request');
	Route::post('/password/reset', 'Auth\ConsumerResetPasswordController@reset');
	Route::get('/password/reset/{token}','Auth\ConsumerResetPasswordController@showResetForm')->name('consumer.password.reset');

});
