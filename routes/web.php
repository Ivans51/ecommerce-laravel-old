<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
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
  if (Auth::check() && Auth::user()->role == Constants::ADMIN) {
    return view('admin.home')->with(['menu' => Menu::getAdmin()]);
  } else if (Auth::check() && Auth::user()->role == Constants::CUSTOMER) {
    return view('customer.home')->with(['menu' => Menu::getCustomer()]);
  } else {
    return view('main.home')->with(['menu' => Menu::getHome()]);
  }
})->name('home');

Route::get('/products', function () {
  return view('main.products')->with(['menu' => Menu::getHome()]);
})->name('products');

Route::get('/terms', function () {
  return view('main.terms')->with(['menu' => Menu::getHome()]);
})->name('terms');

/* Login and register */
Route::middleware('validate:' . Constants::UNAUTHENTICATED)->group(function () {
  Route::get('login', function () {
    return view('main.login')->with(['menu' => Menu::getHome()]);
  })->name('login');

  Route::get('register', function () {
    return view('main.register')->with(['menu' => Menu::getHome()]);
  })->name('register');
});

/* Login and register admin */
Route::middleware('validate:' . Constants::UNAUTHENTICATED_ADMIN)->group(function () {
  Route::get('admin/login', function () {
    return view('layouts.admin-login');
  })->name('login-admin');
});

/*
 * Auth Views
 */
Route::middleware('auth:sanctum')->group(function () {

  /* Customer */
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

    Route::get('product', function () {
      return view('customer.product')->with(['menu' => Menu::getCustomer()]);
    })->name('product-customer');

    Route::get('shop-cart', function () {
      return view('customer.shop-cart')->with(['menu' => Menu::getCustomer()]);
    })->name('shop-cart-customer');

    Route::get('shop-cart-address', function () {
      return view('customer.shop-cart-address')->with(['menu' => Menu::getCustomer()]);
    })->name('shop-cart-customer-address');

    Route::get('shop-cart-payment', function () {
      return view('customer.shop-cart-payment')->with(['menu' => Menu::getCustomer()]);
    })->name('shop-cart-customer-payment');

    Route::get('shop-cart-success', function () {
      return view('customer.shop-cart-success')->with(['menu' => Menu::getCustomer()]);
    })->name('shop-cart-customer-success');
  });

  /* Admin */
  Route::prefix('admin')->middleware('validate:' . Constants::ADMIN)->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('admins', AdminsController::class);
    Route::resource('customers', CustomersController::class);

    Route::get('profile', function () {
      return view('admin.profile');
    })->name('profile-admin');

    Route::get('config', function () {
      return view('admin.config');
    })->name('config-admin');

    Route::get('home', function () {
      return view('admin.home');
    })->name('home-admin');
  });
});

/*
 * API Request
 */
Route::post('login', [AuthController::class, 'login'])->name('api-login');
Route::post('login/admin', [AuthController::class, 'loginAdmin'])->name('api-login-admin');
Route::post('register', [AuthController::class, 'register'])->name('api-register');
Route::get('logout/{type}', [AuthController::class, 'logout'])->name('api-logout');
