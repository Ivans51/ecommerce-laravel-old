@extends('layouts.home')

@section('content-home')
  <div class="my-10">
    <div class="mx-auto w-6/12 border-1 rounded shadow bg-white px-5 py-5">
      <h2 class="mb-10 font-bold text-center text-2xl">Login</h2>
      <form class="relative pb-20" method="post" action="/api/login">
        @csrf
        <label class="text-xl">Email
          <input type="email" class="form-input px-4 py-3 w-full">
        </label>
        <label class="text-xl">Password
          <input type="password" class="form-input px-4 py-3 w-full">
        </label>
        <button
          class="py-1 px-2 rounded bg-primary text-white text-xl absolute bottom-0 right-0 transition hover:bg-primary-light">
          Save
        </button>
      </form>
    </div>
  </div>
@endsection
