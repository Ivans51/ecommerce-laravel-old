@extends('layouts.home')

@section('content-home')
  <div class="my-10">
    <div class="mx-auto w-6/12 border-1 rounded shadow bg-white px-5 py-5 dark:bg-gray-800">
      <h2 class="mb-10 font-bold text-center text-2xl">Login</h2>
      <form class="relative pb-20" method="post" action="{{ route('api-login') }}">
        @csrf
        <div class="mb-1">
          <label class="text-xl">Email
            <input type="email" class="form-input px-4 py-3 w-full" name="email">
          </label>
          @if ($errors->has('email'))
            <span class="text-red-700">{{ $errors->first('email') }}</span>
          @endif
        </div>

        <div class="mb-1">
          <label class="text-xl">Password
            <input type="password" class="form-input px-4 py-3 w-full" name="password">
          </label>
          @if ($errors->has('password'))
            <span class="text-red-700">{{ $errors->first('password') }}</span>
          @endif
        </div>

        {!! RecaptchaV3::initJs() !!}
        {!! RecaptchaV3::field('captcha') !!}

        <button
          class="py-1 px-2 rounded bg-primary text-white text-xl absolute bottom-0 right-0 transition hover:bg-primary-light">
          Save
        </button>
      </form>
    </div>
  </div>
@endsection
