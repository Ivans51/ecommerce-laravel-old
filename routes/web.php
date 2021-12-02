<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Utils\Constants;
use App\Utils\Menu;
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

/* Views */
Route::get('/', function () {
  if (!Auth::check()) {
    return view('home.main')->with(['menu' => Menu::getHome()]);
  } elseif (Auth::user()->role == Constants::CUSTOMER) {
    return view('dashboard.main')->with(['menu' => Menu::getHome()]);
  } else if (Auth::user()->role == Constants::ADMIN) {
    return view('admin.main')->with(['menu' => Menu::getHome()]);
  } else {
    return view('home.main')->with(['menu' => Menu::getHome()]);
  }
})->name('home');

Route::middleware('validate:' . Constants::UNAUTHENTICATED)->group(function () {
  Route::get('login', function () {
    return view('home.login')->with(['menu' => Menu::getHome()]);
  })->name('login');

  Route::get('register', function () {
    return view('home.register')->with(['menu' => Menu::getHome()]);
  })->name('register');
});

/*
 * Auth Views
 */
Route::middleware('auth:sanctum')->group(function () {
  Route::resource('products', ProductController::class);

  Route::middleware('validate:' . Constants::CUSTOMER)->group(function () {
    Route::get('profile', function () {
      return view('dashboard.profile')->with(['menu' => Menu::getHome()]);
    })->name('profile');

    Route::get('main', function () {
      return view('dashboard.main')->with(['menu' => Menu::getHome()]);
    })->name('main-customer');
  });

  Route::middleware('validate:' . Constants::ADMIN)->group(function () {
    Route::get('main-admin', function () {
      return view('admin.main')->with(['menu' => Menu::getAdmin()]);
    })->name('main-admin');
  });
});

/*
 * Requests
 */
Route::post('login', [AuthController::class, 'login'])->name('api-login');
Route::post('register', [AuthController::class, 'register'])->name('api-register');
Route::get('logout', [AuthController::class, 'logout'])->name('api-logout');
