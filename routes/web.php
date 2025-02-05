<?php

// Libraries
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Controllers
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\BlogController;



Route::get('/', [DashboardController::class, 'show'])->name('view.dashboard');

Route::get('/login',[RedirectController::class , 'login'])->name('view.login');
Route::post('/login',[AuthController::class , 'login'])->name('auth.login');

Route::get('/logout',[AuthController::class , 'logout'])->name('auth.logout');



Route::get('/sign-up',[RedirectController::class , 'signup'])->name('view.signup');
Route::post('/sign-up',[AuthController::class , 'signup'])->name('auth.signup');

Route::get('/verification/{token}',[AuthController::class , 'view_otp_verify'])->name('view.otp_verify');
Route::post('/verification',[AuthController::class , 'otp_verify'])->name('auth.otp_verify');




Route::resource('blogs', BlogController::class);
