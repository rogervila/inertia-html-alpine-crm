<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoController;
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

Route::get('/', DashboardController::class)->middleware('auth');
Route::resource('/todos', TodoController::class)->middleware('auth');

Route::match(['GET', 'POST'], '/login', LoginController::class)
    ->name('login')
    ->middleware('guest');

Route::match(['GET', 'POST'], '/register', RegisterController::class)
    ->name('register')
    ->middleware('guest');

Route::post('/logout', LogoutController::class)->middleware('auth');

Route::get('/500', function () {
    throw new \Exception('500 Error demo');
});
