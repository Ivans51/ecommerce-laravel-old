@extends('layouts.admin')

@section('content-admin')
  <section class="py-8 px-12">
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

    <div class="divider-shop"></div>

    <h1 class="text-4xl font-bold mt-8">Change password</h1>

    <form method="post" action="{{ route('api-login') }}">
      @csrf
      <div class="mt-8 mb-1 form-control">
        <label class="font-bold">Password
          <input type="password" class="input input-bordered input-sm px-4 py-3 w-full" name="password">
        </label>
        @if ($errors->has('password'))
          <span class="text-red-700">{{ $errors->first('password') }}</span>
        @endif
      </div>

      <div class="mt-5 mb-1 form-control">
        <label class="font-bold">Repeat Password
          <input type="password" class="input input-bordered input-sm px-4 py-3 w-full" name="repeat_password">
        </label>
        @if ($errors->has('repeat_password'))
          <span class="text-red-700">{{ $errors->first('repeat_password') }}</span>
        @endif
      </div>

      <div class="text-right mt-6">
        <button class="btn-custom mt-4 mb-8 text-2xl">
          Save
        </button>
      </div>
    </form>
  </section>
@endsection
