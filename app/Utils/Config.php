<?php


namespace App\Utils;


class Config {

  /**
   * @return array
   */
  function getEnv(): array {
    return [
      'SITE_WEB' => env("RECAPTCHA_SITE_WEB", "somedefaultvalue")
    ];
  }
}
