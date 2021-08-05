<?php

namespace App\Http\Requests;

use App\Utils\Constants;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules(): array {
    $arr    = explode('@', $this->route()->getActionName());
    $method = $arr[1];

    switch ($method) {
      case 'register':
        return config('app.env') == Constants::LOCAL ? [
          'name'       => 'required|string',
          'email'      => 'required|email',
          'password'   => 'required',
          'c_password' => 'required|same:password',
          'role'       => 'required|string',
        ] : [
          'name'                 => 'required|string',
          'email'                => 'required|email',
          'password'             => 'required',
          'c_password'           => 'required|same:password',
          'role'                 => 'required|string',
          'g-recaptcha-response' => 'required|recaptchav3:captcha,0.5'
        ];
      case 'login':
        return config('app.env') == Constants::LOCAL ? [
          'email'    => 'required|email',
          'password' => 'required',
        ] : [
          'email'                => 'required|email',
          'password'             => 'required',
          'g-recaptcha-response' => 'required|recaptchav3:captcha,0.5'
        ];
      default:
        return [];
    }
  }

  public function messages(): array {
    return [
      "name.required"                 => __('validation.required', ['attribute' => 'name']),
      "email.required"                => __('validation.required', ['attribute' => 'email']),
      "password.required"             => __('validation.required', ['attribute' => 'password']),
      "c_password.required"           => __('validation.required', ['attribute' => 'c_password']),
      "role.required"                 => __('validation.required', ['attribute' => 'role']),
      "g-recaptcha-response.required" => __('validation.required', ['attribute' => 'g-recaptcha-response']),

      "name.string"                      => __('validation.string', ['attribute' => 'name']),
      "email.email"                      => __('validation.email', ['attribute' => 'email']),
      "c_password.same"                  => __('validation.same', ['attribute' => 'password', 'other' => 'c_password']),
      "role.string"                      => __('validation.string', ['attribute' => 'role']),
      "g-recaptcha-response.recaptchav3" => __('validation.recaptchav3', ['attribute' => 'g-recaptcha-response']),
    ];
  }
}
