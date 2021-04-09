
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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
Route::prefix('/sign-in')->group(function (){
    Route::get('/',[Controllers\AccountController::class,'index']);
    Route::post('/authorize',[Controllers\AccountController::class,'signIn']);
    Route::get('/profile',[Controllers\AccountController::class,'showProfile']);
    Route::get('/sign-out',[Controllers\AccountController::class,'signOut']);
    Route::post('/update',[Controllers\AccountController::class,'updateProfile']);
});
Route::prefix('booking')->group(function (){
    Route::get('/search',[Controllers\BookingController::class,'search_place'])->name('search');
    Route::get('/create',[Controllers\BookingController::class,'create']);
    Route::post('/register',[Controllers\AccountController::class,'signUp']);
});
Route::get('/',[Controllers\HomeController::class,'index']);
