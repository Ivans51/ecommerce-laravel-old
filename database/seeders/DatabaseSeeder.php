<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    User::factory(1)->create();
    Category::factory(1)->create();
    Product::factory(1)->create();
    Session::factory(1)->create();
    $this->call([
      UserSeeder::class,
    ]);
  }
}
