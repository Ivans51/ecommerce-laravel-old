<?php

namespace App\Utils;

class Menu {

  static function getHome(): array {
    return [
      ['label' => 'Products', 'link' => 'products'],
      ['label' => 'About', 'link' => 'about'],
      ['label' => 'Testimonials', 'link' => 'testimonials'],
    ];
  }

  static function getAdmin(): array {
    return [
      ['label' => 'Products', 'link' => 'products'],
    ];
  }

}
