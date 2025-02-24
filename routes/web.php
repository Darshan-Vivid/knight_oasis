<?php

// Libraries

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Controllers
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogCategoriesController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ServiceController;



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
Route::get('/', [RedirectController::class, 'show_home'])->name('view.home');
Route::get('/rooms', [RedirectController::class, 'show_rooms'])->name('view.rooms');
Route::get('/room/{id}', [RedirectController::class, 'show_room'])->name('view.room');
Route::post('/check-availability', [BookingController::class, 'checkRoomAvailability'])->name('check.availability');
Route::post('/book-stay', [BookingController::class, 'book_stay'])->name('book.stay');

Route::get('/cart', [BookingController::class, 'show_cart'])->name('view.cart');
Route::post('/cart', [BookingController::class, 'store_cart'])->name('cart.store');
Route::post('/cart/romove/{id}', [BookingController::class, 'remove_item'])->name('cart.remove_item');

Route::get('/checkout', [BookingController::class, 'show_checkout'])->name('view.checkout');
Route::post('/checkout', [BookingController::class, 'checkout'])->name('checkout');


Route::get('/blog', [BlogController::class, 'view_blog'])->name('view.blog');
Route::get('/blog/{slug}', [BlogController::class, 'blog_list'])->name('blog.list');


//admin panel
Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'show_admin'])->name('view.admin.dashboard');

        Route::resource('/blogs', BlogController::class)->names('blogs');
        Route::resource('/blog-categories', BlogCategoriesController::class)->names('blog_categories');
        Route::resource('/room-services', ServiceController::class)->names('services');
        Route::resource('/room-amenities', AmenityController::class)->names('amenities');
        Route::resource('/rooms', RoomController::class)->names('rooms');
        // Route::resource('media', MediaController::class);
        
        Route::get('/settings', [AdminController::class, 'show_settings'])->name('view.settings');
        Route::post('/settings', [AdminController::class, 'save_settings'])->name('settings.save');
        
        Route::get('/offline-booking', [BookingController::class, 'show_offline_booking'])->name('view.offline_booking');
        Route::post('/offline-booking', [BookingController::class, 'store_offline_booking'])->name('offline_booking.save');
        
        Route::get('/transactions', [BookingController::class, 'show_transactions'])->name('view.transactions');
        Route::get('/bookings', [BookingController::class, 'show_bookings'])->name('view.bookings');

        Route::get('/booking/{id}', [BookingController::class, 'show_single_booking'])->name('view.booking');
        // Route::get('/booking/{id}/edit', [BookingController::class, 'edit_booking'])->name('view.edit_booking');
        // Route::post('/booking/{id}/edit', [BookingController::class, 'save_edit_booking'])->name('edit_booking.save');
        
        Route::get('/users', [AdminController::class, 'show_users'])->name('view.users');
        Route::post('/remove-room-media',[ RoomController::class , 'remove_room_media'])->name('rooms.media.remove');
        Route::post('/room-wise-services',[ RoomController::class , 'room_wise_services'])->name('rooms.services');
        Route::get('/routes', [RedirectController::class, 'routeList']);           //route list table
    });
});

