<?php

namespace App\Exceptions;

use App\Utils\RequestManage;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler {
  /**
   * A list of the exception types that are not reported.
   *
   * @var array
   */
  protected $dontReport
    = [
      //
    ];

  /**
   * A list of the inputs that are never flashed for validation exceptions.
   *
   * @var array
   */
  protected $dontFlash
    = [
      'current_password',
      'password',
      'password_confirmation',
    ];

  /**
   * Register the exception handling callbacks for the application.
   *
   * @return void
   */
  public function register() {
    $this->reportable(function (Throwable $e) {
      //
    });
  }

  /**
   * Render an exception into an HTTP response.
   *
   * @param Request $request
   * @param Throwable $e
   * @return Response
   *
   * @throws Throwable
   */
  public function render($request, Throwable $e): Response {
    $requestManage = new RequestManage();

    if ($e instanceof NotFoundHttpException) {
      if ($request->is('api/*')) {
        return $requestManage->error($e->getStatusCode(), $e);
      }
      return response()->view('404', [], 404);
    }

    if ($e instanceof ValidationException) {
      return $requestManage->errorValidate($e->status, $e);
    }

    if ($e instanceof QueryException) {
      return $requestManage->error(500, $e);
    }

    return parent::render($request, $e);
  }
}
