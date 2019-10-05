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
Route::get('/home', 'DashboardController@home');
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
    Route::get('/dashboard/allusers','DashboardController@allUser');

    Route::get('/dashboard/new/admins','CompanyController@company_admin');
    Route::post('/dashboard/new/admins/active','CompanyController@company_admin_active');
    Route::post('/dashboard/new/admins/pause','CompanyController@company_admin_pause');
    Route::post('/dashboard/new/admins/deny','CompanyController@company_admin_deny');




    // company admin portions
    // -----------------------------------------------------------------------
    Route::get('/company/dashboard/all/trips','RouteController@index');
    Route::get('/company/dashboard/add/trip','RouteController@create');
    Route::post('/company/dashboard/add/trip','RouteController@store');










    // insert locations sql
    Route::get('/dashboard/add_divisions','DashboardController@divisions');
    // Route::get('/dashboard/add_districts','DashboardController@districts');



    //User
    //--------------------------------------------
    Route::get('/company/register','CompanyController@create');
    Route::post('/company/register','CompanyController@store');
    Route::get('/company/dashboard','CompanyController@company_admin_panel');














});
