<?php

// Libraries
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controllers
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UserController;

// Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});


Route::get('/sign-up', [RedirectController::class, 'signup'])->name('view.signup');
Route::post('/sign-up', [UserController::class, 'signup'])->name('user.signup');

Route::get('/email/verify', [RedirectController::class, 'verification_notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [RedirectController::class, 'auth_verify'])->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/dashboard', [RedirectController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('view.dashboard');