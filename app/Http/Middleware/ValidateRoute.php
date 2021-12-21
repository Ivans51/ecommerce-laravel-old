<?php

namespace App\Http\Middleware;

use App\Utils\Constants;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidateRoute {
  /**
   * Handle an incoming request.
   *
   * @param Request $request
   * @param Closure $next
   * @param string $action
   * @return mixed
   */
  public function handle(Request $request, Closure $next, string $action) {
    switch ($action) {
      case Constants::UNAUTHENTICATED:
        return Auth::check() ? redirect()->route('profile-customer') : $next($request);
      case Constants::UNAUTHENTICATED_ADMIN:
        return Auth::check() ? redirect()->route('home-admin') : $next($request);
      case Constants::CUSTOMER:
        return Auth::user()->role == Constants::ADMIN ? redirect()->route('home-admin') : $next($request);
      case Constants::ADMIN:
        return Auth::user()->role == Constants::CUSTOMER ? redirect()->route('profile-customer') : $next($request);
      default:
        return $next($request);
    }
  }
}
