@extends('layouts.main')

@section('content-home')
  <section class="my-20 container mx-auto px-5 sm:px-0">
    <div class="text-center">
      <h2 class="text-4xl font-bold mb-2">Products</h2>
      <p class="text-lg">Order it for you or for your beloved ones </p>
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
@endsection
