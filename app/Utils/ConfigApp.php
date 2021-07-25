<?php


namespace App\Utils;


class ConfigApp {

  public $LOCAL     = 'local';
  public $PROD      = 'prod';
  public $TOKEN_APP = 'TOKEN_APP';
  public $APP_ENV   = 'APP_ENV';
  public $ADMIN     = 'admin';
  public $CUSTOMER  = 'customer';

  /**
   * @return array
   */
  function getEnv(): array {
    return [
      'TOKEN_APP' => env($this->TOKEN_APP),
      'APP_ENV'   => env($this->APP_ENV),
    ];
  }
}
