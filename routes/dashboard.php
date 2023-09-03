<?php

use Illuminate\Support\Facades\Route;

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

Route::group([], function() {
    // Login
    Route::get('register', [App\Http\Controllers\Dashboard\Auth\LoginController::class,'register'])->name('user_register');
    Route::post('register', [App\Http\Controllers\Dashboard\Auth\LoginController::class,'register'])->name('user_register');
    Route::get('login', [App\Http\Controllers\Dashboard\Auth\LoginController::class,'showLoginForm'])->name('user_login');
    Route::post('login', [App\Http\Controllers\Dashboard\Auth\LoginController::class,'login']);
    Route::post('logout', [App\Http\Controllers\Dashboard\Auth\LoginController::class,'logout'])->name('user_logout');
    // Password Reset Routes...
//    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
});



//'auth:web',
Route::group(['middleware' =>['localization']], function() {

    Route::get('/', [App\Http\Controllers\Dashboard\UsersController::class, 'index'])->name('dashboard.home');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [App\Http\Controllers\Dashboard\UsersController::class, 'index']);
        Route::get('/data', [App\Http\Controllers\Dashboard\UsersController::class, 'data']);
        Route::get('create', [App\Http\Controllers\Dashboard\UsersController::class, 'create']);
        Route::post('/', [App\Http\Controllers\Dashboard\UsersController::class, 'store']);
        Route::get('{user}/edit', [App\Http\Controllers\Dashboard\UsersController::class, 'edit']);
        Route::post('{user}/active', [App\Http\Controllers\Dashboard\UsersController::class, 'active']);
        Route::put('{user}', [App\Http\Controllers\Dashboard\UsersController::class, 'update']);
        Route::delete('{user}', [App\Http\Controllers\Dashboard\UsersController::class, 'destroy']);


    });
});

