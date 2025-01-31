<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/sign-up',[RedirectController::class , 'signup'])->name('view.signup');
Route::post('/sign-up',[UserController::class , 'signup'])->name('user.signup');