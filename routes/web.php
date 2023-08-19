<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\FileController;
use App\Http\Controllers\Employer\JobController;
use App\Http\Controllers\User\ProfileController;

use App\Http\Controllers\Employer\PostJobController;
use App\Http\Controllers\Employer\RequestController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\Auth\LoginController as AuthUserLogin;

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\Auth\LoginController as AuthAdminLogin;
use App\Http\Controllers\User\Auth\LogoutController as AuthUserLogout;
use App\Http\Controllers\Admin\Auth\LogoutController as AuthAdminLogout;
use App\Http\Controllers\User\Auth\RegisterController as AuthUserRegister;
use App\Http\Controllers\Employer\HomeController as EmployerHomeController;
use App\Http\Controllers\Employer\Auth\LoginController as AuthEmployerLogin;
use App\Http\Controllers\Employer\Auth\LogoutController as AuthEmployerLogout;
use App\Http\Controllers\Employer\Auth\RegisterController as AuthEmployerRegister;

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
    return redirect()->route('user.home');
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
    Route::controller(AuthUserRegister::class)->group( function() {
        Route::get('/auth/register', 'index')->name('user.register')->middleware('guest:user');
        Route::post('/auth/register', 'register')->name('user.auth.register');
    });
    Route::controller(UserHomeController::class)->group( function() {
            Route::get('/home', 'index')->name('user.home');
            Route::get('/search', 'search')->name('search.job');
        });
    Route::middleware('auth')->group(function () {
        Route::controller(ProfileController::class)->group(function() {
            Route::get('/profile', 'index')->name('user.profile');
        });
        Route::controller(FileController::class)->group(function() {
            Route::post('/fileupload', 'store')->name('file-upload');
        });
        Route::controller(AuthUserLogout::class)->group(function() {
            Route::post('/auth/logout', 'logout')->name('user.logout');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Employer Web Routes
    |--------------------------------------------------------------------------
    */
    Route::controller(AuthEmployerLogin::class)->group( function() {
        Route::get('/employer/login', 'index')->name('employer.login')->middleware('guest:employer');
        Route::post('/employer/login', 'login')->name('employer.auth.login');
    });
    Route::controller(AuthEmployerRegister::class)->group( function() {
        Route::get('/employer/register', 'index')->name('employer.register')->middleware('guest:employer');
        Route::post('/employer/register', 'register')->name('employer.auth.register');
    });
    Route::middleware('auth:employer')->group(function () {
        Route::controller(EmployerHomeController::class)->group( function() {
            Route::get('/employer/home', 'index')->name('employer.home');
        });
        Route::controller(JobController::class)->group( function() {
            Route::get('/employer/jobs', 'index')->name('employer.jobs');
        });
        Route::controller(PostJobController::class)->group( function() {
            Route::get('/employer/post/jobs', 'index')->name('employer.posts.jobs');
            Route::post('/employer/post/jobs', 'store')->name('post.job');
        });
        Route::controller(RequestController::class)->group( function() {
            Route::get('/employer/requests', 'index')->name('employer.requests');
        });
        Route::controller(AuthEmployerLogout::class)->group(function() {
            Route::post('/employer/logout', 'logout')->name('employer.logout');
        });
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
