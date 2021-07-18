<?php

namespace App\Http\Requests;

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
        return [
          'name'       => 'required|string',
          'email'      => 'required|email',
          'password'   => 'required',
          'c_password' => 'required|same:password',
        ];
      case 'login':
        return [
          'email'    => 'required|email',
          'password' => 'required',
        ];
      default:
        return [];
    }
  }

  public function messages(): array {
    return [
      "name.required"       => __('validation.required', ['attribute' => 'name']),
      "email.required"      => __('validation.required', ['attribute' => 'email']),
      "password.required"   => __('validation.required', ['attribute' => 'password']),
      "c_password.required" => __('validation.required', ['attribute' => 'c_password']),

      "email.email"     => __('validation.email', ['attribute' => 'email']),
      "c_password.same" => __('validation.same', ['attribute' => 'password', 'other' => 'c_password']),
      "name.string"     => __('validation.string', ['attribute' => 'name']),
    ];
  }
}
