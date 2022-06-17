<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TestController;
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
Route::get('/test',[TestController::class, 'index'] )->name('test.index');
Route::get('/',[MainController::class, 'index'] )->name('index');
Route::post('/index/offer',[MainController::class, 'index_offer']);
Route::middleware("auth")->group(function (){
//    Route::get('/',[MainController::class, 'index'] )->name('index');

    Route::get('/shop',[ShopController::class, 'index'] )->name('shop.index');

    Route::get('/offers',[OffersController::class, 'index'] )->name('offers.index');
    Route::post('/offers',[OffersController::class, 'store'] )->name('offers.store');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::middleware("guest")->group(function (){
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post ('/login_process', [AuthController::class, 'login'])->name('login_process');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post ('/register_process', [AuthController::class, 'register'])->name('register_process');
});
