<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(CustomAuthController::class)->group(function () {
    Route::get('/', 'loginPage');
    Route::get('/sign-up-user', 'signUpUser')->name('sign-up-user');
    Route::post('/user-register', 'userRegister');
    Route::post('/user-login', 'userLogin');
});

Route::middleware(['auth','custom_check_auth'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard-panel', 'dashboardPanel');
        Route::get('/user-logout', 'signOut');
    });
});