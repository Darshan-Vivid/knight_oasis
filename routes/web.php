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
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Models\Faq;

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
Route::post('/', [BookingController::class, 'quick_book'])->name('home.book');
Route::get('/about-us', [RedirectController::class, 'show_about'])->name('view.about');
Route::get('/faqs', [FaqController::class, 'show'])->name('view.faqs');
Route::get('/contact-us', [RedirectController::class, 'show_contact'])->name('view.contact');
Route::post('/contact-us', [RedirectController::class, 'mail_contact'])->name('contact.mail');

Route::middleware(['auth', 'role:admin|user'])->group(function () {
    Route::get('/my-account', [AuthController::class, 'my_account'])->name('view.my_account');
    Route::post('/update-profile', [AuthController::class, 'profile_update'])->name('profile.update');
});

Route::get('/blogs', [BlogController::class, 'view_blog'])->name('view.blog');
Route::get('/blog/{slug}', [BlogController::class, 'blog_list'])->name('blog.list');

Route::get('/rooms', [RedirectController::class, 'show_rooms'])->name('view.rooms');
Route::get('/room/{slug}', [RedirectController::class, 'show_room'])->name('view.room');

Route::post('/check-availability', [BookingController::class, 'checkRoomAvailability'])->name('check.availability');
Route::post('/book-stay', [BookingController::class, 'book_stay'])->name('book.stay');

Route::get('/cart', [BookingController::class, 'show_cart'])->name('view.cart');
Route::post('/cart', [BookingController::class, 'store_cart'])->name('cart.store');
Route::post('/cart/romove/{id}', [BookingController::class, 'remove_item'])->name('cart.remove_item');

Route::get('/checkout', [BookingController::class, 'show_checkout'])->name('view.checkout');
Route::post('/checkout_', [BookingController::class, 'checkout'])->name('checkout');

Route::any('/cashfree/success/{tid}', [BookingController::class, 'CashFreeSuccess'])->name('cashfree.success');
Route::post('/cashfree/callback/', [BookingController::class, 'CashFreeCallback'])->name('cashfree.callback');

Route::any('/payu/success/{tid}', [BookingController::class, 'PayUSuccess'])->name('payu.success');
Route::any('/payu/failed/{tid}', [BookingController::class, 'PayUfail'])->name('payu.fail');


//admin panel
Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'show_admin'])->name('view.admin.dashboard');

        Route::resource('/blogs', BlogController::class)->names('blogs');
        Route::resource('/blog-categories', BlogCategoriesController::class)->names('blog_categories');
        Route::resource('/room-services', ServiceController::class)->names('services');
        Route::resource('/room-amenities', AmenityController::class)->names('amenities');
        Route::resource('/rooms', RoomController::class)->names('rooms');

        Route::prefix('settings')->group(function () {

            Route::get('/about-us', [SettingController::class, 'show_about_us'])->name('view.settings.about');
            Route::post('/about_us', [SettingController::class, 'save_about_us'])->name('settings.about.save');

            Route::get('/env', [SettingController::class, 'show_env'])->name('view.settings.env');
            Route::post('/env', [SettingController::class, 'save_env'])->name('settings.env.save');
            
            Route::resource('/faqs', FaqController::class)->names('faqs');
            
            Route::get('/general', [SettingController::class, 'show_general'])->name('view.settings.general');
            Route::post('/general', [SettingController::class, 'save_general'])->name('settings.general.save');
            
            Route::get('/home', [SettingController::class, 'show_home'])->name('view.settings.home');
            Route::post('/home', [SettingController::class, 'save_home'])->name('settings.home.save');

            Route::get('/pages', [SettingController::class, 'show_pages'])->name('view.settings.pages');
            Route::post('/pages', [SettingController::class, 'save_pages'])->name('settings.pages.save');


        });

        Route::get('/offline-booking', [BookingController::class, 'show_offline_booking'])->name('view.offline_booking');
        Route::post('/offline-booking', [BookingController::class, 'store_offline_booking'])->name('offline_booking.save');

        Route::get('/transactions', [BookingController::class, 'show_transactions'])->name('view.transactions');
        Route::get('/bookings', [BookingController::class, 'show_bookings'])->name('view.bookings');

        Route::get('/booking/{id}', [BookingController::class, 'show_single_booking'])->name('view.booking');
        // Route::get('/booking/{id}/edit', [BookingController::class, 'edit_booking'])->name('view.edit_booking');
        // Route::post('/booking/{id}/edit', [BookingController::class, 'save_edit_booking'])->name('edit_booking.save');
        Route::post('/booking/pay-status/{bid}', [BookingController::class, 'change_pay_status'])->name('booking_payment.change.save');
        Route::get('/users', [AdminController::class, 'show_users'])->name('view.users');
        Route::post('/remove-room-media',[ RoomController::class , 'remove_room_media'])->name('rooms.media.remove');
        Route::post('/room-wise-services',[ RoomController::class , 'room_wise_services'])->name('rooms.services');
    });
});


