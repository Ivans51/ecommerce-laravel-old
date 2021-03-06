<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('session', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('ip_address', 45)->nullable();
      $table->text('user_agent')->nullable();
      $table->text('payload');
      $table->char('user_id');
      $table->timestamps();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->integer('last_activity')->index();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('session');
  }
}
