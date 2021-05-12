<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\LRTController;
use App\Models\MeteoLT;
use App\Models\LRT;

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
Route::view('/', 'index');

Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');
Route::post('/weather/redirect', [WeatherController::class, 'weateherRedirect'])->name('weather.redirect');
Route::get('/weather/{place}', [WeatherController::class, 'show'])->name('weather.place');
Route::get('/lrt', [LRTController::class, 'index'])->name('lrt.index');
Route::get('/lrt/{id}', [LRTController::class, 'show'])->name('lrt.show');
