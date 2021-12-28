<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table('users')->insert(
      [
        [
          'id'                => '2be13f4d-b9b5-45e5-9b15-9a296f85a9c1',
          'name'              => 'customer',
          'email'             => 'customer@ecommerce.laravel.com',
          'address'           => 'street',
          'email_verified_at' => now(),
          'password'          => Hash::make('123456'),
          'role'              => 'customer'
        ],
        [
          'id'                => '2be13f4d-b9b5-45e5-9b15-9a296f85a9c2',
          'name'              => 'admin',
          'email'             => 'admin@ecommerce.laravel.com',
          'address'           => 'street',
          'email_verified_at' => now(),
          'password'          => Hash::make('123456'),
          'role'              => 'admin'
        ]
      ]
    );
  }
}
