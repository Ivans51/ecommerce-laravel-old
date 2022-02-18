<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Exception;
use Laravel\Socialite\Facades\Socialite;

class AuthSocialController extends Controller {

  public function loginWithTwitter() {
    return Socialite::driver('twitter')->redirect();
  }

  public function cbTwitter() {
    try {

      $user = Socialite::driver('twitter')->user();

      $userWhere = User::where('twitter_id', $user->id)->first();

      if ($userWhere) {
        Auth::login($userWhere);
      } else {
        $gitUser = User::create([
          'name'       => $user->name,
          'email'      => $user->email,
          'twitter_id' => $user->id,
          'oauth_type' => 'twitter',
          'password'   => encrypt('admin595959')
        ]);

        Auth::login($gitUser);
      }

      return redirect('/home');

    } catch (Exception $e) {
      dd($e->getMessage());
    }
  }
}
