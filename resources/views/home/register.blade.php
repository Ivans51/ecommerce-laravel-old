@extends('layouts.home')

@section('content-home')
  <div class="my-10">
    <div class="mx-auto w-6/12 border-1 rounded shadow bg-white px-5 py-5 dark:bg-gray-800">
      <h2 class="mb-10 font-bold text-center text-2xl">Register</h2>
      <form class="relative pb-20" method="post" action="{{ route('api-register') }}">
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

        <button
          class="py-1 px-2 rounded bg-primary text-white text-xl absolute bottom-0 right-0 transition hover:bg-primary-light">
          Save
        </button>

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
