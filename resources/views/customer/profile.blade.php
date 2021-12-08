@extends('layouts.customer')

@section('content-customer')
  <section class="flex h-screen-ecommerce">
    <div class="w-1/4 bg-gray-800 text-white">
      <div class="pt-5 pb-5 divider-ecommerce">
        <img class="rounded-full bg-white p-2 mx-auto"
             src="{{asset('/img/images/profile.svg')}}"
             alt="profile icon"
        >
      </div>
      <ul>
        <li class="px-10 py-5 divider-ecommerce cursor-pointer hover:bg-gray-900">
          <a href="{{route('profile-customer')}}">Edit profile</a>
        </li>
        <li class="px-10 py-5 divider-ecommerce cursor-pointer hover:bg-gray-900">
          <a href="{{route('profile-password-customer')}}">Change password</a>
        </li>
        <li class="px-10 py-5 divider-ecommerce cursor-pointer hover:bg-gray-900">
          <a href="{{route('api-logout')}}">Logout</a>
        </li>
      </ul>
    </div>

    <div class="w-3/4 dark:bg-gray-900 py-8 px-12">
      <h1 class="text-4xl font-bold">Edit profile</h1>

      <form method="post" action="{{ route('api-login') }}">
        @csrf
        <div class="mt-8 mb-1 form-control">
          <label class="font-bold">Email
            <input type="email" class="input input-bordered input-sm px-4 py-3 w-full" name="email">
          </label>
          @if ($errors->has('email'))
            <span class="text-red-700">{{ $errors->first('email') }}</span>
          @endif
        </div>

        <div class="mt-5 mb-1 form-control">
          <label class="font-bold">Name
            <input type="text" class="input input-bordered input-sm px-4 py-3 w-full" name="name">
          </label>
          @if ($errors->has('name'))
            <span class="text-red-700">{{ $errors->first('name') }}</span>
          @endif
        </div>

        <div class="mt-5 mb-1 form-control">
          <label class="font-bold">Address
            <input type="text" class="input input-bordered input-sm px-4 py-3 w-full" name="address">
          </label>
          @if ($errors->has('address'))
            <span class="text-red-700">{{ $errors->first('address') }}</span>
          @endif
        </div>

        <div class="text-right mt-6">
          <button class="btn-custom mt-4 mb-8 text-2xl">
            Save
          </button>
        </div>
      </form>
    </div>
  </section>
@endsection
