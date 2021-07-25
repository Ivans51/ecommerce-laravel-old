<?php

namespace App\Http\Controllers;

use App\Utils\ConfigApp;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use stdClass;

class BaseController extends Controller {

  /**
   * @var array
   */
  private $configApp;

  public function __construct() {
    $this->configApp = (new ConfigApp());
  }

  /**
   * @return array
   */
  public function getConfigEnv(): array {
    return $this->configApp->getEnv();
  }

  /**
   * @return array
   */
  public function getConfigApp() {
    return $this->configApp;
  }


  /**
   * success response method.
   *
   * @param $result
   * @param $message
   * @return JsonResponse
   */
  public function sendResponse($result, $message): JsonResponse {
    $response = [
      'success' => true,
      'data'    => $result,
      'message' => $message,
    ];

    return response()->json($response);
  }


  /**
   * return error response.
   *
   * @param $error
   * @param int $code
   * @return JsonResponse
   */
  public function sendError($error, int $code = 400): JsonResponse {
    return response()->json([
      'success' => false,
      'message' => $error,
    ], $code);
  }


  /**
   * return error response.
   *
   * @param $error
   * @param array $errorMessages
   * @return JsonResponse
   */
  public function sendErrorValidator($error, array $errorMessages = []): JsonResponse {
    $response = [
      'success' => false,
      'message' => $error,
    ];

    if (!empty($errorMessages)) {
      $response['data'] = $errorMessages;
    }

    return response()->json($response);
  }

  /**
   * @param Exception $error
   * @param string $message
   * @return RedirectResponse
   */
  public function exceptionError(\Throwable $error, string $message = 'something is wrong'): RedirectResponse {
    $isLocal = $this->configApp->getEnv()[$this->configApp->APP_ENV] == $this->configApp->LOCAL;

    if ($error instanceof QueryException) {
      return back()->withErrors([
        'message' => $isLocal ? $error->getMessage() : 'Base data error',
      ]);
    } else {
      return back()->withErrors([
        'message' => $isLocal && $message ? $error->getMessage() : $message,
      ]);
    }
  }
}
