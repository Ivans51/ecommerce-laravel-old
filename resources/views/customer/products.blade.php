@extends('layouts.customer')

@section('content-customer')
  <section class="my-6 container mx-auto px-5 sm:px-0">
    <div class="text-center">
      <h2 class="text-4xl font-bold mb-2">Products</h2>
      <p class="text-lg">Order it for you or for your beloved ones </p>

      <div class="divider-ecommerce"></div>

      <form class="flex justify-center items-end mt-4 mb-10" method="post" action="{{ route('api-login') }}">
        @csrf
        <div class="form-control">
          <label>Search
            <input type="text" class="input input-bordered input-sm px-4 py-3 w-full" name="search">
          </label>
          @if ($errors->has('search'))
            <span class="text-red-700">{{ $errors->first('search') }}</span>
          @endif
        </div>
        <button class="btn-custom ml-2">
          GO
        </button>
      </form>
    </div>

    <div class="my-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
    </div>
  </section>

  <x-pagination></x-pagination>
@endsection
