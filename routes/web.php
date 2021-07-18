<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
  return Auth::check() ? view('layouts.dashboard') : view('home.main');
});

Route::get('login', function () {
  return view('home.login');
})->name('login');

Route::get('register', function () {
  return view('home.register');
})->name('register');

/*
 * Requests
 */

Route::post('login', [AuthController::class, 'login'])->name('api-login');
Route::post('register', [AuthController::class, 'register'])->name('api-register');

Route::middleware('auth:sanctum')->group(function () {
  Route::resource('products', ProductController::class);
});
