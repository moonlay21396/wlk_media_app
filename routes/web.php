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
Route::get('user/register', 'Auth\RegisterController@show');
Route::post('user/register', 'Auth\RegisterController@register')->name('register');

Route::get('login', 'Auth\LoginController@loginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('/home', 'HomeController@index')->name('home');
//-----------------------Admin Dashboarc-----------------------------
// Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', 'BlogController@show_cat');
    Route::get('logout', 'Auth\LoginController@logout');

// Blog
    // Route::get('/admin/',function(){
    //     return view('site_admin.dashboard')->with(['url'=>'dashboard']);
    // });
    
    Route::post('/admin/cat/insert', 'BlogController@insert_category');
    Route::get('/admin/view_cat', 'BlogController@view_cat');    
    Route::get('/admin/edit_cat/{id}', 'BlogController@edit_cat');
    Route::post('/admin/update_cat', 'BlogController@update_cat');
    Route::delete('/delete/cat/{id}', 'BlogController@delete_cat');

// star
    Route::get('/admin/star','StarController@index');
    Route::post('/admin/star/insert', 'StarController@store');
    Route::get('/admin/view_star', 'StarController@get_all_star');
    Route::delete('/delete/star/{id}', 'StarController@destory');
    Route::get('/admin/edit_star/{id}', 'StarController@edit');

//company
    Route::get('/admin/company', 'CompanyController@index');
    Route::post('/admin/company/insert', 'CompanyController@store');
    Route::get('/admin/view_company', 'CompanyController@show');
    Route::get('/admin/edit_company/{id}', 'CompanyController@edit');
    Route::post('/admin/update_company', 'CompanyController@update');
    Route::delete('/delete/company/{id}', 'CompanyController@destroy');
//movie
    Route::get('/admin/movie', 'MovieController@index');
    Route::post('/admin/movie/insert', 'MovieController@store');
    Route::get('/admin/view_movie','MovieController@view_movie');
    Route::get('/admin/edit_movie/{id}', 'MovieController@edit');
    Route::post('/admin/update_movie', 'MovieController@update');
    Route::get('/admin/movie/detail/{id}', 'MovieController@movie_detail');  
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
