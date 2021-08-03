<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Utils\Constants;
use Auth;
use Exception;
use Illuminate\Http\RedirectResponse;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;
use Throwable;

class AuthController extends BaseController {

  /**
   * Login api
   *
   * @param UserRequest $request
   * @return RedirectResponse
   */
  public function login(UserRequest $request): RedirectResponse {
    try {
      if (Auth::attempt($request->only(['email', 'password']))) {
        $isLocal = config('app.env') == Constants::LOCAL;
        $score   = $isLocal ? 1 : RecaptchaV3::verify($request->get('g-recaptcha-response'), 'captcha');

        $user = Auth::user();
        $user->createToken(config('app.token_app'))->plainTextToken;

        if ($score > 0.7) {
          return redirect()->route('profile');
        } else {
          return $this->launchError('Captcha incorrect');
        }
      } else {
        return $this->launchError('Data incorrect');
      }

    } catch (Throwable $ex) {
      return $this->launchThrowable($ex);
    }
  }

  /**
   * Register api
   *
   * @param UserRequest $request
   * @return RedirectResponse
   */
  public function register(UserRequest $request): RedirectResponse {
    try {
      $isLocal = config('app.env') == Constants::LOCAL;
      $score   = $isLocal ? 1 : RecaptchaV3::verify($request->get('g-recaptcha-response'), 'captcha');

      if ($score > 0.7) {
        $user           = new User();
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role     = $request->input('role');
        $user->saveOrFail();
        return back()->with(['success' => 'User register']);
      } else {
        return $this->launchError('Captcha incorrect');
      }
    } catch (Throwable $ex) {
      return $this->launchThrowable($ex, 'Error');
    }
  }

  /**
   * Logout api
   *
   * @return RedirectResponse
   */
  public function logout(): RedirectResponse {
    try {
      Auth::user()->tokens()->where('tokenable_id', Auth::user()->id)->delete();
      Auth::logout();
      return redirect()->route('login');
    } catch (Exception $ex) {
      return $this->launchThrowable($ex);
    }
  }
}
