@extends('layouts.app')

@section('main-app')

  <div class="py-20 h-screen">
    <img class="mx-auto mb-6" src="{{asset('img/images/logo.png')}}" alt="logo icon">

    <div class="mx-auto w-6/12 border-1 rounded shadow-lg bg-white px-6 py-8 dark:bg-gray-900">
      <div class="text-center mb-8">
        <h2 class="font-bold text-2xl">Login</h2>
        <p class="mt-2 text-sm">Please login using account detail bellow.</p>
      </div>

      <form method="post" action="{{ route('api-login-admin') }}">
        @csrf
        <div class="mb-1 form-control">
          <label>Email
            <input type="email" class="input input-bordered input-sm px-4 py-3 w-full" name="email">
          </label>
          @if ($errors->has('email'))
            <span class="text-red-700">{{ $errors->first('email') }}</span>
          @endif
        </div>

        <div class="mb-1 form-control">
          <label>Password
            <input type="password" class="input input-bordered input-sm px-4 py-3 w-full" name="password">
          </label>
          @if ($errors->has('password'))
            <span class="text-red-700">{{ $errors->first('password') }}</span>
          @endif
        </div>

        <label for="my-modal-2" class="modal-button cursor-pointer mt-1 text-sm hover:text-primary">
          Forgot your password?
        </label>

        <button class="btn-custom w-full mt-4 mb-8">
          Sign in
        </button>

        {!! RecaptchaV3::initJs() !!}
        {!! RecaptchaV3::field('captcha') !!}
      </form>

      <input type="checkbox" id="my-modal-2" class="modal-toggle">
      <div class="modal">
        <div class="modal-box dark:bg-gray-900">
          <div class="relative text-center mb-8">
            <h2 class="font-bold text-2xl">Forgot password</h2>
            <label class="absolute right-0 top-1 cursor-pointer" for="my-modal-2">
              <img src="{{asset('img/images/close.png')}}" alt="close ico">
            </label>
          </div>

          <form method="post" action="{{ route('api-login') }}">
            @csrf
            <div class="mb-1 form-control">
              <label>Email
                <input type="email" class="input input-bordered input-sm px-4 py-3 w-full" name="email">
              </label>
              @if ($errors->has('email'))
                <span class="text-red-700">{{ $errors->first('email') }}</span>
              @endif
            </div>
          </form>

          <label for="my-modal-2" class="btn-custom w-full block text-center mt-8 mb-2">
            Send
          </label>
        </div>
      </div>
    </div>

    @error('message')
    <div class="border px-4 py-2 bg-red-500 text-white mt-2 w-6/12 mx-auto">
      {{ $errors->first('message') }}
    </div>
    @enderror
  </div>
@endsection
