<?php

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
  Route::post('/',[\App\Http\Controllers\AccountController::class,'signIn']);
});
Route::prefix('booking')->group(function (){
    Route::get('/search',[Controllers\BookingController::class,'search_place'])->name('search');
    Route::get('/create',[Controllers\BookingController::class,'creat']);
});

