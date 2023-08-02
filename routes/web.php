<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController as AuthUserLogin;
use App\Http\Controllers\Admin\Auth\LoginController as AuthAdminLogin;
use App\Http\Controllers\Admin\Auth\LogoutController as AuthAdminLogout;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'prevent-back-history'], function () {
    /*
    |--------------------------------------------------------------------------
    | User Web Routes
    |--------------------------------------------------------------------------
    */
    Route::controller(AuthUserLogin::class)->group( function() {
        Route::get('/auth/login', 'index')->name('user.login')->middleware('guest:user');
        Route::post('/auth/login', 'login')->name('user.auth.login');
    });


    /*
    |--------------------------------------------------------------------------
    | Admin Web Routes
    |--------------------------------------------------------------------------
    */
    Route::controller(AuthAdminLogin::class)->group( function() {
        Route::get('/admin/login', 'index')->name('admin.login')->middleware('guest:admin');
        Route::post('/admin/login', 'login')->name('admin.auth.login');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::controller(AdminHomeController::class)->group(function() {
            Route::get('/admin/home', 'index')->name('admin.home');
        });
        Route::controller(AuthAdminLogout::class)->group(function() {
            Route::post('/admin/logout', 'logout')->name('admin.logout');
        });
    });
});