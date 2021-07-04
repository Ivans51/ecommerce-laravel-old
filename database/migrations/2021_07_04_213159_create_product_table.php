<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('product', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('name');
      $table->string('slug')->unique();
      $table->string('short_description')->nullable();
      $table->text('description');
      $table->decimal('regular_price');
      $table->decimal('sale_price')->nullable();
      $table->string('SKU');
      $table->enum('stock_status', ['in_stock', 'out_of_stock']);
      $table->boolean('featured')->default(false);
      $table->unsignedInteger('quantity')->default(10);
      $table->string('image')->nullable();
      $table->text('images')->nullable();
      $table->char('category_id');
      $table->timestamps();
      $table->foreign('category_id')->references('id')->on('category');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('product');
  }
}
