@extends('layouts.home')

@section('content-home')
  <section class="relative xl:container mx-auto">
    <img src="{{asset('img/images/bg-image.png')}}" alt="image home">

    <div class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white opacity-75
                blur-3xl p-8 w-3/6 mx-auto flex items-center flex-col"
         style="top: 58%">
      <img class="w-3/5" src="{{asset('img/images/hero-title.png')}}" alt="hero title">

      <p class="text-center mt-5 text-sm text-black">
        All handmade with natural soy wax, Candleaf is a companion for all your pleasure moments
      </p>

      <button class="bg-primary hover:bg-primary-light transition text-white rounded px-8 py-1 mt-10 text-sm">
        Discover our collection
      </button>
    </div>
  </section>

  <section class="my-20 container mx-auto">
    <div class="text-center">
      <h2 class="text-2xl font-bold mb-2">Products</h2>
      <p class="text-sm">Order it for you or for your beloved ones </p>
    </div>

    <div class="my-5 text-sm grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
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

  <section class="bg-tertiary dark:bg-gray-900 py-20">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
      <div>
        <h2 class="text-2xl font-bold mb-2">Clean and fragrant soy wax</h2>
        <p class="text-xs text-primary">Made for your home and for your wellness</p>
        <ul class="text-xs mt-10 leading-9 font-bold">
          <li>
            <img class="inline-block mr-1" src="{{asset('img/images/checkmark-circle-outline.png')}}" alt="list icon">
            Eco-sustainable:All recyclable materials, 0% CO2 emissions
          </li>
          <li>
            <img class="inline-block mr-1" src="{{asset('img/images/checkmark-circle-outline.png')}}" alt="list icon">
            Hyphoallergenic: 100% natural, human friendly ingredients
          </li>
          <li>
            <img class="inline-block mr-1" src="{{asset('img/images/checkmark-circle-outline.png')}}" alt="list icon">
            Handmade: All candles are craftly made with love.
          </li>
          <li>
            <img class="inline-block mr-1" src="{{asset('img/images/checkmark-circle-outline.png')}}" alt="list icon">
            Long burning: No more waste. Created for last long.
          </li>
        </ul>
        <button class="bg-primary hover:bg-primary-light transition text-white rounded px-8 py-1 mt-10 text-sm">
          Learn more
        </button>
      </div>
      <div class="bg-white shadow-2xl my-5 md:my-10">
        <img class="" src="{{asset('img/images/mockups.png')}}" alt="mockups">
      </div>
    </div>
  </section>

  <section class="bg-primary-100 py-14">
    <div class="container mx-auto text-center">
      <h2 class="text-2xl font-bold mb-2">Testimonials</h2>
      <p class="text-sm">Some quotes from our happy customers</p>

      <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="shadow bg-white dark:bg-gray-900 rounded">
          <div class="flex flex-col items-center">
            <img src="{{asset('img/images/img.png')}}" alt="profile client">
            <img class="w-5/12" src="{{asset('img/images/stars.png')}}" alt="stars">
          </div>
          <div class="text-center py-5 px-6">
            <p class="font-bold text-sm">“I love it! No more air fresheners”</p>
            <p class="text-xs mt-1">Luisa</p>
          </div>
        </div>

        <div class="shadow bg-white dark:bg-gray-900 rounded">
          <div class="flex flex-col items-center">
            <img src="{{asset('img/images/img-2.png')}}" alt="profile client">
            <img class="w-5/12" src="{{asset('img/images/stars.png')}}" alt="stars">
          </div>
          <div class="text-center py-5 px-6">
            <p class="font-bold text-sm">“Recommended for everyone”</p>
            <p class="text-xs mt-1">Eduardo</p>
          </div>
        </div>

        <div class="shadow bg-white dark:bg-gray-900 rounded">
          <div class="flex flex-col items-center">
            <img src="{{asset('img/images/img-3.png')}}" alt="profile client">
            <img class="w-5/12" src="{{asset('img/images/stars.png')}}" alt="stars">
          </div>
          <div class="text-center py-5 px-6">
            <p class="font-bold text-sm">“Looks very natural, the smell is awesome”</p>
            <p class="text-xs mt-1">Mari</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="my-20 container mx-auto">
    <div class="text-center">
      <h2 class="text-2xl font-bold mb-2">Popular</h2>
      <p class="text-sm">Our top selling product that you may like</p>
    </div>

    <div class="my-5 text-sm grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
      <x-home-product></x-home-product>
    </div>
  </section>
@endsection
