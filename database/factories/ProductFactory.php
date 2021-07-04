<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory {
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Product::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition() {
    if (isset(Category::query()->first()->id)) {
      return [
        'name'              => $this->faker->word,
        'slug'              => $this->faker->word,
        'short_description' => $this->faker->word,
        'description'       => $this->faker->word,
        'regular_price'     => $this->faker->randomNumber(5) . '.' .$this->faker->randomNumber(2),
        'sale_price'        => $this->faker->randomNumber(5) . '.' .$this->faker->randomNumber(2),
        'SKU'               => $this->faker->word,
        'stock_status'      => $this->faker->randomElement(['in_stock', 'out_of_stock']),
        'quantity'          => $this->faker->randomNumber(2),
        'category_id'       => Category::query()->first()->id,
      ];
    }
  }
}
