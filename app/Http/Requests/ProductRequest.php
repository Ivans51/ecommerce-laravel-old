<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest {

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules(): array {
    $arr    = explode('@', $this->route()->getActionName());
    $method = $arr[1];

    switch ($method) {
      case 'store':
        return [
          'detail' => 'required|string',
        ];
      case 'update':
        return [
          'id'     => 'required|string|exists:product',
          'name'   => 'required|string',
          'detail' => 'required|string',
        ];
      case 'destroy':
        return [
          'id' => 'required|string|exists:product'
        ];
      default:
        return [];
    }
  }

  public function messages(): array {
    return [
      "id.exists"   => __('validation.exists', ['attribute' => 'id']),
      "id.required" => __('validation.required', ['attribute' => 'id']),
      "id.string"   => __('validation.string', ['attribute' => 'id']),

      "name.required"   => __('validation.required', ['attribute' => 'name']),
      "detail.required" => __('validation.required', ['attribute' => 'detail']),

      "name.string"   => __('validation.string', ['attribute' => 'name']),
      "detail.string" => __('validation.string', ['attribute' => 'detail']),
    ];
  }
}
