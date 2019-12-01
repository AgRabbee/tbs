<?php

Auth::routes();

    Route::get('/', 'PagesController@bus');
    Route::get('/signin','Auth\AuthController@getSignin');
    Route::post('/signin','Auth\AuthController@Signin');
    Route::get('/signup','Auth\AuthController@getSignup');
    Route::post('/signup','Auth\AuthController@Signup');

    // Route::get('/bus','PagesController@bus');
    Route::post('/bus/search','PagesController@search');

    Route::get('/seat_allocations','PagesController@seat_allocations');


    Route::post('/bus/booking','PagesController@prebooking');
    Route::post('/charge','PagesController@completePayment');
    Route::get('/print','PagesController@print');
    Route::get('/print_invoice','PagesController@print_invoice');
    Route::get('/contact','PagesController@contact_form');
    Route::post('/contact','PagesController@contact_admin');


    //Super Admin
    //--------------------------------------------

Route::group(['middleware'=>['auth','superAdmin']],function(){

    Route::get('/dashboard', 'DashboardController@index');

    Route::post('/dashboard/new/user/active','DashboardController@user_active');
    Route::post('/dashboard/new/user/pause','DashboardController@user_pause');
    Route::post('/dashboard/new/user/deny','DashboardController@user_deny');


    Route::get('/dashboard/profile','DashboardController@userProfile');
    Route::post('/dashboard/profile','DashboardController@updateProfile');
    Route::post('/dashboard/profile/changePassword','DashboardController@passwordChange');

    Route::get('/dashboard/allusers','DashboardController@allUser');

    Route::get('/dashboard/new/admins','CompanyController@company_admin');
    Route::post('/dashboard/new/admins/active','CompanyController@company_admin_active');
    Route::post('/dashboard/new/admins/pause','CompanyController@company_admin_pause');
    Route::post('/dashboard/new/admins/deny','CompanyController@company_admin_deny');


    Route::get('/dashboard/all/trips','TripController@allTrips');


    Route::get('/dashboard/all/transport_type','TransportController@index');
    Route::get('/dashboard/add/transport_type','TransportController@create');
    Route::post('/dashboard/add/transport','TransportController@store');
    Route::post('/dashboard/edit/{id}/transport','TransportController@update');
    Route::post('/dashboard/delete/{id}/transport','TransportController@destroy');

    Route::get('/dashboard/sales/reports','CompanyController@allSalesReports');


});



    // company admin
    // -----------------------------------------------------------------------

Route::group(['middleware'=>['auth','admin']],function(){

    Route::get('company/dashboard', 'DashboardController@companyAdmin');

    Route::get('/company/dashboard/all/trips','TripController@index');
    Route::get('/company/dashboard/add/trip','TripController@create');
    Route::post('/company/dashboard/add/trip','TripController@store');
    Route::post('/company/dashboard/edit/{id}/trip','TripController@update');

    Route::get('/company/add/transport','CompanyTransportController@create');
    Route::post('/company/add/transport','CompanyTransportController@store');

    Route::get('/company/all/buses','CompanyTransportController@allBuses');

    Route::get('/company/dashboard/all/drivers','CompanyController@allDrivers');
    Route::get('/company/dashboard/add/driver','CompanyController@addDriverForm');
    Route::post('/company/dashboard/add/driver','CompanyController@addDriver');


    Route::get('/company/admin/profile','DashboardController@userProfile');
    Route::post('/company/admin/profile','DashboardController@updateProfile');
    Route::post('/company/admin/profile/changePassword','DashboardController@passwordChange');

    Route::get('/company/dashboard/all/sales','CompanyController@allSales');

    Route::get('/company/dashboard/sales/reports','CompanyController@salesReports');


});

Route::group(['middleware'=>['client','auth']],function(){
    //User
    //--------------------------------------------
    // Route::get('/company/register','CompanyController@create');
    Route::post('/company/register','CompanyController@store');
    // Route::get('/company/dashboard','CompanyController@company_admin_panel');


    //authenticate user seat booking
    //--------------------------------------------
    // Route::get('/bus/search','PagesController@search');
    // Route::post('/bus/booking','PagesController@prebooking');
    Route::get('/member','PagesController@memberCheck');

    //authenticate user profile
    //--------------------------------------------
    Route::get('/profile','DashboardController@userProfile');
    Route::post('/profile','DashboardController@updateProfile');
    Route::post('/profile/changePassword','DashboardController@passwordChange');

});
