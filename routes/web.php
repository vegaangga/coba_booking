<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelabuhanController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookController;

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
// Route::get('/', [\App\Http\Controllers\StoreController::class, 'index'])->name('stores.index');
// Route::get('/stores/create', [\App\Http\Controllers\StoreController::class, 'create'])->name('stores.create');
// Route::post('stores/store', [\App\Http\Controllers\StoreController::class, 'store'])->name('stores.store');
// Route::get('stores/{store}/edit', [\App\Http\Controllers\StoreController::class, 'edit'])->name('stores.edit');
// Route::put('stores/{store}', [\App\Http\Controllers\StoreController::class, 'update'])->name('stores.update');

// select2
// Route::get('/provinces', [\App\Http\Controllers\ProvinceController::class, 'select'])->name('provinces.select');
// Route::get('/regencies', [\App\Http\Controllers\RegencyController::class, 'select'])->name('regencies.select');
// Route::get('/districts', [\App\Http\Controllers\DistrictController::class, 'select'])->name('districts.select');
// Route::get('/villages', [\App\Http\Controllers\VillageController::class, 'select'])->name('villages.select');



// store
// Route::get('/', [\App\Http\Controllers\TripController::class, 'index'])->name('booking.index');
// Route::get('/booking/create', [\App\Http\Controllers\BookingController::class, 'create'])->name('booking.create');
// Route::post('booking/store', [\App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
// Route::get('booking/{store}/edit', [\App\Http\Controllers\BookingController::class, 'edit'])->name('booking.edit');
// Route::put('booking/{store}', [\App\Http\Controllers\BookingController::class, 'update'])->name('booking.update');

// select2
Route::get('/rute', [\App\Http\Controllers\RuteController::class, 'select'])->name('rute.select');
Route::get('/kapal', [\App\Http\Controllers\KapalController::class, 'select'])->name('kapal.select');
Route::get('/pelabuhan', [\App\Http\Controllers\PelabuhanController::class, 'select'])->name('pelabuhan.select');
Route::get('/pelabuhan2', [\App\Http\Controllers\PelabuhanController::class, 'select2'])->name('pelabuhan2.select');
Route::get('/jadwal-kapal', [\App\Http\Controllers\PelabuhanController::class, 'select3'])->name('jadwalkapal.select');
//Route::get('/pelabuhan', [\App\Http\Controllers\PelabuhanController::class, 'select'])->name('pelabuhan.pelabuhan1');
//Route::get('/pelabuhan', [\App\Http\Controllers\PelabuhanController::class, 'pelabuhan2'])->name('pelabuhan2.pelabuhan2');
Route::get('/jadwal', [\App\Http\Controllers\PelabuhanController::class, 'jadwal'])->name('jadwal.jadwal');

//search
//Route::get('/jadwal', 'PelabuhanController@search')->name('jadwal.search');

Route::get('wizard', function () {
    return view('default');
});

//Booking
// Route::get('booking', 'BookingController@index')->name('booking.index');
// Route::post('booking/store', [\App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
// Route::get('booking/create-step-one', 'BookingController@createStepOne')->name('booking.create.step.one');
// Route::post('booking/create-step-one', 'BookingController@postCreateStepOne')->name('booking.create.step.one.post');

// Route::prefix('data')->group(function () {
//     Route::resource('user', UserController::class);
//     Route::resource('biaya', BiayaController::class);
//     Route::resource('formulir', CalonSiswaController::class);
//     Route::resource('daftar-ulang', DauSiswaController::class);
//     Route::resource('admin', AdminController::class);
//     Route::get('konfirmasi/{id}', [CalonSiswaController::class,'konfirmasi'])->name('formulir.konfirmasi');
// });

Route::resource('booking', BookingController::class);