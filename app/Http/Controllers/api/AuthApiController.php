<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

class AuthApiController extends BaseController {

  /**
   * Register api
   *
   * @param UserRequest $request
   * @return JsonResponse
   */
  public function register(UserRequest $request): JsonResponse {
    try {
      $user           = new User();
      $user->name     = $request->input('name');
      $user->email    = $request->input('email');
      $user->password = bcrypt($request->input('password'));
      $user->saveOrFail();

      return $this->sendResponse($user, 'success');

    } catch (\Throwable $ex) {
      return $this->sendError($ex);
    }
  }

  /**
   * Login api
   *
   * @param UserRequest $request
   * @return JsonResponse
   */
  public function login(UserRequest $request): JsonResponse {
    try {
      if (Auth::attempt($request->only(['email', 'password']))) {
        $isLocal = $this->getConfigEnv()[$this->getConfigApp()->APP_ENV] == $this->getConfigApp()->LOCAL;

        $user  = Auth::user();
        $token = $user->createToken($this->getConfigEnv()[$this->getConfigApp()->TOKEN_APP])->plainTextToken;

        $score   = $isLocal ? 1 : RecaptchaV3::verify($request->get('g-recaptcha-response'), 'captcha');

        if ($score > 0.7) {
          return $this->sendResponse([
            'user'  => $user,
            'token' => $token
          ], 'success');
        } else {
          return $this->sendError('captcha incorrect');
        }
      } else {
        return $this->sendError(null);
      }

    } catch (\Throwable $ex) {
      return $this->sendError($ex);
    }
  }

  /**
   * Logout api
   *
   * @param UserRequest $request
   * @return JsonResponse
   */
  public function logout(UserRequest $request): JsonResponse {
    try {
      $delete = Auth::user()->currentAccessToken()->delete();
      return $this->sendResponse($delete, 'success');
    } catch (\Exception $ex) {
      return $this->sendError($ex);
    }
  }
}
