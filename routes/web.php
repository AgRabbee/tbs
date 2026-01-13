<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\CompanyTransportController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
//require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PagesController::class, 'bus']);

Route::prefix('')->group(function () {
    Route::get('/signin', [AuthController::class, 'getSignin']);
    Route::post('/signin', [AuthController::class, 'signin']);
    Route::get('/signup', [AuthController::class, 'getSignup']);
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/logout', [AuthController::class, 'logOut'])->name('logout');

    Route::post('/bus/search', [PagesController::class, 'search']);
    Route::get('/seat_allocations', [PagesController::class, 'seat_allocations']);

    Route::post('/bus/booking', [PagesController::class, 'prebooking']);
    Route::post('/charge', [PagesController::class, 'completePayment']);

    Route::get('/print', [PagesController::class, 'print']);
    Route::get('/print_invoice', [PagesController::class, 'print_invoice']);

    Route::get('/contact', [PagesController::class, 'contact_form']);
    Route::post('/contact', [PagesController::class, 'contact_admin']);
});

/*
|--------------------------------------------------------------------------
| Super Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'superAdmin'])
    ->prefix('dashboard')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index']);

        Route::prefix('new/user')->group(function () {
            Route::post('/active', [DashboardController::class, 'user_active']);
            Route::post('/pause', [DashboardController::class, 'user_pause']);
            Route::post('/deny', [DashboardController::class, 'user_deny']);
        });

        Route::prefix('profile')->group(function () {
            Route::get('/', [DashboardController::class, 'userProfile']);
            Route::post('/', [DashboardController::class, 'updateProfile']);
            Route::post('/changePassword', [DashboardController::class, 'passwordChange']);
        });

        Route::get('/allusers', [DashboardController::class, 'allUser']);

        Route::prefix('new/admins')->group(function () {
            Route::get('/', [CompanyController::class, 'company_admin']);
            Route::post('/active', [CompanyController::class, 'company_admin_active']);
            Route::post('/pause', [CompanyController::class, 'company_admin_pause']);
            Route::post('/deny', [CompanyController::class, 'company_admin_deny']);
        });

        Route::get('/all/trips', [TripController::class, 'allTrips']);

        Route::prefix('all/transport_type')->group(function () {
            Route::get('/', [TransportController::class, 'index']);
        });

        Route::get('/add/transport_type', [TransportController::class, 'create']);
        Route::post('/add/transport', [TransportController::class, 'store']);
        Route::post('/edit/{id}/transport', [TransportController::class, 'update']);
        Route::post('/delete/{id}/transport', [TransportController::class, 'destroy']);

        Route::get('/sales/reports', [CompanyController::class, 'allSalesReports']);
    });

/*
|--------------------------------------------------------------------------
| Company Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('company')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'companyAdmin']);

        Route::prefix('dashboard')->group(function () {

            Route::get('/all/trips', [TripController::class, 'index']);
            Route::get('/add/trip', [TripController::class, 'create']);
            Route::post('/add/trip', [TripController::class, 'store']);
            Route::post('/edit/{id}/trip', [TripController::class, 'update']);

            Route::get('/all/drivers', [CompanyController::class, 'allDrivers']);
            Route::get('/add/driver', [CompanyController::class, 'addDriverForm']);
            Route::post('/add/driver', [CompanyController::class, 'addDriver']);

            Route::get('/all/sales', [CompanyController::class, 'allSales']);
            Route::get('/sales/reports', [CompanyController::class, 'salesReports']);
        });

        Route::get('/add/transport', [CompanyTransportController::class, 'create']);
        Route::post('/add/transport', [CompanyTransportController::class, 'store']);

        Route::get('/all/buses', [CompanyTransportController::class, 'allBuses']);

        Route::prefix('admin/profile')->group(function () {
            Route::get('/', [DashboardController::class, 'userProfile']);
            Route::post('/', [DashboardController::class, 'updateProfile']);
            Route::post('/changePassword', [DashboardController::class, 'passwordChange']);
        });
    });

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'client'])->group(function () {

    Route::post('/company/register', [CompanyController::class, 'store']);

    Route::get('/member', [PagesController::class, 'memberCheck']);

    Route::prefix('profile')->group(function () {
        Route::get('/', [DashboardController::class, 'userProfile']);
        Route::post('/', [DashboardController::class, 'updateProfile']);
        Route::post('/changePassword', [DashboardController::class, 'passwordChange']);
    });
});


Route::get('/__sweet_debug', function () {
    Alert::success('Debug OK', 'If you see this, SweetAlert works');
    return view('sweet-debug');
});

Route::get('/__session_test', function () {
    session(['test_key' => 'session works']);
    return session('test_key');
});
