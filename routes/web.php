<?php

use App\Http\Controllers\HoroscopeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::resource('/horoscope', HoroscopeController::class);
    Route::delete('/horoscope/{data}/delete', [HoroscopeController::class, 'destroy'])->name('horoscope.delete');
    Route::post('/horoscope/{data}/update', [HoroscopeController::class, 'update'])->name('horoscope.update');
    Route::post('/import',[HoroscopeController::class,'import'])->name('import');
    Route::get('/export-horoscope',[HoroscopeController::class,'exportHoroscope'])->name('export-horoscope');
    Route::get('/horoscope/{data?}/show',[HoroscopeController::class,'show'])->name('horoscope.show');
});
