<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AccomodationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HotelCategoryController;
use App\Http\Controllers\HotelNameController;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Register Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

//Login Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('logout', [LoginController::class, 'logout'])->name('a.logout');

//Admin Routes
Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/client-booking', [AdminController::class, 'client_booking'])->name('client-booking');
    Route::get('/contact-details', [AdminController::class, 'index'])->name('contact-details');
    Route::delete('/contacts/{id}', [AdminController::class, 'destroy'])->name('contacts.destroy');

    Route::get('cities', [CityController::class, 'index'])->name('cities.index');
    Route::get('cities/create', [CityController::class, 'create'])->name('cities.create');
    Route::post('cities', [CityController::class, 'store'])->name('cities.store');
    Route::get('cities/{city}/edit', [CityController::class, 'edit'])->name('cities.edit');
    Route::put('cities/{city}', [CityController::class, 'update'])->name('cities.update');
    Route::delete('cities/{city}', [CityController::class, 'destroy'])->name('cities.destroy');
    // Routes for Hotel Categories
    Route::get('hotel_categories', [HotelCategoryController::class, 'index'])->name('hotel_categories.index'); // List all hotel categories
    Route::get('hotel_categories/create', [HotelCategoryController::class, 'create'])->name('hotel_categories.create'); // Show form to create a hotel category
    Route::post('hotel_categories', [HotelCategoryController::class, 'store'])->name('hotel_categories.store'); // Store a new hotel category
    Route::get('hotel_categories/{hotel_category}/edit', [HotelCategoryController::class, 'edit'])->name('hotel_categories.edit'); // Show form to edit a hotel category
    Route::put('hotel_categories/{hotel_category}', [HotelCategoryController::class, 'update'])->name('hotel_categories.update'); // Update an existing hotel category
    Route::delete('hotel_categories/{hotel_category}', [HotelCategoryController::class, 'destroy'])->name('hotel_categories.destroy'); // Delete a hotel category

    // Routes for Hotel Names
    Route::get('hotel_names', [HotelNameController::class, 'index'])->name('hotel_names.index'); // List all hotel names
    Route::get('hotel_names/create', [HotelNameController::class, 'create'])->name('hotel_names.create'); // Show form to create a hotel name
    Route::post('hotel_names', [HotelNameController::class, 'store'])->name('hotel_names.store'); // Store a new hotel name
    Route::get('hotel_names/{hotel_name}/edit', [HotelNameController::class, 'edit'])->name('hotel_names.edit'); // Show form to edit a hotel name
    Route::put('hotel_names/{hotel_name}', [HotelNameController::class, 'update'])->name('hotel_names.update'); // Update an existing hotel name
    Route::delete('hotel_names/{hotel_name}', [HotelNameController::class, 'destroy'])->name('hotel_names.destroy'); // Delete a hotel name
    Route::resource('room_categories', RoomCategoryController::class);
    Route::resource('rooms', RoomController::class);
    
    //Routes for gallary
    
    Route::get('gallery/index', [AdminController::class, 'galleryview'])->name('gallery.index'); 
    Route::post('gallery/store', [AdminController::class, 'storeGallery'])->name('gallery.store');
    Route::get('gallery/edit/{id}', [AdminController::class, 'editGallery'])->name('gallery.edit');
    Route::put('gallery/{id}', [AdminController::class, 'updateGallery'])->name('gallery.update');
    Route::get('gallery/delete/{id}', [AdminController::class, 'destroyGallery'])->name('gallery.destroy');
    //Routes for client review
    
    Route::get('client-review/index', [AdminController::class, 'clientreviewview'])->name('client-review.index'); 
    Route::post('client-review/store', [AdminController::class, 'storereview'])->name('client-review.store');
    Route::get('client-review/edit/{id}', [AdminController::class, 'editreview'])->name('client-review.edit');
    Route::put('client-review/{id}', [AdminController::class, 'updatereview'])->name('client-review.update');
    Route::get('client-review/delete/{id}', [AdminController::class, 'destroyreview'])->name('client-review.destroy');
    //Routes for About
    
    Route::get('about/index', [AdminController::class, 'aboutindex'])->name('about.index'); 
    Route::post('about/store', [AdminController::class, 'aboutstore'])->name('about.store');
    Route::get('about/edit/{id}', [AdminController::class, 'aboutedit'])->name('about.edit');
    Route::put('about/{id}', [AdminController::class, 'aboutupdate'])->name('about.update');
    Route::get('about/delete/{id}', [AdminController::class, 'aboutdestory'])->name('about.destroy');


});


//User Routes With Authentication
Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':user'])->group(function () {
   
   

});
 Route::get('/about-us', [AboutusController::class, 'aboutus'])->name('aboutus');
    Route::get('/accomodation', [AccomodationController::class, 'accomodation'])->name('accomodation');
    Route::get('/gallery', [GalleryController::class, 'gallery'])->name('gallery');
    Route::get('/contact-us', [ContactController::class, 'Contact'])->name('contact-us');
    Route::post('/booking', [UserController::class, 'fetch_hotels'])->name('booking');
    
    Route::get('/booking', [UserController::class, 'Booking'])->name('booking');
    // web.php
    Route::post('/book-room', [UserController::class, 'store'])->name('bookRoom');
    
    Route::get('/confirm/{room_category_id}', [UserController::class, 'confirm'])->name('confirm');
    
    Route::get('/confirm-booking/{room_category_id}', [UserController::class, 'confirmBooking'])->name('confirm.booking');
    Route::post('/submit-booking', [UserController::class, 'submitBooking'])->name('submit.booking');
    
    // Route to store booking data in session via AJAX
    Route::post('/store-session', [UserController::class, 'storeSession'])->name('store.session');

    Route::post('/contact', [UserController::class, 'store'])->name('contact.store');
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::post('room-details/{id}', [UserController::class, 'roomdetails'])->name('user.room-details');
    Route::get('room-details/{id}', [UserController::class, 'roomdetails'])->name('user.room-details');
    Route::get('confirm-reservation/{id}', [UserController::class, 'confirm_booking'])->name('user.confirm-reservation');
    Route::post('confirm-reservation/store/{id}', [UserController::class, 'confirm_booking_store'])->name('user.confirm-reservation-store');


//User Routes Without Authentication







// web.php
// Route::get('/fetch-hotels-by-city/{cityId}', [UserController::class, 'fetchHotelsByCity']);
// Route::get('/fetch-rooms-by-hotel/{hotelId}', [UserController::class, 'fetchRoomsByHotel']);


