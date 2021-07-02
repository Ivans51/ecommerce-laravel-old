<?php

namespace App\Utils;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class RequestManage extends Controller {

  /**
   * @param int $status : GET,POST = 200, PUT = 201, DELETE 204
   * @param string $body
   * @param string $message
   * @return JsonResponse
   */
  public function successBody(int $status = 200, string $body = '', string $message = ''): JsonResponse {

    /**
     * @param int $status
     * @param string $message
     * @param string $body
     * @param string $pagination
     * @return JsonResponse
     */
    if ($status === 200) {
      return response()->json([
        'status'  => $status,
        'data'    => $body ?: [],
        'message' => $message ?: __('Success'),
      ], $status);

    } else if ($status === 201) {
      return response()->json([
        'status'  => $status,
        'data'    => $body ?: [],
        'message' => $message ?: __('Success'),
      ], $status);

    } else {
      return response()->json([
        'status'  => 500,
        'message' => $message ?: __('A problem has occurred'),
      ], 500);
    }
  }

  /**
   * @param int $status : PUT = 201, DELETE 204
   * @param string $message
   * @return JsonResponse
   */
  public function success(int $status, string $message = ''): JsonResponse {
    if ($status === 201) {
      return response()->json([
        'status'  => $status,
        'message' => $message ?: __('Success'),
      ], $status);

    } else if ($status === 202) {
      return response()->json([
        'status'  => $status,
        'message' => $message ?: __('Success'),
      ], $status);

    } else if ($status === 203) {
      return response()->json([
        'status'  => $status,
        'message' => $message ?: __('Success'),
      ], $status);

    } else if ($status === 204) {
      return response()->json([
        'status'  => $status,
        'message' => $message ?: __('No data'),
      ], $status);

    } else {
      return response()->json([
        'status'  => 500,
        'message' => $message ?: __('A problem has occurred'),
      ], 500);
    }
  }

  /**
   * @param int $status
   * @param Exception|null $e
   * @param string $message
   * @return JsonResponse
   */
  public function error(int $status, Exception $e = null, string $message = ''): JsonResponse {
    if ($status === 400) {
      return response()->json([
        'status'  => $status,
        'message' => $message ?: __('Incorrect data.'),
        'error'   => $e ? $e->getMessage() ?: '' : '',
        'line'    => $e ? $e->getLine() ?: '' : '',
        'file'    => $e ? $e->getFile() ?: '' : '',
        'code'    => $e ? $e->getCode() ?: '' : '',
      ], $status);

    } else if ($status === 401) {
      return response()->json([
        'status'  => $status,
        'message' => $message ?: __('Unauthorized'),
        'error'   => $e ? $e->getMessage() ?: '' : '',
      ], $status);

    } else if ($status === 402) {
      return response()->json([
        'status'  => $status,
        'message' => $message ?: __('A problem has occurred'),
        'error'   => $e ? $e->getMessage() ?: '' : '',
      ], $status);

    } else if ($status === 403) {
      return response()->json([
        'status'  => $status,
        'message' => $message ?: __('Access denied'),
        'error'   => $e ? $e->getMessage() ?: '' : '',
      ], $status);

    } else if ($status === 404) {
      return response()->json([
        'status'  => $status,
        'message' => $message ?: __('Not found'),
        'error'   => $e ? $e->getMessage() ?: '' : '',
      ], $status);


    } else if ($status === 409) {
      return response()->json([
        'status'  => $status,
        'message' => $message ?: __('There is a conflict in the data.'),
        'error'   => $e ? $e->getMessage() ?: '' : '',
      ], $status);

    } else if ($status === 500) {
      return response()->json([
        'status'  => $status,
        'message' => $message ?: __('A problem has occurred'),
        'error'   => $e ? $e->getMessage() ?: '' : '',
      ], $status);

    } else {
      return response()->json([
        'status'  => 500,
        'message' => $message ?: __('A problem has occurred'),
        'error'   => $e ? $e->getMessage() ?: '' : '',
      ], 500);
    }
  }

  /**
   * @param int $status
   * @param ValidationException|null $e
   * @param string $message
   * @return JsonResponse
   */
  public function errorValidate(int $status, ValidationException $e = null, string $message = ''): JsonResponse {
    $validator = isset($e) && isset($e->validator) ? $e->validator->errors()->first() : '';

    if ($status === 400) {
      return response()->json([
        'status'  => $status,
        'message' => $message ?: __('Incorrect data. ') . $validator,
        'error'   => $e ? $validator ?: '' : '',
        'code'    => $e ? $e->getCode() ?: '' : '',
      ], $status);
    } else if ($status === 409) {
      return response()->json([
        'status'  => $status,
        'message' => $message ?: __('There is a conflict in the data. ') . $validator,
        'error'   => $e ? $validator ?: '' : '',
      ], $status);
    } else if ($status === 422) {
      return response()->json([
        'status'  => $status,
        'message' => $message ?: __('Incorrect data. ') . $validator,
        'error'   => $e ? $validator ?: '' : '',
      ], $status);
    } else {
      return response()->json([
        'status'  => 500,
        'message' => $message ?: __('A problem has occurred ') . $validator,
        'error'   => $e ? $validator ?: '' : '',
      ], 500);
    }
  }
}
