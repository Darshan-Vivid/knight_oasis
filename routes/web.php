<?php

// Libraries

use App\Http\Controllers\Admin\BlogCategoriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Controllers
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\MediaController;

//Auth
Route::get('/login',[RedirectController::class , 'login'])->name('login');
Route::post('/login',[AuthController::class , 'login'])->name('auth.login');
Route::get('/sign-up',[AuthController::class , 'view_signup'])->name('view.signup');
Route::post('/sign-up',[AuthController::class , 'signup'])->name('auth.signup');
Route::get('/forgot-password', [RedirectController::class, 'forgotPassword'])->name('view.forget_password');
Route::post('/forgot-password', [AuthController::class, 'forgot_password'])->name('auth.password.otp');
Route::get('/verification/{token}',[AuthController::class , 'view_otp_verify'])->name('view.otp_verify');
Route::post('/verification',[AuthController::class , 'otp_verify'])->name('auth.otp_verify');
Route::get('/new-password/{token}', [RedirectController::class, 'newPassword'])->name('view.new_password');
Route::post('/new-password', [AuthController::class, 'new_password'])->name('auth.password');
Route::get('/logout',[AuthController::class , 'logout'])->name('auth.logout');
Route::post('/states', [AuthController::class, 'getStates'])->name("get.states");



//User
Route::get('/', [DashboardController::class, 'show_user'])->name('view.dashboard');

Route::get('/blog', [BlogController::class, 'view_blog'])->name('view.blog');
Route::get('/blog/{slug}', [BlogController::class, 'blog_list'])->name('blog.list');

//admin panel
Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'show_admin'])->name('view.admin.dashboard');
        Route::resource('blogs', BlogController::class);
        Route::resource('blogs_categories', BlogCategoriesController::class);
        // Route::resource('media', MediaController::class);
        Route::get('/settings', [DashboardController::class, 'show_settings'])->name('view.settings');
        Route::post('/settings', [DashboardController::class, 'save_settings'])->name('settings.save');
    });
});

