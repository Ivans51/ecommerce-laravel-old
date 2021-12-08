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

  static function getCustomer(): array {
    return [
      ['label' => 'Products', 'link' => '/customer/products'],
    ];
  }

  static function getAdmin(): array {
    return [
      ['label' => 'Products', 'link' => 'products'],
    ];
  }

}
