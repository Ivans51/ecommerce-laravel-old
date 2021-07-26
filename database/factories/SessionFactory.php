<?php

namespace Database\Factories;

use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SessionFactory extends Factory {
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Session::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition() {
    return [
      'ip_address'    => $this->faker->word,
      'user_agent'    => $this->faker->word,
      'payload'       => $this->faker->word,
      'user_id'       => User::query()->first()->id,
      'last_activity' => $this->faker->randomNumber(2),
    ];
  }
}
