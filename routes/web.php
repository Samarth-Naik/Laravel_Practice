<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoController;
use App\Http\Controllers\BloController;
use App\Http\Controllers\AeroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeoplesController;

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

Route::get('/Login',[LoginController::class,'showform'])->middleware('web')->name('login');
Route::get('/Logout',[LoginController::class,'logout']);
Route::group(['middleware' => 'web'], function () {
    Route::post('/Login',[LoginController::class,'check']);
});


Route::get('/blo_dashboard',[BloController::class,'show_dash'])->middleware('web','auth');
Route::get('/aero_dashboard',[AeroController::class,'show_dash'])->middleware('web','auth');
Route::get('/ro_dashboard',[RoController::class,'show_dash'])->middleware('web','auth');
Route::post('/save-form-delivered', [PeoplesController::class, 'saveFormDelivered'])->name('save-form-delivered');