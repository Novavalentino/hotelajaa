<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReservationController;

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

Route::get('/', function () {
    return view('welcome');
});

//auth route for both
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// for users
Route::group(['middleware' => ['auth', "role:user"]], function() {
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
    Route::get('/dashboard/myprofile/{booking:id}', 'App\Http\Controllers\DashboardController@myprofileDetail')->name('dashboard.detail');
    Route::get('/dashboard/roomuser', 'App\Http\Controllers\DashboardController@roomuser')->name('dashboard.roomuser');
    Route::get('/dashboard/facilityuser', 'App\Http\Controllers\DashboardController@facilityuser')->name('dashboard.facilityuser');
});

// for receptionist
Route::group(['middleware' => ['auth', "role:resepsionis"]], function() {
    Route::get('/dashboard/reservation', 'App\Http\Controllers\DashboardController@reservation')->name('dashboard.reservation');
});

// for admin
Route::group(['middleware' => ['auth', "role:admin"]], function() {
    Route::resource('roomtype', RoomtypeController::class);
    // Route::get('/dashboard/room', 'App\Http\Controllers\DashboardController@room')->name('dashboard.room');
    Route::get('/dashboard/facility', 'App\Http\Controllers\DashboardController@facility')->name('dashboard.facility');
});

require __DIR__.'/auth.php';

Route::resource('facility', FacilityController::class);
Route::resource('booking', BookingController::class);
Route::resource('reservation', ReservationController::class);