<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;
use Auth;

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
        $isLocal = $this->getConfigEnv()[$this->getConfigApp()->APP_ENV] == $this->getConfigApp()->LOCAL;
        $score   = $isLocal ? 1 : RecaptchaV3::verify($request->get('g-recaptcha-response'), 'captcha');

        $user = Auth::user();
        $user->createToken($this->getConfigEnv()[$this->getConfigApp()->TOKEN_APP])->plainTextToken;

        if ($score > 0.7) {
          return redirect()->route('profile');
        } else {
          return $this->exceptionError(null, 'Captcha incorrect');
        }
      } else {
        return $this->exceptionError(null);
      }

    } catch (\Throwable $ex) {
      return $this->exceptionError($ex);
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
      $isLocal = $this->getConfigEnv()[$this->getConfigApp()->APP_ENV] == $this->getConfigApp()->LOCAL;
      $score   = $isLocal ? 1 : RecaptchaV3::verify($request->get('g-recaptcha-response'), 'captcha');

      if ($score > 0.7) {
        $user           = new User();
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->saveOrFail();
        return back()->with(['success' => 'User register']);
      } else {
        return $this->exceptionError(null, 'Captcha incorrect');
      }
    } catch (\Throwable $ex) {
      return $this->exceptionError($ex, 'Error');
    }
  }

  /**
   * Logout api
   *
   * @param UserRequest $request
   * @return RedirectResponse
   */
  public function logout(UserRequest $request): RedirectResponse {
    try {
      Auth::user()->tokens()->where('tokenable_id', Auth::user()->id)->delete();
      Auth::logout();
      return redirect()->route('login');
    } catch (\Exception $ex) {
      return $this->exceptionError($ex);
    }
  }
}
