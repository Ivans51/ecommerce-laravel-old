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
  if (Auth::check()) {
    if (Auth::user()->role == Constants::ADMIN) {
      return view('admin.main')->with(['menu' => Menu::getAdmin()]);
    } else if (Auth::user()->role == Constants::CUSTOMER) {
      return view('customer.home')->with(['menu' => Menu::getCustomer()]);
    } else {
      return view('main.home')->with(['menu' => Menu::getHome()]);
    }
  } else {
    return view('main.home')->with(['menu' => Menu::getHome()]);
  }
})->name('home');

Route::get('/products', function () {
  return view('home.products')->with(['menu' => Menu::getHome()]);
})->name('products');

Route::middleware('validate:' . Constants::UNAUTHENTICATED)->group(function () {
  Route::get('login', function () {
    return view('main.login')->with(['menu' => Menu::getHome()]);
  })->name('login');

  Route::get('register', function () {
    return view('main.register')->with(['menu' => Menu::getHome()]);
  })->name('register');
});

/*
 * Auth Views
 */
Route::middleware('auth:sanctum')->group(function () {

  Route::prefix('customer')->middleware('validate:' . Constants::CUSTOMER)->group(function () {
    Route::get('profile', function () {
      return view('customer.profile')->with(['menu' => Menu::getCustomer()]);
    })->name('profile-customer');

    Route::get('profile-password', function () {
      return view('customer.profile-password')->with(['menu' => Menu::getCustomer()]);
    })->name('profile-password-customer');

    Route::get('products', function () {
      return view('customer.products')->with(['menu' => Menu::getCustomer()]);
    })->name('products-customer');

    Route::get('shop-cart', function () {
      return view('customer.shop-cart')->with(['menu' => Menu::getCustomer()]);
    })->name('shop-cart-customer');

    Route::get('product', function () {
      return view('customer.product')->with(['menu' => Menu::getCustomer()]);
    })->name('product-customer');
  });

  Route::prefix('admin')->middleware('validate:' . Constants::ADMIN)->group(function () {
    Route::resource('products', ProductController::class);

    Route::get('home', function () {
      return view('admin.home')->with(['menu' => Menu::getAdmin()]);
    })->name('home-admin');
  });
});

/*
 * Requests
 */
Route::post('login', [AuthController::class, 'login'])->name('api-login');
Route::post('register', [AuthController::class, 'register'])->name('api-register');
Route::get('logout', [AuthController::class, 'logout'])->name('api-logout');
