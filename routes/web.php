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

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test/'.LaravelLocalization::setLocale() ,function (){

    dd(LaravelLocalization::setLocale())   ;
});

//Route::prefix('admin/'.LaravelLocalization::setLocale())->middleware('localize','localeSessionRedirect', 'localizationRedirect', 'localeViewPath')->group(function () {


//
//    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.post');

//    Route::get('/', 'Admin\DashboardController@index');

//}) ;

Route::group([
    'prefix' => LaravelLocalization::setLocale().'/admin',
    'middleware' => ['localize','web'],
//    'namespace' => 'Modules\Blog\Http\Controllers',
], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin-dashboard');
//    dd(LaravelLocalization::setLocale())   ;
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.post');
    Route::get('/logout','Auth\AdminLoginController@adminlogout')->name('admin.logout');
//    Route::get('posts', ['as' => 'blog.post.index', 'uses' => 'PublicController@index']);
});