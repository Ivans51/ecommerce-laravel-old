<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController {

  /**
   * Register api
   *
   * @param UserRequest $request
   * @return RedirectResponse
   */
  public function register(UserRequest $request): RedirectResponse {
    try {
      $user           = new User();
      $user->name     = $request->input('name');
      $user->email    = $request->input('email');
      $user->password = bcrypt($request->input('password'));
      $user->saveOrFail();

      /*$success['token'] = $user->createToken('09688c51-9635-4dc5-b927-efa09d28a9b7')->plainTextToken;
      $success['name']  = $user->name;*/

      return back()->with(['success' => 'User register']);

    } catch (\Throwable $ex) {
      return $this->exceptionError($ex);
    }
  }

  /**
   * Login api
   *
   * @param Request $request
   * @return JsonResponse
   */
  public function login(Request $request): JsonResponse {
    if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
      $user             = Auth::user();
      $success['token'] = $user->createToken('MyApp')->plainTextToken;
      $success['name']  = $user->name;

      return $this->sendResponse($success, 'User login successfully.');
    } else {
      return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
    }
  }

  /**
   * @param Request $request
   * @return RedirectResponse
   */
  public function authenticate(Request $request): RedirectResponse {
    $credentials = $request->validate([
      'email'    => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->intended('dashboard');
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }
}
