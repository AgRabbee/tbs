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

Route::get('/dashboard', 'DashboardController@index')->name('main');
Route::get('/signin','Auth\AuthController@getSignin');
Route::post('/signin','Auth\AuthController@Signin');

Route::get('/signup','Auth\AuthController@getSignup');
Route::post('/signup','Auth\AuthController@Signup');

Route::get('/bus','PagesController@bus');


//Company
//--------------------------------------------

Route::group(['middleware'=>['auth']],function(){
    //Super Admin
    //--------------------------------------------
    Route::get('/dashboard/new/admins','CompanyController@company_admin');




    //User
    //--------------------------------------------
    Route::get('/company/register','CompanyController@create');
    Route::post('/company/register','CompanyController@store');

});
