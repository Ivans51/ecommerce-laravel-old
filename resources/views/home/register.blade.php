@extends('layouts.home')

@section('content-home')
  <div class="py-20">
    <div class="mx-auto w-6/12 border-1 rounded shadow bg-white px-5 py-5 dark:bg-gray-900">
      <div class="text-center mb-8">
        <h2 class="font-bold text-2xl">Register</h2>
        <p class="mt-2 text-sm">Please complete data to do the register.</p>
      </div>
      <form class="relative" method="post" action="{{ route('api-register') }}">
        @csrf
        <div class="mb-1 form-control">
          <label>Name
            <input type="text" class="input input-bordered input-sm px-4 py-3 w-full form-input" name="name">
          </label>
          @if ($errors->has('name'))
            <span class="text-red-700">{{ $errors->first('name') }}</span>
          @endif
        </div>

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

        <div class="mb-1 form-control">
          <label>Repeat Password
            <input type="password" class="input input-bordered input-sm px-4 py-3 w-full" name="c_password">
          </label>
          @if ($errors->has('c_password'))
            <span class="text-red-700">{{ $errors->first('c_password') }}</span>
          @endif
        </div>

        <input type="hidden" name="role" value="{{\App\Utils\Constants::CUSTOMER}}">

        @if ($errors->has('g-recaptcha-response'))
          <span class="text-red-700 dark:text-red-500">{{ $errors->first('g-recaptcha-response') }}</span>
        @endif
        {!! RecaptchaV3::initJs() !!}
        {!! RecaptchaV3::field('captcha') !!}

        <button class="btn-custom w-full mt-6 mb-8">
          Sign Up
        </button>

        <a class="text-center block text-sm hover:text-primary" href="{{route('login')}}">
          Don have an Account? Login
        </a>

        @if (Session::exists('success'))
          <div class="border px-4 py-2 bg-primary text-white mt-2">
            {{ Session::get('success') ?? '' }}
            <a class="font-bold underline" href="{{route('login')}}">Go to Login</a>
          </div>
        @endif
      </form>
    </div>
  </div>
@endsection
