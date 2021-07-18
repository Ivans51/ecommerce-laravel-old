<?php


namespace App\Utils;


class Config {

  /**
   * @return array
   */
  function getEnv(): array {
    return [
      'APP_ENV'  => env("APP_ENV"),
      'SITE_WEB' => env("RECAPTCHA_SITE_WEB")
    ];
  }
}
