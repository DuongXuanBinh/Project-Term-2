
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//-------Normal-view------------

Route::prefix('/sign-in')->group(function (){
    Route::get('/',[Controllers\AccountController::class,'index']);
    Route::post('/authorize',[Controllers\AccountController::class,'signIn']);
    Route::post('/register',[Controllers\AccountController::class,'signUp']);
});
Route::prefix('/profile')->group(function(){
    Route::get('/',[Controllers\AccountController::class,'showProfile']);
    Route::get('/sign-out',[Controllers\AccountController::class,'signOut']);
    Route::post('/update',[Controllers\AccountController::class,'updateProfile']);
    Route::post('/change-password',[Controllers\AccountController::class,'changePassword']);
});
Route::prefix('booking')->group(function (){
    Route::get('/search',[Controllers\BookingController::class,'search_place'])->name('search');
    Route::get('/create',[Controllers\BookingController::class,'create']);
    Route::get('/show_flights',[Controllers\BookingController::class,'show_flights']);
    Route::post('/register',[Controllers\AccountController::class,'signUp']);
    Route::get('/other_date',[Controllers\BookingController::class,'search_other_date']);
    Route::get('/choose_flight',[Controllers\BookingController::class,'choose_flight']);
    Route::get('/passenger_index',[Controllers\BookingController::class,'passenger_index']);
    Route::post('/create_passengers',[Controllers\BookingController::class,'create_passengers']);
    Route::get('/show_seats',[Controllers\BookingController::class,'show_seats']);
});
Route::prefix('/')->group(function(){
    Route::get('/',[Controllers\HomeController::class,'homeIndex']);
    Route::get('/flight-status',[Controllers\HomeController::class,'flightIndex']);
    Route::get('/flight-status/search',[Controllers\HomeController::class,'flightStatus']);
    Route::get('/booking-manage',[Controllers\HomeController::class,'bookingIndex']);
    Route::get('/booking-manage/search',[Controllers\HomeController::class,'bookingManage']);
    Route::get('/booking-manage/search/register',[Controllers\AccountController::class,'signIn2']);
    Route::get('/booking-manage/delete',[Controllers\HomeController::class,'bookingDelete']);
    Route::get('/booking-manage/reschedule',[Controllers\HomeController::class,'bookingReschedule']);
    Route::get('/destination', function () {
        return view('destination');
    });
    Route::get('/contact', function () {
        return view('contact');
    });
    Route::get('/policy', function () {
        return view('policy');
    });
    Route::get('/promotion', function () {
        return view('promotion');
    });
});
