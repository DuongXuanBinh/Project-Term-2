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
Route::get('/flight-status', function () {
    return view('Flight status');
});
Route::get('/promotion', function () {
    return view('promotion');
});
Route::get('/booking', function () {
    return view('Booking Manage');
});
Route::get('/sign-in', function () {
    return view('sign_in');
});
Route::get('/',function (){
    return view('index');
});



