<?php

namespace Tests\Feature;

use App\Http\Controllers\AuthController;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Tests\TestCase;

class AuthTest extends TestCase {

  public function test_user_can_view_login() {
    $response = $this->get('/login');
    $response->assertSuccessful();
    $response->assertViewIs('home.login');
  }

  public function test_user_cannot_view_login_when_authenticated() {
    $user     = User::factory()->make();
    $response = $this->actingAs($user)->get('/api-login');
    $response->assertStatus(500);
  }

  public function test_user_login() {
    $controller = new AuthController();

    $request = UserRequest::create('/login', 'POST', [
      'email'      => 'kelsie.powlowski@example.net',
      'password'   => '123456',
      'c_password' => '123456',
    ]);

    $response = $controller->login($request);

    $this->assertEquals(302, $response->getStatusCode());
  }

  public function test_user_register() {
    $controller = new AuthController();

    $request = UserRequest::create('/register', 'POST', [
      'name'       => 'test',
      'email'      => 'test@gmail.com',
      'password'   => '123456',
      'c_password' => '123456',
      'role'       => 'admin'
    ]);

    $response = $controller->register($request);

    $this->assertEquals(302, $response->getStatusCode());

    $user = User::query()->where('email', 'test@gmail.com')->first();
    $this->assertNotNull($user);

    $user->delete();
    $this->assertDeleted($user);
  }

  public function test_user_logout() {

    $controller = new AuthController();

    $request = UserRequest::create('/login', 'POST', [
      'email'      => 'kelsie.powlowski@example.net',
      'password'   => '123456',
      'c_password' => '123456',
    ]);

    $controller->login($request);

    $response = $controller->logout();

    $this->assertEquals(302, $response->getStatusCode());
    $this->assertEmpty($response->getSession()->all());
    $this->assertEquals(url('/') . '/login', $response->getTargetUrl());
  }
}
