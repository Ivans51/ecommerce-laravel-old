@extends('layouts.main')

@section('content-home')
  <div class="py-20">
    <div class="mx-auto w-6/12 border-1 rounded shadow-lg bg-white px-6 py-8 dark:bg-gray-900">
      <div class="text-center mb-8">
        <h2 class="font-bold text-2xl">Login</h2>
        <p class="mt-2 text-sm">Please login using account detail bellow.</p>
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

        <button class="btn-custom w-full mt-4">
          Sign in
        </button>

        {{-- Laravel Login with Twitter --}}
        <div class="flex items-center justify-end mt-12">
          <a class="btn-custom w-full text-center btn-twitter" href="{{ url('auth/twitter') }}">
            Login with Twitter
          </a>
        </div>

        {{-- Laravel Login with Facebook --}}
        <div class="flex items-center justify-end mt-2">
          <a class="btn-custom w-full text-center btn-facebook" href="{{ url('auth/facebook') }}">
            Login with Facebook
          </a>
        </div>

        {{-- Laravel Login with Google --}}
        <div class="flex items-center justify-end mt-2 mb-8">
          <a
            class="btn-custom w-full text-center btn-google text-black"
            style="background: white;"
            href="{{ url('auth/google') }}"
          >
            Login with Google
          </a>
        </div>

        <a class="text-center block text-sm hover:text-primary" href="{{route('register')}}">
          Don’t have an Account? Create account
        </a>

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
  </div>
@endsection

@push('styles')
  <style>
    .btn-twitter {
      background: #1E9DEA;
    }

    .btn-twitter:hover {
      background: #30a3ee;
    }

    .btn-facebook {
      background: #1e4eea;
    }

    .btn-facebook:hover {
      background: #3461ee;
    }

  </style>
@endpush
