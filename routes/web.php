<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelabuhanController;

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

// store
Route::get('/', [\App\Http\Controllers\StoreController::class, 'index'])->name('stores.index');
Route::get('/stores/create', [\App\Http\Controllers\StoreController::class, 'create'])->name('stores.create');
Route::post('stores/store', [\App\Http\Controllers\StoreController::class, 'store'])->name('stores.store');
Route::get('stores/{store}/edit', [\App\Http\Controllers\StoreController::class, 'edit'])->name('stores.edit');
Route::put('stores/{store}', [\App\Http\Controllers\StoreController::class, 'update'])->name('stores.update');

// select2
Route::get('/provinces', [\App\Http\Controllers\ProvinceController::class, 'select'])->name('provinces.select');
Route::get('/regencies', [\App\Http\Controllers\RegencyController::class, 'select'])->name('regencies.select');
Route::get('/districts', [\App\Http\Controllers\DistrictController::class, 'select'])->name('districts.select');
Route::get('/villages', [\App\Http\Controllers\VillageController::class, 'select'])->name('villages.select');



// store
Route::get('/', [\App\Http\Controllers\TripController::class, 'index'])->name('booking.index');
Route::get('/booking/create', [\App\Http\Controllers\BookingController::class, 'create'])->name('booking.create');
Route::post('booking/store', [\App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
Route::get('booking/{store}/edit', [\App\Http\Controllers\BookingController::class, 'edit'])->name('booking.edit');
Route::put('booking/{store}', [\App\Http\Controllers\BookingController::class, 'update'])->name('booking.update');

// select2
Route::get('/rute', [\App\Http\Controllers\RuteController::class, 'select'])->name('rute.select');
Route::get('/kapal', [\App\Http\Controllers\KapalController::class, 'select'])->name('kapal.select');
Route::get('/pelabuhan', [\App\Http\Controllers\PelabuhanController::class, 'select'])->name('pelabuhan.select');
Route::get('/pelabuhan2', [\App\Http\Controllers\PelabuhanController::class, 'select2'])->name('pelabuhan2.select');
Route::get('/jadwal-kapal', [\App\Http\Controllers\PelabuhanController::class, 'select3'])->name('jadwalkapal.select');

//search
Route::get('/jadwal', 'PelabuhanController@search')->name('jadwal.search');