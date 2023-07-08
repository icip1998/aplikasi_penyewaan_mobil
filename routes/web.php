<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReturnController;

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
Route::get('/', [AuthController::class, 'login']);

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(CarController::class)->prefix('cars')->group(function () {
        Route::get('', 'index')->name('cars');
        Route::get('create', 'create')->name('cars.create');
        Route::post('store', 'store')->name('cars.store');
        Route::get('show/{id}', 'show')->name('cars.show');
        Route::get('edit/{id}', 'edit')->name('cars.edit');
        Route::put('edit/{id}', 'update')->name('cars.update');
        Route::delete('destroy/{id}', 'destroy')->name('cars.destroy');
    });

    Route::controller(BookingController::class)->prefix('bookings')->group(function () {
        Route::get('', 'index')->name('bookings');
        Route::get('create', 'create')->name('bookings.create');
        Route::post('store', 'store')->name('bookings.store');
        Route::get('show/{id}', 'show')->name('bookings.show');
    });

    Route::controller(ReturnController::class)->prefix('returns')->group(function () {
        Route::get('', 'index')->name('returns');
        Route::get('create', 'create')->name('returns.create');
        Route::post('store', 'store')->name('returns.store');
        Route::get('show/{id}', 'show')->name('returns.show');
    });

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('/profile_update/{id}', [AuthController::class, 'profile_update'])->name('profile_update');
});
